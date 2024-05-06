@extends('layouts.backend')

@section('content')

<div class="d-flex flex-column-fluid">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Show {{$moduleConfig['moduleTitle']}}</h3>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-6">
                                
                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Name: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->name}}</label>
                                        
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Coupon Code: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->coupon_code}}</label>
                                        
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Available for: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->available_for}}</label>
                                        
                                    </div>
                                </div>

                                @if($row->available_for != 'All')
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Users: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            @php

                                            $users = $row->getSelectedUsers($row->user_ids);

                                            @endphp

                                            <label class="col-form-label text-lg-right">

                                                @if($users->count())
                                                    @foreach($users as $key => $value)
                                                        {{$key+1}}. {{$value->name}}-{{$value->email}}<br>

                                                    @endforeach
                                                @endif

                                            </label>
                                            
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Status: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">

                                        <label class="col-form-label text-lg-right">{{ $row->status ? 'Active' : 'Inactive' }}</label>
                                    
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4 text-center">
                                <a class="btn btn-primary" href="{{ route($moduleConfig['routes']['listRoute']) }}">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection