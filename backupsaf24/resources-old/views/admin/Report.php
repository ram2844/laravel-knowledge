<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Common\MasterModel;
use Carbon\Carbon;

class Report extends MasterModel
{
    use HasFactory;

    // protected $appends  = ['actions'];
    protected $appends  = ['actions', 'total_seats_normal', 'total_seats_vip'];
    protected $table    = 'programs';


    public function setEventDateAttribute($value){
    
        $this->attributes['event_date'] = Carbon::createFromFormat(env('DATE_PICKER_DATE_FORMAT', 'd/m/Y'), $value)->format(env('SQL_DATE_FORMAT', 'Y-m-d'));
    }

    public function getEventDateAttribute($value){
        
        if($value && strtotime($value) > 0){
            return Carbon::createFromFormat(env('SQL_DATE_FORMAT', 'Y-m-d'), $value)->format(env('DATE_PICKER_DATE_FORMAT', 'd/m/Y'));
        }
    }
    
    public function formatEventDateTime()
    {
        return date('M d h:i A', strtotime($this->event_date.' '.$this->from_time)) .' - '.date('M d h:i A', strtotime($this->event_date.' '.$this->to_time)) ;
    }

    public function programDetails(): HasMany
    {
        // return $this->hasMany(\App\Models\ProgramDetail::class)->with('venue');
        return $this->hasMany(\App\Models\ProgramDetail::class, 'program_id', 'id');
    }

    public function orderDetails(): HasMany
    {
        // return $this->hasMany(\App\Models\ProgramDetail::class)->with('venue');
        return $this->hasMany(\App\Models\OrderDetail::class, 'program_id', 'id');
    }

    public function programDetailsWithDates(): HasMany
    {
        return $this->hasMany(\App\Models\ProgramDetail::class)->groupBy('event_date');
        // return $this->hasMany(\App\Models\ProgramDetail::class, 'program_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    
    public function discipline()
    {
        return $this->belongsTo('App\Models\Discipline', 'discipline_id', 'id');
    }
    
    public function curator()
    {
        return $this->belongsTo('App\Models\Curator', 'curator_id', 'id');
    }
    
    public function programTags()
    {
        return ProgramTag::whereIn('id', $this->program_tag_ids)->get()->pluck('name');
    }
    
    public function programSponsors()
    {
        return Sponsor::whereIn('id', $this->sponsor_ids)->get()->pluck('url','logo');
    }
    
    public function getProgramDates()
    {
        return ProgramDetail::where('program_id', $this->id)->groupBy('event_date')->get();
    }
    
    public function getProgramVenues()
    {
        return ProgramDetail::with('venue')->where('program_id', $this->id)->groupBy('venue_id')->get();
    }

    public function getTotalBookedSeatsAttribute(){
        
        return \App\Models\OrderDetail::whereHas('order', function($q) {
                    $q->where('payment_status', 'SUCCESS');
                })
                ->where(['program_id' => $this->id, 'has_vip' => 0, 'status' => 1])->sum('program_qty');

        // return OrderDetail::where(['program_id' => $this->id, 'status' => 1, 'has_vip' => 0])->sum('program_qty');
    }

    public function getTotalBookedSeatsVipAttribute(){
        
        return \App\Models\OrderDetail::whereHas('order', function($q) {
                    $q->where('payment_status', 'SUCCESS');
                })
                ->where(['program_id' => $this->id, 'has_vip' => 1, 'status' => 1])->sum('program_qty');

        // return OrderDetail::where('program_detail_id', $this->id)->sum('program_qty');
    }

    public function getTotalSeatsNormalAttribute(){
        
        return ProgramDetail::where('program_id', $this->id)->sum('total_seats');
    }

    public function getTotalSeatsVipAttribute(){
        
        return ProgramDetail::where('program_id', $this->id)->sum('vip_seats');
    }

    public function getList($data, $with = [], $where = []){  

        $records = $this->handleAjax($data);
        
        if(isset($with) && !empty($with))
        {
           $records->with($with);        
        }

        // SUM(CASE
        //         WHEN (order_details.has_vip <= 0 AND orders.payment_status = \'SUCCESS\') THEN order_details.program_qty
        //         ELSE 0
        //         END) AS total_booked_seats,
        //     SUM(CASE
        //         WHEN (order_details.has_vip > 0 AND orders.payment_status = \'SUCCESS\') THEN order_details.program_qty
        //         ELSE 0
        //         END) AS total_booked_seats_vip

        // , SUM(program_details.total_seats) as __total_seats, SUM(program_details.vip_seats) as __vip_seats

        // $records->whereRelation('orderDetails', 'status', 1);

        $records->selectRaw('
            programs.*,
            SUM(CASE
                WHEN (order_details.has_vip <= 0 AND orders.payment_status = \'SUCCESS\') THEN order_details.program_qty
                ELSE 0
                END) AS total_booked_seats,
            SUM(CASE
                WHEN (order_details.has_vip > 0 AND orders.payment_status = \'SUCCESS\') THEN order_details.program_qty
                ELSE 0
                END) AS total_booked_seats_vip
        ');

        // $records->join('program_details', 'program_details.program_id', '=', 'programs.id');
        $records->join('order_details', 'order_details.program_id', '=', 'programs.id');
        $records->leftJoin('orders', 'orders.id', '=', 'order_details.order_id');
        $records->groupBy('programs.id');
        
        
        if(isset($where) && !empty($where))
        {
           $records->where($where);     
        }

        if(!empty($data['query']['search'])){

            $searchKey = $data['query']['search'];
            $records->where(function($query) use ($searchKey){
                $query->where('programs.name', 'LIKE', '%'.$searchKey.'%')
                      ->orWhere('programs.amount', 'LIKE', '%'.$searchKey.'%')
                      ->orWhere('programs.description', 'LIKE', '%'.$searchKey.'%')
                      ->orWhere('programs.disclaimer', 'LIKE', '%'.$searchKey.'%');
            });
        }

        return $records->get();
    }

    function    handleAjax($data){

        $page               =   $data['pagination']['page'] ?? 0 ;
        $page               =   $page - 1;
        $perPage            =   $data['pagination']['perpage'] ?? 10;
        $page               =   $page * $perPage;

        $sort               =   $data['sort']['sort'] ?? 'desc';
        $field              =   $data['sort']['field'] ?? 'programs.id';  

        return $this
                    ->orderby($field, $sort)
                    ->skip($page)
                    ->take($perPage);
    }

    public function getListCount($data, $with = [], $where = []){  

        $records = $this->query();
        if(isset($with) && !empty($with))
        {
           $records->with($with);        
        }
        
        if(isset($where) && !empty($where))
        {
           $records->where($where);     
        }

        $records->whereRelation('orderDetails', 'status', 1);

        if(!empty($data['query']['search'])){

            $searchKey = $data['query']['search'];
            $records->where(function($query) use ($searchKey){
                $query->where('name', 'LIKE', '%'.$searchKey.'%')
                      ->orWhere('amount', 'LIKE', '%'.$searchKey.'%')
                      ->orWhere('description', 'LIKE', '%'.$searchKey.'%')
                      ->orWhere('disclaimer', 'LIKE', '%'.$searchKey.'%');
            });
        }
        
        return $records->count();
    }

    public function getActionsAttribute(){
    
        return '<span class="overflow: visible; position: relative; width: 125px;" data-id="'.$this->id.'">
                    <a href="list/dates/'.$this->id.'" class="btn btn-sm btn-clean" title="Details"> 
                        <i class="flaticon2-document"></i> Details
                    </a>
                </span>';
    }
    
}
