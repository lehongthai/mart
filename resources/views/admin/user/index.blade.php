@extends('layouts.admin')
@section('title', $title)

@section('css')
	<!-- Waves Effect Css -->
    <link href="{{ asset('css/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('css/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ asset('css/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LIST USER
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Birthday</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Birthday</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @foreach($listUser as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                        @if($user->level == 1) Admin 
                                        @else CTV - Nhan Vien 
                                        @endif
                                        </td>
                                        <td>
                                        <?php
                                        echo date_format(date_create($user->birthday), 'd-m-Y');
                                        ?>
                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                @endforeach   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('js')
    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('css/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('css/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('css/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('css/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('css/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('css/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('css/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('css/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('css/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('css/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
@endsection

@section('js_admin')
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
@endsection