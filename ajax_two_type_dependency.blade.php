<!-- type1 -->
@push('scripts')
<script type="text/javascript">
   
    function getParent(_this) {

        var site_type_id = $('select[name=site_type_id]').val();
        var menu_type_id = $('select[name=menu_type_id]').val();
        if(menu_type_id){
            $.ajax({
                type: "GET",
                url: "{{ url('parent') }}/" + menu_type_id + "/" + site_type_id ,
                datatype: 'json',
                success: function (response) {
                    if(response?.status){
                        var options = '<option value="">Select Parent Menu</option>';
                        if(response.data.length) {
                            for (var i = 0; i < response.data.length; i++) {

                                var _selected = '';
                                var selectedId = '{{ $row->parent_id ?? 0 }}';

                                if(selectedId == response.data[i].id){

                                    _selected = 'selected';
                                }

                                options += '<option '+_selected+' value="'+response.data[i].id+'">'+response.data[i].name+'</option>';
                            }

                            $("select[name='parent_id']").html(options);
                            $("select[name='parent_id']").selectpicker('refresh');
                        }
                    }
                }
            });

        } else {

            $("select[name='parent_id']").html('<option value="">Select Parent Menu</option>');
            $("select[name='parent_id']").selectpicker('refresh');
        }
        
    }

    $(document).ready(function(){
        
        getParent(null);

    });

</script>
@endpush

<!-- // type1 Route ajax-->
Route::get('parent/{menu_type_id?}/{site_type_id?}', 'App\Http\Controllers\AjaxController@getParent')->name('ajax.parent');

<!-- Ajax Controller Code Type 1  -->

public function getParent(Request $request, $menu_type_id = NULL, $site_type_id = NULL)
{
    Menu::$withoutAppends = true;
    $queryModel = \App\Models\Menu::query();
    $queryModel->where('status', 1);

    if(!empty($menu_type_id)){
        $queryModel->where('menu_type_id', $menu_type_id);
    }

    if(!empty($site_type_id)){
        $queryModel->where('site_type_id', $site_type_id);
    }

    $results = $queryModel->get();

    if($results->count()) {
        return ['status' => true, 'message' => 'Record found.', 'data' => $results];
    }

    return response()->json([
        'status' => false,
        'message' => 'No data found.',
        'data' => new \stdClass()
    ]);
}



<!-- type2 -->


@push('scripts')
<script type="text/javascript">
   
    function getParent(_this) {

        var site_type_id = $('select[name=site_type_id]').val();
        var menu_type_id = $('select[name=menu_type_id]').val();
        //console.log(site_type_id);
        if (site_type_id != '') {
            if(menu_type_id){

                $.ajax({
                    type: "GET",
                    url: "{{ url('parent') }}/" + menu_type_id + "?site_type_id=" + site_type_id + '&param2=1',
                    datatype: 'json',
                    success: function (response) {
                        if(response?.status){
                            var options = '<option value="">Select Parent Menu</option>';
                            if(response.data.length) {
                                for (var i = 0; i < response.data.length; i++) {

                                    var _selected = '';
                                    var selectedId = '{{ $row->parent_id ?? 0 }}';

                                    if(selectedId == response.data[i].id){

                                        _selected = 'selected';
                                    }

                                    options += '<option '+_selected+' value="'+response.data[i].id+'">'+response.data[i].name+'</option>';
                                }

                                $("select[name='parent_id']").html(options);
                                $("select[name='parent_id']").selectpicker('refresh');
                            }
                        }
                    }
                });

            } else {

                $("select[name='parent_id']").html('<option value="">Select Parent Menu</option>');
                $("select[name='parent_id']").selectpicker('refresh');
            }
        }else{
            alert('Please Select Site Type');
        }
        
    }

    $(document).ready(function(){
        
        getParent(null);

    });

</script>
@endpush

<!-- type 2 Route ajax -->
Route::get('parent/{menu_type_id?}', 'App\Http\Controllers\AjaxController@getParent')->name('ajax.parent');

<!-- Ajax Controller Code Type 2  -->

public function getParent(Request $request, $menu_type_id = NULL)
{
    Menu::$withoutAppends = true;
    $queryModel = \App\Models\Menu::query();
    $queryModel->where('status', 1);

    if(!empty($menu_type_id)){
        $queryModel->where('menu_type_id', $menu_type_id);
    }

    if(!empty($request->site_type_id)){
        $queryModel->where('site_type_id', $request->site_type_id);
    }

    $results = $queryModel->get();

    if($results->count()) {
        return ['status' => true, 'message' => 'Record found.', 'data' => $results];
    }

    return response()->json([
        'status' => false,
        'message' => 'No data found.',
        'data' => new \stdClass()
    ]);
}