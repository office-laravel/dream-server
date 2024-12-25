<!DOCTYPE html> 
<html lang="ar" dir="rtl">
    @php
      $sitedataCtrlr=new App\Http\Controllers\Web\SiteDataController();  
      $mainarr=$sitedataCtrlr->FillStaticData();   
    @endphp  
  @include('site.layouts.home.head') 
  @include('site.layouts.home.header') 
  @yield('content')
  @include('site.layouts.home.footer')
</html>
