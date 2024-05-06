@extends('layouts.backend')

@section('content')

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
        		<!--begin::Card-->
				<div class="card card-custom">
					<div class="card-header flex-wrap border-0 pt-6 pb-0">
						<div class="card-title">
							<h3 class="card-label">{{$moduleConfig['moduleTitle']}} 
							<span class="d-block text-muted pt-2 font-size-sm">  </span></h3>
						</div>
						<div class="card-toolbar">
							<a href="{{ route($moduleConfig['routes']['createRoute']) }}" class="btn btn-light-primary font-weight-bold ml-2"> + Add</a>
							<form action="{{ route('admin.user.export') }}" method="POST" style="display: flex;">
								@csrf()
	                            <button type="submit" class="btn btn-light-info font-weight-bold ml-2"> Export</button>
							</form>
						</div>
					</div>
					<div class="card-body">
						
                		@include('flash::message')
	                    
						<!--begin: Search Form-->
						<div class="mb-2">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<div class="input-icon">
											<input type="text" class="form-control search_text" name="search_text" placeholder="Search" value="">
											<span>
	                                            <i class="flaticon2-search-1 text-muted"></i>
	                                        </span>
										</div>
									</div>
								</div>
								<div class="col-md-1">
									<a href="javascript:void(0)" class="btn btn-primary search_bttn">
										Search
									</a>
								</div>
								<div class="col-md-1">
									<button class="btn btn-default refresh_all">
										<i class="flaticon-refresh text-danger"></i>
									</button>
								</div>

							</div>
						</div>
						<!--end: Search Form-->
						<!--begin: Datatable-->
						<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
							
						</div>
						<!--end: Datatable-->
					</div>
				</div>
				<!--end::Card-->
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
	<script type="text/javascript">

    jQuery(document).ready((function() {

		var url 			= '{!! route($moduleConfig['routes']['fetchDataRoute']) !!}';
		var columnsArray 	=	[
            
            {
                field: 'rowNo',
                title: '#',
                // sortable: 'asc',
                width: 30,
                type: 'number',
                selector: false,
                textAlign: 'center',
            },
            {
                field: "name",
                title: "name",
            }, 
            {
                field: "email",
                title: "email"
            },
            {
                field: "role_id",
                title: "role",
                template: function(t) {
                    return '<span class="label font-weight-bold label-lg label-light-info label-inline">' + (( typeof t?.role?.name != 'undefined' && t?.role?.name)? t?.role?.name : 'N/A') + '</span>';
                }
            },	
            {
                field: "status",
                title: "status",
                template: function(t) {
                    var status = {
                        0: {
                            'title': 'Inactive',
                            'class': ' label-light-danger'
                        },
                        1: {
                            'title': 'Active',
                            'class': ' label-light-success'
                        }
                        
                    };
                    return '<span class="label font-weight-bold label-lg ' + status[t?.status]?.class + ' label-inline">' + status[t?.status]?.title + '</span>';
                },
            },	
            {
                field: "webhook_status",
                title: "webhook status",
                template: function(t) {
                    var status = {
                        0: {
                            'title': 'Pending',
                            'class': ' label-light-warning'
                        },
                        1: {
                            'title': 'Success',
                            'class': ' label-light-success'
                        },
                        2: {
                            'title': 'Failed',
                            'class': ' label-light-danger'
                        }
                        
                    };

                    // <button type="button" class="btn btn-secondary" data-container="body" data-toggle="tooltip" data-placement="right" title="Example content">
					//     tooltip on right
					// </button>
                    var webhook_re_submit_html = '';
                    if(t?.webhook_status != 1){
                    	webhook_re_submit_html = '<br><br><a href="'+__BASE_URL_JS__ +'admin/user/webhook/re-submit/'+t?.id+'" class="label font-weight-bold label-lg label-light-success label-inline label-inline"> Re-Submit</a>'
                    }

                    return '<span class="label font-weight-bold label-lg ' + status[t?.webhook_status]?.class + ' label-inline">' + status[t?.webhook_status]?.title + '</span>'+webhook_re_submit_html;
                },
            },		
            {
                field: "actions",
                title: "actions",
                sortable: false,
            }, 
        ];
	    var table_id	=	'kt_datatable';
	    const t = KTDatatableRemoteAjaxDemo.init(url, columnsArray,  table_id,	null);

	    $(".search_text").on("change", function() {
    		
    		t.search($(this).val().toLowerCase(),'search');
    		
	    });

	    $(".refresh_all").on("click", function() {
    		window.location.reload();

    	});

	}));

	</script>
@endpush