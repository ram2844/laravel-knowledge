@include('flash::message')

<div class="row">
    <div class="col-md-12">
        
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ isset($row) && !empty($row) ? 'Edit' : 'Add' }} {{$moduleConfig['moduleTitle']}}</h3>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-12">
                        
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-2 col-sm-12 text-lg-left"> Site Type </label>
                            <div class="col-lg-10 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="site_type_id" tabindex="null" >
                                    <option value="" data-slug="">Select</option>
                                    @if($siteTypes->count())
                                        @foreach($siteTypes as $value)

                                           <option {{ old('site_type_id', $row->site_type_id ?? '') == $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>

                                        @endforeach
                                    @endif
                                </select>
                                @error('site_type_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-2 col-sm-12 text-lg-left"> Menu Type </label>
                            <div class="col-lg-10 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="menu_type_id" tabindex="null" onchange="getParent(this)">
                                    <option value="" data-slug="">Select</option>
                                    @if($menuTypes->count())
                                        @foreach($menuTypes as $value)

                                           <option {{ old('menu_type_id', $row->menu_type_id ?? '') == $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>

                                        @endforeach
                                    @endif
                                </select>
                                @error('menu_type_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-2 col-sm-12 text-lg-left"> Parent Menu </label>
                            <div class="col-lg-10 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="parent_id" tabindex="null">
                                    <option value="" data-slug="">Select Parent Menu</option>
                                    @if($parents->count())
                                        @foreach($parents as $value)

                                           <option {{ old('parent_id', $row->parent_id ?? '') == $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>

                                        @endforeach
                                    @endif
                                </select>
                                @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-2 col-sm-12 text-lg-left">Name</label>
                            <div class="col-lg-10 col-md-9 col-sm-12">
                                <input type="text" name="name" value="{{ old('name', $row->name ?? '') }}" class="form-control" placeholder="Enter Name"/>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-2 col-sm-12 text-lg-left">Link</label>
                            <div class="col-lg-10 col-md-9 col-sm-12">
                                <input type="text" name="link" value="{{ old('link', $row->link ?? '')}}" class="form-control" placeholder="Enter Link"/>
                                @error('link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-2 col-sm-12 text-lg-left">Ordering</label>
                            <div class="col-lg-10 col-md-9 col-sm-12">
                                <input type="number" name="ordering_number" value="{{ old('ordering_number', $row->ordering_number ?? '')}}" min="0" max="1000" class="form-control" placeholder="Enter Link"/>
                                @error('ordering_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">

                        	<label class="col-form-label col-lg-2 col-sm-12 text-lg-left">Status</label>
							<div class="col-3">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" value="1" name="status" {{ old('status', $row->status ?? 0) == '1' ? 'checked' : '' }} />
										<span></span>
									</label>
								</span>
							</div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 text-center">
                        <button type="submit" class="btn btn-light-primary mr-2">Submit</button>
                        <a class="btn btn-primary" href="{{ route($moduleConfig['routes']['listRoute']) }}">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

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