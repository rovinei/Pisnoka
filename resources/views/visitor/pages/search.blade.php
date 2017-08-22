@extends('visitor.layouts.main')

@section('page_title', 'Pisnoka Construction Company | Search page')

@push('style')

@endpush

@section('content')

<!-- subheader -->
<section id="subheader">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <h1>
                SEARCH RESULT
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
                <a href="{{ route('visitor.blog') }}">Blog</a>
            </li>

            <li class="sep">/
            </li>

            <li>
                {{ $tagname }}
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
            @if(isset($blog_posts) && count($blog_posts) > 0)
                @foreach($blog_posts as $blog_post)
                <div class="col-md-4 col-xs-12 item">
                    <div class="projects-grid">
                        <a style="display:block;" href="{{ route('visitor.blog.detail', $blog_post->slug) }}">
                            <div class="hovereffect" style="overflow:hidden;">
                                <img alt="imageportofolio" width="100%" class="img-responsive" src="@if($blog_post->image){{ $blog_post->image }}@endif">
                                <div class="overlay">
                                    <h3>
                                        {{ title_case($blog_post->title) }}
                                        <span class="devider"></span>
                                    </h3>
                                    <p>More detail</p>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                @endforeach

            @else
                <h1 style="text-align:center;padding: 60px 0;">
                    Query result not found for tag : {{ $tagname }}
                </h1>
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
