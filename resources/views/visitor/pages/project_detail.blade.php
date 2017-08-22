@extends('visitor.layouts.main')

@section('page_title', 'Pisnoka Construction Company | {{ $project->title }}')

@push('style')

@endpush

@section('content')

<section id="subheader">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <h1>
                PROJECT DETAIL
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
              <a href="{{ route('visitor.projects') }}">Projects</a>
            </li>

            <li class="sep">/
            </li>

            <li>
              {{ $project->title }}
            </li>

          </ul>
        </div>

    </div>
</div>
</section>
<!-- subheader end -->

@if(isset($project))
<!-- project -->
<section class="projects-detail whitepage">
  <div class="onStep" data-animation="fadeInUp" data-time="300">
    <div class="container">
      <div class="row">

        <!-- detail img -->
        <div class="col-md-12">
          <div id="detailpro" class="owl-carousel">
            @if(isset($project->slide_images))
              @if(is_array(json_decode($project->slide_images,true)))
                @foreach(json_decode($project->slide_images,true) as $image_url)
                <div class="item"><img src="{{ $image_url }}"></div>
                @endforeach
              @endif
            @endif
          </div>
        </div>
        <!-- detail img end -->
      </div>

      <div class="row">
        <!-- text detail -->
        <div class="col-md-8">
          <h2>{{ $project->title }}</h2>
          {!! $project->content !!}
        </div>

        <div class="col-md-4">
          <div class="detaillist">
            @if($project->categories() && count($project->categories()) > 0)
                @php
                    $categories_arr = $project->categories()->pluck('name')->toArray();
                    $categories_str = implode(", ", $categories_arr);
                @endphp
            @endif
            <h2>Project Detail</h2>
            <span><strong>Categories:</strong> {{ $categories_str }}</span>
            <span><strong>Client:</strong> {{ $project->client }}</span>
            <span><strong>Date:</strong> {{ $project->due_date }}</span>
            <span><strong>Budget:</strong> {{ $project->budget }}</span>
            <span><strong>Duration:</strong> {{ $project->duration }}</span>
            <!-- <span><strong>Tags:</strong> Commercial</span> -->
          </div>
        </div>
        <!-- text detail end -->
      </div>

    </div>
  </div>
</section>
<!-- project end -->
@endif

<!-- Related projects -->
<div class="container">
  <div class="row">
    @if(isset($related_projects) && count($related_projects) > 0)
    <div id="owl-project" classs="owl-carousel">
      @foreach($related_projects as $proj)
      <div class="item">
        <div class="gal-home">
          <a href="{{ route('visitor.project.detail', $proj->slug) }}">
            <div class="hovereffect">
              <img alt="imageportofolio" style="width:100%;" class="img-responsive" src="@if($proj->featured_image){{ asset($proj->featured_image) }}@endif">
              <div class="overlay">
                <h3>
                  {{ $proj->title }}
                  <span class="devider"></span>
                </h3>
                <p>MORE DETAIL</p>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
    @endif
  </div>
</div>
  <!-- Related projects end -->

<!-- spacer -->
<div class="space-double"></div>

@endsection

@push('script_dependencies')

@endpush

@section('script')

@endsection
