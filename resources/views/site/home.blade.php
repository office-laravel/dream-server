@extends('site.layouts.home.layout')
@section('content')
    <section id="intro" class="clearfix">
        <div class="container">
            <div class="row">
                <div class=" col-sm-12 home-sec-1 ">
                    <h2><strong>تفسير أحلام فوري </strong></h2>
                    <p>اكتشف المعاني الخفية في أحلامك مع تفسيرنا المدعوم بالذكاء الاصطناعي</p>
                </div>
            </div>

        </div>
    </section>
    <section class="col-md-12">
        <form action="{{ url('senddream') }}" id="form-ai" method="post">
            <div class="signup-form">

                <div class="row form-row">
                    <div class=" form-group col-md-12">
                        <h2>معلوماتك الشخصية</h2>
                    </div>

                    <div class=" form-group col-md-3">
                        <label> الجنس </label>
                        <div class="dropdown bootstrap-select healthCase std_select">
                            <select class=" form-control std_select std_select_big required mobile-device" name="gender">
                                <option value="0">اختر الجنس </option>
                                <option value="ذكر">ذكر</option>
                                <option value="انثى">انثى</option>
                            </select>
                        </div>
                    </div>
                    <div class=" form-group col-md-3">
                        <label> الوضع العائلي</label>
                        <div class="dropdown bootstrap-select healthCase std_select">
                            <select class="form-control std_select std_select_big required mobile-device" name="martial">
                                <option value="0">الوضع العائلي</option>
                                <option value="اعزب">اعزب</option>
                                <option value="متزوج">متزوج</option>
                                <option value="مطلق">مطلق</option>
                                <option value="ارمل">ارمل</option>
                            </select>
                        </div>
                    </div>
                    <div class=" form-group col-md-5">
                        <label>العمر (سنة)</label>
                        <div>
                            <b class="b-slide">10</b>
                            <input type="text" name="age" style="direction: rtl" id="age-slide" class="span2"
                                value="" data-slider-min="10" data-slider-value="20" data-slider-max="100"
                                data-slider-step="1" />
                            <b class="b-slide">100</b>
                        </div>

                    </div>
                    <div class="form-group col-md-12"><label>ادخل الحلم بالتفصيل <sup>*</sup> </label>
                        <textarea class="form-control   required " name="question" id="question"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 btn-box d-flex justify-content-between flex-row-reverse ">
                        <button type="submit" class="btn btn-lg btn-primary ask-btn">ارسال
                        </button>
                    </div>
                </div>
            </div>
            @csrf
        </form>
        <div class=" signup-form dream-result " id="dream-result-section" style="display: none">
            <div class="form-group col-md-12">
                <div class=" form-group col-md-12">
                    <h2>تفسير الحلم </h2>
                </div>
                <p class=" " name="answer" id="answer"></p>
            </div>
        </div>
    </section>
    <section class="clearfix last-dreams">
        <div class="container">
            <div class="row">
                <div class=" col-sm-12 home-sec-1 ">
                    <h2><strong>احدث تفسيرات الاحلام</strong></h2>

                </div>
            </div>
            <div class="row row-cards">
                @forelse ($last_dreams as $last_dream)
                    <div class=" col-md-4 post-card-container   ">
                        <div class="  post-card ">
                            <p class=" ">{{ $last_dream->title }}</p>
                            <div class="post-card-botom">
                                <span> {{ Illuminate\Support\Carbon::parse($last_dream->created_at)->diffForHumans() }}
                                </span>
                                <a href="{{ url('dreams', $last_dream->slug) }}" class=" ">اقرأ المزيد ←</a>
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
    <script>
        var token = '{{ csrf_token() }}';
    </script>
    <script src="{{ url('assets/site/js/custom/home.js') }}"></script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/ai.js') }}"></script>
@endsection
@section('css')
    <link href="{{ url('assets/site/css/custom/home.css') }}" rel="stylesheet">
@endsection
