@extends('visitor.layouts.main')

@section('page_title', 'Pisnoka Construction Company | {{ $blog_post->title }}')

@push('style')

@endpush

@section('content')

<!-- subheader -->
<section id="subheader">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <h1>
                OUR BLOG
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
                {{ title_case($blog_post->title) }}
            </li>

          </ul>
        </div>

    </div>
</div>
</section>
<!-- subheader end -->

<!-- section -->
<section aria-label="section-blogg" id="content">
    <div class="container">
        <div class="row">

            <!-- left content -->
            <div class="col-md-8">
                <div class="onStep" data-animation="fadeInUp" data-time="300">
                @if(isset($blog_post))

                    <article>
                        <h2 style="margin-bottom: 30px;" class="detail-title">
                            {{ title_case($blog_post->title) }}
                        </h2>
                        <div class="post-image">
                            <img alt="blog-img" width="100%" class="img-responsive" src="@if($blog_post->image){{ asset($blog_post->image) }}@endif">
                        </div>

                        <div class="bottom-article">
                            {!! $blog_post->body !!}
                        </div>
                    </article>

                @endif

                </div>
            </div>
            <!-- left content end -->

            <!-- right content -->
            <div class="col-md-4">
                <aside class="onStep" data-animation="fadeInUp" data-time="600">

                    <!-- widget -->
                    <div class="widget">
                        <h5>
                            Recent posts
                        </h5>

                        <div class="space-single devider-widget"></div>

                        @if(isset($recent_posts) && count($recent_posts) > 0)
                            @foreach($recent_posts as $recent)
                            <div class="recent">
                                <div>
                                    <img style="width:90px;" alt="{{ $recent->title }}" class="pull-left" src="@if($recent->image){{ asset(str_replace('uploads', 'thumbs', $recent->image)) }}@endif">
                                    <h6>
                                        <a href="{{ route('visitor.blog.detail', $recent->slug) }}">
                                            {{ title_case($recent->title) }}
                                        </a>
                                    </h6>
                                    <p>
                                        {{ str_limit($recent->excerpt, 50) }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- widget end -->

                    <!-- widget -->
                    <div class="widget">
                        <h5>
                            Tags
                        </h5>

                        <div class="space-single devider-widget"></div>

                        <div class="tags">
                        @if(isset($post_tags) && count($post_tags) > 0)
                            @foreach($post_tags as $tag)
                            <div>
                                <a href="{{ route('visitor.tag.search') }}?tagname={{$tag->slug}}">{{ $tag->name }}</a>
                            </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <!-- widget end -->

                </aside>
            </div>
            <!-- right content end -->
        </div>
    </div>
</section>
<!-- section end -->

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
