@extends('layouts.admin')
@section('title')

@section('css')
	<!-- Waves Effect Css -->
    <link href="{{ asset('css/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('css/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Bootstrap Spinner Css -->
    <link href="{{ asset('css/plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- Masked Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        <form role="form" method="POST" action="{{ route('user.update') }}">
                        {{ csrf_field() }}
                            <h2 class="card-inside-title">CREATE PRODUCT</h2>
                            <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                <label>Fullname</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" placeholder="FullName" />
                                        </div>
                                        <label id="email-error" class="error">{{ $errors->first('name') }}</label>
                                    </div>
                                <label>Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control" placeholder="Address" />
                                        </div>
                                        <label id="email-error" class="error">{{ $errors->first('address') }}</label>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                $date = date_format(date_create($user->birthday), 'd-m-Y');
                            ?>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <b>Birthday</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" name="birthday" value="{{ old('birthday', $date) }}" placeholder="Ex: 30/07/2016">
                                            </div>
                                            <label id="email-error" class="error">{{ $errors->first('birthday') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Mobile Phone Number</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone_iphone</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control mobile-phone-number" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Ex: +00 (000) 000-00-00">
                                            </div>
                                            <label id="email-error" class="error">{{ $errors->first('phone') }}</label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row clearfix">
                                <div class="col-sm-12">
                                <label>Note</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="note" class="form-control no-resize" placeholder="Please type what you want...">{{ old('note', $user->note) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                            <div class="pull-right">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">UPDATE</button>
                            </div>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Masked Input -->
@endsection

@section('js')
 <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('css/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('css/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset('css/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>

    <script src="{{ asset('css/plugins/dropzone/dropzone.js') }}"></script>

    <!-- Input Mask Plugin Js -->
    <script src="{{ asset('css/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('css/plugins/node-waves/waves.js') }}"></script>

@endsection

@section('js_admin')
    <script src="{{ asset('js/pages/forms/advanced-form-elements.js') }}"></script>
@endsection