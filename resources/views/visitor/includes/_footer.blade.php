<!-- subfooter -->
<section aria-label="footer" class="subfooter">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-xs-12">
          <div class="logo">
            <img alt="logo" src="@if(Voyager::setting('site_logo')){{ asset('storage/'.Voyager::setting('site_logo')) }}@endif">
          </div>

          <h3>
            CONTACT INFO
          </h3>

          <address>
            <span><strong>ADDRESS:</strong>
              @if(Voyager::setting('company_address')){{ Voyager::setting('company_address') }}@endif
            </span>
            <span><strong>PHONE:</strong>
              @if(Voyager::setting('company_tel')){{ Voyager::setting('company_tel') }}@endif
            </span>
            <span><strong>EMAIL:</strong>
              @if(Voyager::setting('company_email'))
              <a href="mailto:{{ Voyager::setting('company_email') }}">
                {{ Voyager::setting('company_email') }}
              </a>
              @endif
            </span>
            <span><strong>SITE:</strong>
              <a href="/">
              @if(Voyager::setting('site_domain')){{ Voyager::setting('site_domain') }}@endif
              </a>
            </span>
          </address>
      </div>

      <div class="col-md-3 col-xs-12">
          <h3>
            SITE MENU
          </h3>

          <ul>
              <li>
                <a href="/" class="footer_nav_a">HOME</a>
              </li>
              <li>
                <a href="{{ route('visitor.about_us') }}" class="footer_nav_a">ABOUT US</a>
              </li>
              <li>
                <a href="{{ route('visitor.services') }}" class="footer_nav_a">SERVICES</a>
              </li>
              <li>
                <a href="{{ route('visitor.projects') }}" class="footer_nav_a">PROJECTS</a>
              </li>
              <li>
                <a href="{{ route('visitor.blog') }}" class="footer_nav_a">BLOG</a>
              </li>
              <li>
                <a href="{{ route('visitor.contact') }}" class="footer_nav_a">CONTACT</a>
              </li>
          </ul>
      </div>

      <div class="col-md-3 col-xs-12">

      </div>

      <div class="col-md-3 col-xs-12">
          <h3>
            AWARDS &amp; RECOGNITIONS
          </h3>

          <div style="margin-top: 20px;">
          @if(isset($certifications) && count($certifications) > 0)
            @foreach($certifications as $item)
              <img style="margin-bottom:10px;" style="width: 100%;" src="@if($item->image){{ asset($item->image) }}@endif" alt="{{ $item->title }}">
            @endforeach
          @endif
          </div>
      </div>
  </div>
</section>
<!-- subfooter end -->

<!-- footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        @if(Voyager::setting('site_copy_right')){!! Voyager::setting('site_copy_right') !!}@endif
      </div>

      <div class="col-md-6">
        <div class="right">
          <div class="social-icons">
            <a href="@if(Voyager::setting('site_fb_acc')){{Voyager::setting('site_fb_acc')}}@endif"><span class="ti-facebook"></span></a>
                <a href="@if(Voyager::setting('site_youtube_channel')){{Voyager::setting('site_youtube_channel')}}@endif"><span class="ti-youtube"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- footer end -->

<!-- ScrolltoTop -->
<div id="totop">
  <span class="ti-angle-up"></span>
</div>
