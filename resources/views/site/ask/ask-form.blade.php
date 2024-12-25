@extends('site.layouts.home.layout')
@section('content')
    <div class="signup-page">
        <div class="page-hero"></div>
        <main class="container">
            <div class="row main-content">
                <section class="col-md-12">
                    <form action="{{ url( 'senddream') }}" id="form-signup" method="post"  >
                        <div class="signup-form">
                            <h1>تفسير </h1>
                            <div class="row"> </div>
                          
                            <div class="  show "  >
                                <h2>معلومات  </h2>
                                <div class="row">
                                    <div class="form-group col-md-12"><label>ادخل الحلم بالتفصيل  <sup>*</sup> </label>
                                        <textarea class="form-control   required " name="question" id="question"></textarea>
                                    </div>
                                  
                                  
                                </div>
                             
                                <div class="row">
                                    <div
                                        class="col-md-12 btn-box d-flex justify-content-between flex-row-reverse signup-form__btns">
                                        <button type="submit" class="btn btn-lg btn-primary ask-btn" data-step="2">ارسال
                                            <i class="icon_nextone"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        @csrf
                    </form>
                    <div class=" signup-form "  >
                    <div class="form-group col-md-12"><label>تفسير الحلم </label>
                        <textarea class="form-control" rows="10" name="answer" id="answer"></textarea>
                    </div>
                </div> 
                </section>
            </div>
        </main>
    </div>
@endsection
@section('css')
    <link href="{{ asset('assets/site/css/custom/sign-form.css') }}" rel="stylesheet">
@endsection
@section('js')
    <script>
      
  
        var token= '{{ csrf_token() }}';
    </script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/ai.js') }}"></script>
@endsection
