<!DOCTYPE html>
<html lang="ar" dir="rtl">
@php
    $sitedataCtrlr = new App\Http\Controllers\Web\SiteDataController();
    $mainarr = $sitedataCtrlr->FillStaticData();
@endphp
@include('site.layouts.home.head')
@include('site.layouts.home.header')
@foreach ($mainarr['bodylist'] as $bodyrow)
    {{ Str::of($bodyrow['value1'])->toHtmlString() }}
@endforeach
@yield('content')
@include('site.layouts.home.footer')

</html>
