@extends('visitor.layouts.main')

@section('page_title', 'Pisnoka Construction Company')

@push('style')

@endpush


@section('content')

<!-- subheader -->
<section id="subheader">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <h1>
                OUR HISTORY
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
                History
            </li>

          </ul>
        </div>

    </div>
</div>
</section>
<!-- subheader end -->

<!-- section about -->
<section aria-label="about" class="about-history">
    <div class="container">
        <div class="row">

            <!-- history -->
            <div class="col-md-9">
                @if(isset($history_content) && $history_content !== null)
                <!-- article -->
                <article>
                    <h2>
                        {{ title_case($history_content->title) }}
                    </h2>
                    <span class="devider-cont"></span>
                    {!! $history_content->body !!}
                </article>
                <!-- article -->
                @endif

                @if(isset($milestones) && count($milestones) > 0)
                    @foreach($milestones as $key => $milestone)
                    <div class="row">
                        <div class="col-md-2">
                            <div class="onStep" data-animation="fadeInLeft" data-time="{{ $key * 300 }}">
                            <h3>@if($milestone->year){{ $milestone->year }}@endif</h3>
                            <span class="name">
                                <em>
                                    @if($milestone->objective){{ $milestone->objective }}@endif
                                </em>
                            </span>
                            </div>
                            <div class="space-single"></div>
                        </div>

                        <div class="col-md-10">
                            <div class="bl-res-centered">
                                <div class="bl-res-entry">
                                    <div class="bl-res-entry-inner">
                                        <div class="bl-res-icon"></div>
                                        <div class="bl-res-label onStep" data-animation="fadeInRight" data-time="300">
                                            <h6>
                                                @if($milestone->title){{ $milestone->title }}@endif
                                            </h6>
                                            <p>
                                                @if($milestone->description){{ $milestone->description }}@endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
                    <!-- history end -->

            <div class="col-md-3 onStep" data-animation="fadeInUp" data-time="600">
                <div class="widget">
                    <ul id="services-list">
                        <li class="active">
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
<!-- section about end -->

<!-- section team -->
<section class="bgpage" id="team">
    <!-- team -->
    <div class="container">
        <div class="row">
        @if(isset($teams) && count($teams) > 0)
            @foreach($teams as $team)
                @includeIf('visitor.components.home.team_box', ['team' => $team])
            @endforeach
        @endif
        </div>
    </div>
    <!-- team end -->

    <!-- space mobile -->
    <div class="space-double-mobile"></div>
</section>
<!-- section team end -->

<section class="yellowpage">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                  <h2>Looking best partner for your next project?</h2>
            </div>

            <div class="col-md-5">
                <div class="right">
                <div class="btn-content" >
                    <a class="link-class " href="#">Let us know</a>
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
