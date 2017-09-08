<!-- subnav -->
<div class="subnav">
  <div class="container">
    <div class="row">

      <div class="col-md-8">
        <div class="social-icons-subnav">
          <a href="#"><span class="ti-location-pin"></span>@if(Voyager::setting('company_address')){{ Voyager::setting('company_address') }}@endif</a>
          <a href="#"><span class="ti-mobile"></span>@if(Voyager::setting('company_tel')){{ Voyager::setting('company_tel') }}@endif</a>
          <a href="#"><span class="ti-time"></span>@if(Voyager::setting('company_work_hour')){{ Voyager::setting('company_work_hour') }}@endif</a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="right">
            <div class="social-icons-subnav">
                <a href="@if(Voyager::setting('site_fb_acc')){{Voyager::setting('site_fb_acc')}}@endif"><span class="ti-facebook"></span></a>
                <a href="@if(Voyager::setting('site_youtube_channel')){{Voyager::setting('site_youtube_channel')}}@endif"><span class="ti-youtube"></span></a>

            </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- subnav end -->

<!-- nav -->
<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="row">

      <!-- menu mobile display -->
      <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
      <span class="icon icon-bar"></span>
      <span class="icon icon-bar"></span>
      <span class="icon icon-bar"></span></button>

      <div class="logo-wrapper clearfix">
        <!-- logo -->
        <a class="navbar-brand" href="/"><img alt="logo" src="@if(Voyager::setting('site_logo')){{ asset('storage/'.Voyager::setting('site_logo')) }}@endif"></a>
      </div>


        <!-- mainmenu start -->
        <div class="menu-init clearfix" id="main-menu">
          <nav id="menu-center">
            <ul>
              <li>
               <a class="actived" href="{{ URL('/') }}">Home</a>
              </li>
              <li><a href="#">About</a>
                <ul>
                  <li><a href="{{ route('visitor.about_us') }}">About Us</a></li>
                  <li><a href="{{ route('visitor.history') }}">Our History</a></li>
                </ul>
              </li>
                <li><a href="{{ route('visitor.services') }}">Services</a>
                <ul>
                @foreach($serviceMenus as $menu)
                  <li><a href="{{ route('visitor.service.detail', $menu->slug) }}">{{ $menu->title }}</a></li>
                @endforeach
                </ul>
              </li>
              <li>
                <a  href="{{ route('visitor.projects') }}">Projects</a>
              </li>
              <li><a href="{{ route('visitor.blog') }}">Blog</a></li>
              <li><a  href="{{ route('visitor.contact') }}">Contact</a></li>
              <!-- <li class="btn"><a class="popup-form" href="#subwrap">Get a Quote</a></li> -->
            </ul>
          </nav>
        </div>
        <!-- mainmenu end -->


      </div>
  </div>
  <!-- container -->
</div>
<!-- nav end -->


