     <body dir="rtl"> 
  
      <!--  الرئيسية   -->
  
      <nav class="navbar navbar-expand-lg navbar-light   main-navbar  fixed-top " id="main-fix">
  
          <div class="container">
            <button class="navbar-toggler" type="button" id="menu-toggle">
                <span class="navbar-toggler-icon"></span>
            </button>
              <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ $mainarr['logo']}}"  alt="Logo" class="logo">
              </a>
              <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('site.home') }}"><i class="bi bi-house"></i> الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('dreams') }}"><i class="bi bi-moon-stars"></i> التفاسير</a>
                    </li>
                    
                     
                </ul>
            </div>
            
          </div>
  
  
  
  
      </nav>
 
      <div id="sidebar" class="sidebar">
        <button class="btn-close" id="close-sidebar"><i class="fa fa-times"></i></button>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.home') }}"><i class="bi bi-house"></i> الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('search') }}"><i class="bi bi-moon-stars"></i> التفاسير</a>
            </li>
            
        </ul>
    </div>
