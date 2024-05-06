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

                            <form action="{{ route('admin.user_report.export') }}" method="POST" style="display: flex;">
                                @csrf()
                                <input type="hidden" name="search" value="">
                                <input type="hidden" name="utm_source" value="">
                                <input type="hidden" name="utm_medium">
                                <input type="hidden" name="utm_campaign" value="">
                                <input type="hidden" name="utm_term" value="">
                                <input type="hidden" name="utm_content" value="">
                                <input type="hidden" name="date" value="">
                                <button type="submit" class="btn btn-light-info font-weight-bold ml-2"> Export</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        @include('flash::message')
                        
                        <!--begin: Search Form-->
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" id="search_text" placeholder="Search" value="">
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center">
                                        <select class="form-control selectpicker" id="utm_source">
                                            <option value="">Select UTM Source</option>

                                            @if(isset($utm_sources) && !empty($utm_sources))
                                                @foreach($utm_sources as $key => $value)
                                                    <option value="{{ $value}}">
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            @endif
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center">
                                        <select class="form-control selectpicker" id="utm_medium">
                                            <option value="">Select UTM Medium</option>

                                            @if(isset($utm_mediums) && !empty($utm_mediums))
                                                @foreach($utm_mediums as $key => $value)
                                                    <option value="{{ $value}}">
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            @endif
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center">
                                        <select class="form-control selectpicker" id="utm_campaign">
                                            <option value="">Select UTM Campaign</option>

                                            @if(isset($utm_campaigns) && !empty($utm_campaigns))
                                                @foreach($utm_campaigns as $key => $value)
                                                    <option value="{{ $value}}">
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            @endif
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center">
                                        <select class="form-control selectpicker" id="utm_term">
                                            <option value="">Select UTM Term</option>

                                            @if(isset($utm_terms) && !empty($utm_terms))
                                                @foreach($utm_terms as $key => $value)
                                                    <option value="{{ $value}}">
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            @endif
                                           
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="d-flex align-items-center">
                                        <select class="form-control selectpicker" id="utm_content">
                                            <option value="">Select UTM Content</option>

                                            @if(isset($utm_contents) && !empty($utm_contents))
                                                @foreach($utm_contents as $key => $value)
                                                    <option value="{{ $value}}">
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            @endif
                                           
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <input type="text" class="form-control kt_datepicker" id="date" placeholder="Select Date" value="" readonly>
                                            <span>
                                                <i class="flaticon2-calendar-5 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 text-right">
                                    <a href="javascript:void(0)" class="btn btn-primary search_bttn">
                                        Search
                                    </a>&nbsp;&nbsp;

                                    <button type="button" class="btn btn-default refresh_all">
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
                template: function(t) {
                    return `<div class="d-flex align-items-center">
                                <div class="ml-2">
                                    <div class="font-size-sm text-primary font-weight-bold line-height-sm">${t?.name ?? 'N/A'}</div>
                                    <div class="text-dark-75 font-weight-bold line-height-sm">${t?.email ?? 'N/A'}</div>
                                    <div class="text-dark-75 font-weight-bold line-height-sm">${t?.contact ?? 'N/A'}</div>
                                </div>
                            </div>`
                }
            },
            {
                field: "utm_source",
                title: "utm source"
            },
            {
                field: "utm_medium",
                title: "utm medium"
            },
            {
                field: "utm_campaign",
                title: "utm campaign"
            },
            {
                field: "local_created_at",
                title: "Registration Date",
                template: function(t) {

                    return moment(t?.local_created_at).format('DD/MM/YYYY hh:mm:ss A');
                    
                }
            }
        ];
        var table_id    =   'kt_datatable';
        const t = KTDatatableRemoteAjaxDemo.init(url, columnsArray,  table_id,  null);

        $("#search_text").on("change", function() {
            
            t.search($(this).val().toLowerCase(),'search');
            exportFilterHandler();
            
        });

        $("#utm_source").on("change", function() {
            
            t.search($(this).val().toLowerCase(),'utm_source');
            exportFilterHandler();
            
        });

        $("#utm_medium").on("change", function() {
            
            t.search($(this).val().toLowerCase(),'utm_medium');
            exportFilterHandler();
            
        });

        $("#utm_campaign").on("change", function() {
            
            t.search($(this).val().toLowerCase(),'utm_campaign');
            exportFilterHandler();
            
        });

        $("#utm_term").on("change", function() {
            
            t.search($(this).val().toLowerCase(),'utm_term');
            exportFilterHandler();
            
        });

        $("#utm_content").on("change", function() {
            
            t.search($(this).val().toLowerCase(),'utm_content');
            exportFilterHandler();
            
        });

        $("#date").on("change", function() {
            
            t.search($(this).val().toLowerCase(),'date');
            exportFilterHandler();
            
        });

        $(".refresh_all").on("click", function() {
            window.location.reload();

        });

    }));

    function exportFilterHandler(){

        $("input[name=search]").val($("#search_text").val());
        $("input[name=utm_source]").val($("#utm_source").val());
        $("input[name=utm_medium]").val($("#utm_medium").val());
        $("input[name=utm_campaign]").val($("#utm_campaign").val());
        $("input[name=utm_term]").val($("#utm_term").val());
        $("input[name=utm_content]").val($("#utm_content").val());
        $("input[name=date]").val($("#date").val());

    }

    </script>
@endpush