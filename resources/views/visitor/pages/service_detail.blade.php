@extends('visitor.layouts.main')

@section('page_title', 'Pisnoka Construction Company | projects page')

@push('style')

@endpush

@section('content')

<!-- subheader -->
<section id="subheader">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <h1>
                SERVICE DETAIL
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
                <a href="{{ route('visitor.services') }}">Services</a>
            </li>

            <li class="sep">/
            </li>

            <li>
                {{ $service->title }}
            </li>

          </ul>
        </div>

    </div>
</div>
</section>
<!-- subheader end -->

<!-- services -->
<section class="services whitepage">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 onStep" data-animation="fadeInUp" data-time="300">
                        <img alt="imgservices" class="img-responsive" src="@if($service->featured_image){{ $service->featured_image }}@endif">
                        <h2>
                           {{ $service->title }}
                        </h2>

                        {!! $service->content !!}

                    </div>
                </div>
            </div>

            <div class="col-md-3 onStep" data-animation="fadeInUp" data-time="600">
                <div class="widget">
                    <ul id="services-list">
                      <li>
                        <a href="{{ route('visitor.history') }}">HISTORY</a>
                      </li>
                    @foreach($serviceMenus as $menu)
                      <li>
                        <a href="{{ route('visitor.service.detail', $menu->slug) }}">
                            {{ $menu->title }}
                        </a>
                      </li>
                    @endforeach
                    </ul>
                </div>

                <div class="widget">
                    <div class="download-brochure">
                        <h3>
                            DOWNLOAD BROCHURE
                        </h3>

                        <div class="btn-download onStep" data-animation="fadeInRight" data-time="600">
                            <a class="link-class" href="#">DOWNLOAD NOW</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- services end -->

<section id="brand" class="brand-page" aria-label="brands">
    <div class="container">
        <div class="row">
        @if(isset($partners) && count($partners) > 0)
        <!-- brands-->
        <div class="container">
            <div class="row">

                <div class="owl-carousel" id="owl-brand">
                @foreach($partners as $partner)
                    <div class="item">
                        <a href="@if($partner->external_url){{ $partner->external_url }}@else{{ '#' }}@endif">
                            <img alt="background" src="@if($partner->company_logo){{ asset('storage/'.$partner->company_logo) }}@endif">
                        </a>
                    </div>
                @endforeach
                </div>

            </div>
        </div>
        <!-- brands end-->
        @endif
        </div>
    </div>
</section>

<section class="yellowpage">
    <div class="container">
        <div class="row">

            <div class="col-md-7">
                <div class="onStep" data-animation="fadeInLeft" data-time="300">
                    <h2>
                      Looking best partner for your next project?
                    </h2>
                </div>
            </div>

            <div class="col-md-5">
                <div class="right">
                    <div class="btn-content onStep" data-animation="fadeInRight" data-time="600">
                      <a class="link-class" href="{{ route('visitor.contact') }}">Let us know</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('script_dependencies')

@endpush

@section('script')

@endsection
