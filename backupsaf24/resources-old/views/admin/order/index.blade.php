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
							<div class="dropdown dropdown-inline mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>Filters</button>
                                <!--begin::Dropdown Menu-->
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                                        <li class="navi-item">
                                            <a href="{{ route($moduleConfig['routes']['listRoute'], ['type' => 'all']) }}" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="la la-copy"></i>
                                                </span>
                                                <span class="navi-text">All</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="{{ route($moduleConfig['routes']['listRoute'], ['type' => 'pending']) }}" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="la la-copy"></i>
                                                </span>
                                                <span class="navi-text">Pending</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="{{ route($moduleConfig['routes']['listRoute'], ['type' => 'Success']) }}" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="la la-copy"></i>
                                                </span>
                                                <span class="navi-text">Success</span>
                                            </a>
                                        </li>

                                        <li class="navi-item">
                                            <a href="{{ route($moduleConfig['routes']['listRoute'], ['type' => 'Failed']) }}" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="la la-copy"></i>
                                                </span>
                                                <span class="navi-text">Failed</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                                <!--end::Dropdown Menu-->
                            </div>
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

		var url 			= '{!! route($moduleConfig['routes']['fetchDataRoute'], ['type' => $_GET['type']]) !!}';
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
                field: "created_at_human",
                title: "Booked On",
            }, 
            {
                field: "order_number",
                title: "order number",
            },
            {
                field: "name",
                title: "name",
            },
            {
                field: "email",
                title: "email",
            }, 
            {
                field: "total_amount",
                title: "total amount",
                template: function(t) {

                    return "<i class='fas fa-rupee-sign icon-sm'></i> " + (t.total_amount ? t.total_amount.toFixed(2) : 0.00);
                },
            }, 
            {
                field: "payment_status",
                title: "status",
                template: function(t) {
                    var status = {
                        'PENDING': {
                            'title': 'Pending',
                            'class': ' label-light-info'
                        },
                        'SUCCESS': {
                            'title': 'Success',
                            'class': ' label-light-success'
                        },
                        'FAILED': {
                            'title': 'Failed',
                            'class': ' label-light-danger'
                        }
                    };

                    return '<span class="label font-weight-bold label-lg ' + status[t?.payment_status]?.class + ' label-inline">' + (status[t?.payment_status]?.title ?? t?.status) + '</span>';
                },
            }, 
            // {
            //     field: "status",
            //     title: "status",
            //     template: function(t) {
            //         var status = {
            //             'PENDING': {
            //                 'title': 'Pending',
            //                 'class': ' label-light-info'
            //             },
            //             'PROCESSING': {
            //                 'title': 'Processing',
            //                 'class': ' label-light-warning'
            //             },
            //             'COMPLETED': {
            //                 'title': 'Completed',
            //                 'class': ' label-light-success'
            //             }
            //         };

            //         return '<span class="label font-weight-bold label-lg ' + status[t?.status]?.class + ' label-inline">' + (status[t?.status]?.title ?? t?.status) + '</span>';
            //     },
            // },		
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