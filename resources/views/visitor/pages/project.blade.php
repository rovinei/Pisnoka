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
                PROJECTS PAGE
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
                Projects
            </li>
          </ul>
        </div>

    </div>
</div>
</section>
<!-- subheader end -->

<!-- section projects -->
<section class="whitepage no-bottom no-top" id="projects">
    <div class="container-fluid">
        <div class="row">

            <!-- filter project -->
            <div class="onStep" data-animation="fadeInUp" data-time="300">
              <div class="filter-wraper text-center">
                <ul id="filter-porto">
                    <li class="filt-projects selected" data-project="*">ALL PROJECTS</li>

                @if(isset($categories) && count($categories) > 0)
                    @foreach($categories as $category)
                    <li class="space">.</li>
                    <li class="filt-projects" data-project=".{{ $category->slug }}">{{ $category->name }}</li>
                    @endforeach
                @endif
                </ul>
              </div>
            </div>
            <!-- filter project end -->

            <!-- start gallery -->
            <div class="no-gutter onStep" data-animation="fadeInUp" data-time="600" id="projects-wrap">
            @if(isset($projects) && count($projects) > 0)
                @foreach($projects->chunk(3) as $projectChunk)
                <div class="row">
                    @foreach($projectChunk as $project)
                        @if($project->categories() && count($project->categories()) > 0)
                            @php
                                $categories_arr = $project->categories()->pluck('slug')->toArray();
                                $categories_str = implode(" ", $categories_arr);
                            @endphp
                        @endif
                        <div class="col-md-4 col-xs-12 item {{ $categories_str }}">
                            <div class="projects">
                                <a href="{{ route('visitor.project.detail', $project->slug) }}">
                                    <div class="hovereffect">
                                        <img alt="imageportofolio" class="img-responsive" src="@if($project->featured_image){{ asset($project->featured_image) }}@endif">
                                        <div class="overlay">
                                        <h3>
                                            more detail
                                        </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endforeach
            @endif
            </div>
            <!-- gallery end -->
        </div>
    </div>
</section>
<!-- section projects end -->

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
