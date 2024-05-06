@include('flash::message')

<div class="row">
    <div class="col-md-12">
        
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ isset($row) && !empty($row) ? 'Edit' : 'Add' }} {{$moduleConfig['moduleTitle']}} For Role "{{$role->name}}"</h3>
                </div>
            </div>
            
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Module Name</th>
                        <th>Access</th>
                    
                    </tr>
                    
                    @if($adminModules->count())
                        @foreach($adminModules as $value)                         
                        <tr>
                            <td>{{$value->name}}=>{{$value->controller}} </td>
                            <td><div class="col-3"><span class="switch switch-icon"><label>
                            <input type="checkbox" value="{{$value->controller}}" name="permission_data[]" {{ (in_array($value->controller, $row->permission_data) ? 'checked' : '')}} />
                            <span></span></label></span></div></td>                            
                        </tr>
                        @endforeach
                    @endif
                </table>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-3"></div>
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
    

</script>
@endpush