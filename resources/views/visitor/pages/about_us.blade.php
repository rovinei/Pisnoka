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
                ABOUT US
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
                About us
            </li>
          </ul>
        </div>

    </div>
</div>
</section>
<!-- subheader end -->

<!-- section about -->
<section aria-label="about" class="whitepage no-bottom" id="about">
    <div class="container">
        <div class="row">

            <div class="col-md-5 col-xs-11">
                <div class="onStep" data-animation="fadeInUp" data-time="300">
                    @if(isset($who_we_are) && $who_we_are !== null)
                    <article>
                        <h2>
                            {{ title_case($who_we_are->title) }}
                        </h2>
                        <span class="devider-cont"></span>
                        {!! $who_we_are->body !!}
                    </article>
                    @endif
                </div>
                <div class="space-half"></div>
            </div>
            <!-- text end -->

            <!-- col -->
            <div class="col-md-7 col-xs-11">
            @if(isset($company_visions) && count($company_visions) > 0)
                <div class="onStep" data-animation="fadeInUp" data-time="600">
                    <div class="filter-wraper">
                        <ul class="animfadeInUpBig" data-time="1200" id="filters">
                        @foreach($company_visions as $item)
                            <li class="filt-serv @if($loop->first){{ 'selected' }}@endif" data-filter=".{{$item->slug}}">{{ $item->title }}
                            </li>
                            @if(!$loop->last)
                            <li class="space">•
                            </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>

                    <div class="space-half">
                    </div>
                </div>

                <div class="onStep" data-animation="fadeInUp" data-time="900" id="services">
                @foreach($company_visions as $item)
                    <div class="service {{ $item->slug }}" style="@if($loop->first){{ 'display:block;' }}@endif">
                        <img alt="img" class="img-responsive" src="@if($item->image){{ asset($item->image) }}@endif">
                        <h4>
                            {{ title_case($item->title) }}
                        </h4>

                        {!! $item->body !!}
                    </div>
                @endforeach
                </div>
            @endif
            </div>
            <!-- col end -->
        </div>
    </div>
</section>
<!-- section about end -->


<!-- section team -->
<section class="whitepage" id="team">
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
                  <h2>Looking best partner for your next project?</h2>
            </div>

            <div class="col-md-5">
                <div class="right">
                <div class="btn-content" >
                    <a class="link-class " href="{{ route('visitor.contact') }}">Let us know</a>
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
