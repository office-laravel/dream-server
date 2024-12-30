@extends('admin.layouts.layout')

@section('page-title')
    التفاسير
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
                            <li class="breadcrumb-item active"><a href="{{ url('/admin/dream') }}">التفاسير</a></li>
                            <li class="breadcrumb-item active">تفاصيل</li>
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
                    <h3 class="card-title">تفاصيل</h3>
                </div>
                <!-- form start -->
                <div class="card-body  row">
                    <div class="col-lg-8">
                        <form action="{{ url('admin/dream/update', $dream->id) }}" class="form-horizontal" id="page-form"
                            method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="form-group row col-md-4">
                                    <label for="title" class="col-sm-4 col-form-label">الجنس</label>
                                    <div class="col-sm-8">
                                        <span class="form-control">{{ $dream->gender }}</span>
                                    </div>
                                </div>
                                <!--   start -->
                                <div class="form-group row col-md-4">
                                    <label for="title" class="col-sm-6 col-form-label">الوضع العائلي</label>
                                    <div class="col-sm-6">
                                        <span class="form-control">{{ $dream->martial }}</span>
                                    </div>
                                </div>
                                <!--   start -->
                                <div class="form-group row col-md-4">
                                    <label for="title" class="col-sm-3 col-form-label">العمر</label>
                                    <div class="col-sm-9">
                                        <span class="form-control">{{ $dream->age }}</span>
                                    </div>
                                </div>
                            </div>
                            <!--   start -->
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">العنوان</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title"class="form-control" id="title"
                                        placeholder="* النص" value="{{ $dream->title }}">
                                    <span id="title-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!--   start -->
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">تفاصيل الحلم</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="question" id="question">{{ $dream->question }}</textarea>

                                    <span id="question-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!--   start -->
                            <div class="form-group row">
                                <label for="content" class="col-sm-3 col-form-label">التفسير </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="content" id="content">{{ $dream->content }}</textarea>
                                    <span id="content-error" class="error invalid-feedback"></span>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">الحالة</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="status" id="status">
                                        <option value="2"
                                            @if ($dream->status == '2') @selected(true) @endif>بانتظار
                                            الموافقة</option>
                                        <option value="1"
                                            @if ($dream->status == '1') @selected(true) @endif>موافق
                                        </option>
                                        <option value="0"
                                            @if ($dream->status == '0') @selected(true) @endif>مرفوض
                                        </option>

                                    </select>
                                    <span id="status-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">
                                    <button type="submit" name="btn_save"
                                        class="btn btn-primary btn-submit">{{ __('general.save', [], 'ar') }}</button>
                                    <a class="btn btn-danger float-right "
                                        href="{{ url('admin/page') }}">{{ __('general.cancel', [], 'ar') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4  sm-3  ">
                    </div>

                    <hr>



                </div>
            </div>
            <!-- first_name end -->
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer -->

    </div>
    <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>
@endsection


@section('css')
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/custom/content.css') }}">  --}}
    <!-- summernote -->
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('js')
    <script src="{{ URL::asset('assets/admin/js/custom/validate.js') }}"></script>
    <script src="{{ URL::asset('assets/admin//plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/custom/dream.js') }}"></script>
    <script>
        $(function() {
            $('.textarea').summernote();

        });
    </script>
@endsection
