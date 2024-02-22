<!-- controller code  -->


public function updateStatus (Request $request, $id){

    $status = Client::findOrFail($id);
    //dd($status);die();

    if($status){
        $status->status = !$status->status;
        $status->save();
    }

    \Flash::success('Status updated successfully');
    return \Redirect::route(self::$moduleConfig['routes']['listRoute']);
}



<!-- index listing pace code  -->
{
    field: "status",
    title: "Status",
    template: function(t) {
        var STATUS = {
        	0: {
                'title': 'Inactive',
                'class': ' label-light-danger'
            },
            1: {
                'title': 'Active',
                'class': ' label-light-success'
            }
        };
        return '<span onclick="return onStatusPress(this, '+t?.id+')" class="cursor-pointer label font-weight-bold label-lg ' + STATUS[t?.status].class + ' label-inline">' + STATUS[t?.status].title + '</span>';
    },
},



<!-- script ajax code  -->


<script type="text/javascript">
			
	function onStatusPress(_this, id){

		if(confirm('Are you sure you want to change status?')){

            var route                   = '{{ route("update.status", ["id" => "randomString"])}}';
            finalRoute                  = route.replace('randomString', id);
            window.location.href        = finalRoute;
		} else {
			return false;
		}
	}

</script>



<!-- route code  -->

Route::get('update-status/{id}',        'ClientController@updateStatus')->name('update.status');


	