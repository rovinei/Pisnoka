@extends('visitor.layouts.main')

@section('page_title', 'Pisnoka Construction Company | contact page')

@push('style')

@endpush

@section('content')

<!-- subheader -->
<section id="subheader">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <h1>
                CONTACT PAGE
              </h1>
            </div>
            <!-- devider -->

            <div class="col-md-12">
              <div class="devider-page">
                <div class="devider-img-right">
                </div>
              </div>
            </div>

        <div class="col-md-12">
          <ul class="subdetail">
            <li>
              <a href="{{ URL('/') }}">Home</a>
            </li>

            <li class="sep">/
            </li>

            <li>
                Contact
            </li>
          </ul>
        </div>

    </div>
</div>
</section>
<!-- subheader end -->

<!-- section contact -->
<section aria-label="contact" class="whitepage">
  <div class="container">
    <div class="row">

      <div class="no-gutter">

        <!-- map -->
        <div class="col-md-9 col-sm-7">
          <div class="onStep" data-animation="fadeInLeft" data-time="300" id="map"></div>
        </div>
        <!-- map end -->

        <!-- address -->
        <div class="col-md-3 col-sm-5">
          <div class="wrapaddres onStep" data-animation="fadeInRight" data-time="600">
            <address>
              <span>
                  <strong>ADDRESS</strong><br>
                  @if(Voyager::setting('company_address')){{ Voyager::setting('company_address') }}@endif
              </span>
              <span>
                  <strong>PHONE</strong><br>
                  @if(Voyager::setting('company_tel')){{ Voyager::setting('company_tel') }}@endif
              </span>
              <span><strong>EMAIL</strong><br>
                @if(Voyager::setting('company_email'))
                <a href="mailto:{{ Voyager::setting('company_email') }}">
                    {{ Voyager::setting('company_email') }}
                </a>
                @endif
              </span>
              <span><strong>WEBSITE</strong><br>
                  <a href="/">@if(Voyager::setting('site_domain')){{ Voyager::setting('site_domain') }}@endif</a>
              </span>
            </address>
          </div>
        </div>
        <!-- address end -->
      </div>

      <!-- contact form -->
      <div class="col-md-12 col-xs-12">
        <div class="onStep" data-animation="fadeInUp" data-time="300" id="contact">
          <form action="#" class="row" id="form-contact" method="post" name="form-contact">
            <input id="name-contact" name="name" placeholder="your name" type="text"> <input id="email-contact" name="email" placeholder="your e-mail" type="text">

            <textarea cols="50" id="message-contact" name="message" placeholder="your enquiry" rows="4"></textarea>
            <div class="success" id="mail_success">
              Thank you. Your message has been sent
            </div>

            <div class="error" id="mail_failed">
              Error, email not sent
            </div>
            <button class="btn-contact" id="send-contact" type="submit">Sent Now</button>
          </form>
        </div>
      </div>
      <!-- contact form end -->
    </div>
  </div>
</section>
<!-- section contact end -->

@endsection

@push('script_dependencies')
  <!--  map google  -->
  <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCQ5KODzqooIP496GPLRaMAsZ4eN8Vro_U"></script>
  <script src="{{ asset('js/map.js') }}" type="text/javascript"></script>
@endpush

@section('script')

@endsection
