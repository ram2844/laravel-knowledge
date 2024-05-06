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
                            <h3 class="card-label">{{$moduleConfig['moduleTitle']}} - <span class="text-dark-50">{{$programDetail->program->name}}</span> - <span class="text-dark-50">{{$programDetail->event_date}}, {{$programDetail->from_time}}-{{$programDetail->to_time}} </span>
                            <span class="d-block text-muted pt-2 font-size-sm">  </span></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="{{ route($moduleConfig['routes']['listRouteDates'], ['program_id' => $programDetail->program_id]) }}" class="btn btn-light-primary font-weight-bold ml-2"> &#8592; Back</a>

                            <!-- <form action="{{ route('admin.volunteer.export') }}" method="POST" style="display: flex;">
                                @csrf()
                                <button type="submit" class="btn btn-light-info font-weight-bold ml-2"> Export</button>
                            </form> -->
                        </div>
                    </div>
                    <div class="card-body">
                        
                        @include('flash::message')
                        
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

        var url             = '{!! route($moduleConfig['routes']['fetchDataRouteDateCustomers'], ['program_detail_id' => $programDetail->id]) !!}';
        var columnsArray    =   [
            {
                field: 'id',
                title: '#',
                sortable: false,
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
                sortable: false,
            },
            {
                field: "email",
                title: "email",
                sortable: false,
            },
            {
                field: "contact",
                title: "contact",
                sortable: false,
            },
            
            {
                field: "program_qty",
                title: "booked seats",
                sortable: false,
                template: function(t) {
                    return `<div class="d-flex align-items-center">
                                <div class="ml-2">
                                    <div class="font-size-sm text-primary font-weight-bold line-height-sm">${( t?.has_vip <= 0 ? t?.program_qty : 0)}</div>
                                    <div class="text-dark-75 font-weight-bold line-height-sm">${t?.total_seats ?? 'N/A'}</div>
                                </div>
                            </div>`
                }
            }, 
            {
                field: "has_vip",
                title: "booked seats vip",
                sortable: false,
                template: function(t) {
                    return `<div class="d-flex align-items-center">
                                <div class="ml-2">
                                    <div class="font-size-sm text-primary font-weight-bold line-height-sm">${( t?.has_vip > 0 ? t?.program_qty : 0)}</div>
                                    <div class="text-dark-75 font-weight-bold line-height-sm">${t?.vip_seats ?? 'N/A'}</div>
                                </div>
                            </div>`
                }
            }
        ];
        var table_id    =   'kt_datatable';
        const t = KTDatatableRemoteAjaxDemoSimple.init(url, columnsArray,  table_id,  null);

        $(".search_text").on("change", function() {
            
            t.search($(this).val().toLowerCase(),'search');
            
        });

        $(".refresh_all").on("click", function() {
            window.location.reload();

        });

    }));

    </script>
@endpush