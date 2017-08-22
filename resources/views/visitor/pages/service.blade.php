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
                SERVICES PAGE
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
                Services
            </li>
          </ul>
        </div>

    </div>
</div>
</section>
<!-- subheader end -->

<!-- section projects -->
<section class="whitepage no-top" id="projects">
    <div class="container">
        <div class="row">

            <!-- start gallery -->
            <div class="no-gutter onStep" data-animation="fadeInUp" data-time="600" id="projects-wrap">
            @if(isset($services) && count($services) > 0)
                @foreach($services as $service)
                <div class="col-md-4 col-xs-12 item">
                    <div class="projects-grid">
                        <a style="display:block;" href="{{ route('visitor.service.detail', $service->slug) }}">
                            <div class="hovereffect" style="overflow:hidden;">
                                <img alt="imageportofolio" width="100%" class="img-responsive" src="@if($service->featured_image){{ $service->featured_image }}@endif">
                                <div class="overlay">
                                    <h3>
                                        {{ title_case($service->title) }}
                                        <span class="devider"></span>
                                    </h3>
                                    <p>More detail</p>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                @endforeach
            @endif
            </div>
            <!-- gallery end -->

        </div>
    </div>
</section>
<!-- section projects end -->

@endsection

@push('script_dependencies')

@endpush

@section('script')

@endsection
