@extends('site.layouts.home.layout')
@section('content')
    <section class="clearfix last-dreams">
        <div class="container">
            <div class="row">
                <div class=" col-sm-12 home-sec-1 ">
                    <h1><strong> تفاسير الاحلام</strong></h1>

                </div>
            </div>
            <div class="row row-cards">
                @forelse ($dreams as $last_dream)
                    <div class=" col-md-4 post-card-container   ">
                        <div class="  post-card ">
                            <a href="{{ url('dreams', $last_dream->id) }}">
                                <p class=" ">{{ $last_dream->title }}</p>
                            </a>
                            <p class=" ">{{ Illuminate\Support\Str::limit($last_dream->content, 60) }}</p>
                            <div class="post-card-botom">
                                <span> {{ Illuminate\Support\Carbon::parse($last_dream->created_at)->diffForHumans() }}
                                </span>

                            </div>
                        </div>

                    </div>
                @empty
                    <div class=" col-md-12 ">
                        <span style="text-align:center;">لايوجد تفاسير</span>
                    </div>
                @endforelse

            </div>
    </section>
@endsection

@section('js')
@endsection
@section('css')
    <link href="{{ url('assets/site/css/custom/home.css') }}" rel="stylesheet">
@endsection
