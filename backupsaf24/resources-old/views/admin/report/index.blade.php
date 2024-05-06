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

                            <form action="{{ route('admin.report.export') }}" method="POST" style="display: flex;">
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

        var url             = '{!! route($moduleConfig['routes']['fetchDataRoute']) !!}';
        var columnsArray    =   [
            {
                field: 'id',
                title: '#',
                // sortable: 'asc',
                width: 30,
                type: 'number',
                selector: false,
                textAlign: 'center',
                template: function(t, i, o) {

                    var index = i + 1;
                    var page = o?.API?.params?.pagination?.page;
                    var perpage = o?.API?.params?.pagination?.perpage;
                    var offset = (page - 1) * perpage;

                    return (index + offset);
                }
            },  
            {
                field: "name",
                title: "name",
            }, 
            {
                field: "category_id",
                title: "category",
                template: function(t, e, o) {

                    return ( typeof t?.category?.name != 'undefined' && t?.category?.name)? t?.category?.name : 'N/A';
                }
            },
            {
                field: "total_booked_seats",
                title: "seats",
                // sortable: false,
                template: function(t) {
                    return `<div class="d-flex align-items-center">
                                <div class="ml-2">
                                    <div class="font-size-sm text-primary font-weight-bold line-height-sm">${t?.total_booked_seats ?? 'N/A'}</div>
                                    <div class="text-dark-75 font-weight-bold line-height-sm">${t?.total_seats_normal ?? 'N/A'}</div>
                                </div>
                            </div>`
                }
            }, 
            {
                field: "total_booked_seats_vip",
                title: "seats vip",
                // sortable: false,
                template: function(t) {
                    return `<div class="d-flex align-items-center">
                                <div class="ml-2">
                                    <div class="font-size-sm text-primary font-weight-bold line-height-sm">${t?.total_booked_seats_vip ?? 'N/A'}</div>
                                    <div class="text-dark-75 font-weight-bold line-height-sm">${t?.total_seats_vip ?? 'N/A'}</div>
                                </div>
                            </div>`
                }
            }, 
            {
                field: "amount",
                title: "amount",
                template: function(t) {
                    return t?.amount > 0 ? "<i class='fas fa-rupee-sign icon-sm'></i> " + t.amount.toFixed(2) : '<div class="font-size-sm text-success font-weight-bold line-height-sm">Free</div>';
                }

            }, 
            {
                field: "actions",
                title: "actions",
                sortable: false,
            }, 
        ];
        var table_id    =   'kt_datatable';
        const t = KTDatatableRemoteAjaxDemo.init(url, columnsArray,  table_id,  null);

        $(".search_text").on("change", function() {
            
            t.search($(this).val().toLowerCase(),'search');
            
        });

        $(".refresh_all").on("click", function() {
            window.location.reload();

        });

    }));

    </script>
@endpush