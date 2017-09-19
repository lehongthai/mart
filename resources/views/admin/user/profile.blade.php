@extends('layouts.admin')
@section('title')

@section('css')
	<!-- Waves Effect Css -->
    <link href="{{ asset('css/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('css/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('css/plugins/morrisjs/morris.css') }}" rel="stylesheet" />
@endsection

@section('content')

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                                PROFILE USER: <small>{{ $userProfile->name }}</small>
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered"">
    <thead>
        <tr class="danger">
            <th>Key</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="active">Email</td>
            <td>{{ $userProfile->email }}</td>
        </tr>
        <tr>
            <td class="success">Birthday</td>
            <td>
                <?php
                    $date = date_create($userProfile->birthday);
                    echo date_format($date, 'd-m-Y');
                ?>
            </td>
        </tr>
        <tr>
            <td class="info">Phone</td>
            <td>{{ $userProfile->phone }}</td>
        </tr>
        <tr>
            <td class="warning">Address</td>
            <td>{{ $userProfile->address }}</td>
        </tr>
        <tr>
            <td class="danger">Status</td>
            <td>
                @if($userProfile->active == 1)
                Actived
                @else
                Not Active
                @endif
            </td>  
        </tr>
        <tr>
            <td class="info">Level</td>
            <td>
                @if($userProfile->level == 1)
                Admin
                @else
                CTV - Nhan Vien
                @endif
            </td>
        </tr>
        <tr>
            <td class="active">Date Create</td>
            <td>
                <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($userProfile->created_at))->diffForHumans(); ?>
            </td>
        </tr>
    </tbody>
</table>
                        </div>
                    </div>
                </div>
               
            </div>

@endsection

@section('js')
 <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('css/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('css/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('css/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('css/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('css/plugins/morrisjs/morris.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('css/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>
@endsection