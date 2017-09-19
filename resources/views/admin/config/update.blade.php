@extends('layouts.admin')
@section('title', $title)

@section('css')
    <!-- Waves Effect Css -->
    <link href="{{ asset('css/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('css/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('css/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('css/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{ asset('css/plugins/waitme/waitMe.css') }}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('css/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endsection

@section('content')

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        <form role="form" method="POST" action="{{ route('config.update', $config->id) }}">
                        {{ csrf_field() }}
                            <h2 class="card-inside-title">UPDATE CONFIG</h2>
                            <div class="row clearfix">
                            <div class="col-sm-2">
                                    <label>Config Slug</label>
                                </div>
                            
                                <div class="col-sm-6">
                                    <select class="form-control show-tick" name="slug">
                                        <option value="">-- Please select --</option>
                                        <?php foreach(switchStringSlugToArraySlug() as $key => $slug): ?>
                                        <option value="{{ $key }}" 
                                            @if(old('slug') == $key || $config->slug == $key) selected  @endif 
                                        >{{ $slug }}</option>
                                        <?php endforeach ?>
                                    </select>
                                    
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <label id="email-error" class="error">{{ $errors->first('slug') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                <label>Config Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="name" value="{{ old('name', $config->name) }}" class="form-control" placeholder="Config Name" />
                                        </div>
                                        <label id="email-error" class="error">{{ $errors->first('name') }}</label>
                                    </div>
                                <label>Config Value</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="value" value="{{ old('value', $config->value) }}" class="form-control" placeholder="Config Value" />
                                        </div>
                                        <label id="email-error" class="error">{{ $errors->first('value') }}</label>
                                    </div>
                                    </div>
                                    </div>
                            <div class="row clearfix">
                            <div class="pull-right">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">UPDATE</button>
                            </div>
                            </div>
                            </form>
                    </div>
                </div>
            </div>

@endsection

@section('js')
    <script src="{{ asset('css/plugins/node-waves/waves.js') }}"></script>

    <!-- Autosize Plugin Js -->
    <script src="{{ asset('css/plugins/autosize/autosize.js') }}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ asset('css/plugins/momentjs/moment.js') }}"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ asset('css/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
@endsection

@section('js_admin')
    <script src="{{ asset('js/pages/forms/basic-form-elements.js') }}"></script>
@endsection