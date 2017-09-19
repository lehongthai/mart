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