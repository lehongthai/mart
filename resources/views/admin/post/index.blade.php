@php
use App\Models\Common;
@endphp
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
                                LIST POST
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <a class="btn btn-primary m-t-15 waves-effect" href="{{ route('post.create') }}">CREATE</a>
                            </ul>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Categories</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Categories</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @foreach($listPost as $post)
                                    <tr>
                                        <td>{{ $post->name }}</td>
                                        <td>
                                            @php
                                                echo Common::find($post->category_id)->name;
                                            @endphp
                                        </td>
                                        <td>
                                           <?php
                                                $date=date_create($post->created_at);
                                                echo date_format($date, 'd-m-Y');
                                            ?>     
                                        </td>
                                        <td>
                                            <li class="dropdown pull-right" style="list-style: none">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="{{ route('post.show', $post->id) }}">Show</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('post.edit', $post->id) }}">Update</a>
                                                    </li>
                                                    <li>
                                                        <a onclick="return confirm_delete('Bạn chắc chắn xóa !')"  href="{{ route('post.destroy', $post->id) }}">Delete</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </td>
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