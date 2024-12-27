@extends('site.layouts.home.layout')
@section('page-title')
    | {{ $dream->title }}
@endsection
@section('content')
    <section class="col-md-12">

        <div class="dream-detail">

            <div class=" col-sm-12   ">
                <h2><strong>{{ $dream->title }}</strong></h1>
                    <p style="padding-top: 10px ;font-size:20px">{{ Str::of($dream->content)->toHtmlString() }}</p>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12 btn-box text-center">
                <a href="{{ url('/') }}" class="btn btn-lg btn-primary ">تفسير حلم آخر </a>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script></script>
    <script src="{{ url('assets/site/js/custom/home.js') }}"></script>
@endsection
@section('css')
    <link href="{{ url('assets/site/css/custom/home.css') }}" rel="stylesheet">
@endsection
