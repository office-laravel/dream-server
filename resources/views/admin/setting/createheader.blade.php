@extends('admin.layouts.layout')

@section('page-title')
    الاعدادات
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item active"> الاعدادات العامة </li>
                            <li class="breadcrumb-item active"><a href="{{url('admin/setting/head')}}">HEADER</a></li>
                            <li class="breadcrumb-item active">جديد</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <div class="card-tools">                    
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- form start -->
                <div class="card-body  row">
                    <div class="col-lg-12"> 
                        <form action="{{ url('admin/setting/storehead') }}" id="head-form" method="POST"
                        enctype="multipart/form-data">
                                @csrf
                                <!-- name start -->
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">الوصف</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="name" id="name"
                                            placeholder="الوصف" value="">
                                        <span id="name-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <!-- name end -->
                                <!-- name start -->
                                <div class="form-group row">
                                    <label for="code" class="col-sm-3 col-form-label">الكود</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="code"></textarea>
                                        <span id="code-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <!-- name end -->
                                <div class="form-group row">
                                    <div class="col-sm-2 col-form-label"></div>
                                    <div class="col-sm-10" style="text-align: center;">
                                        <button type="submit" id="btn"
                                            class="btn btn-primary btn-submit">{{ __('general.save', [], 'ar') }}</button>
                                    </div>
                                </div>
                            </form>                      
                    </div>                  
                </div>
            </div>
               <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer -->
    </div>
    <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.card -->
@endsection
@section('js')
    <script src="{{ URL::asset('assets/admin/js/custom/settinginfo.js') }}"></script>
@endsection
@section('css')
@endsection