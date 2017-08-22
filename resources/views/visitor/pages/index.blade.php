@extends('visitor.layouts.main')

@section('page_title', 'Pisnoka Construction Company')

@push('style')

@endpush

@section('slideshow')
<!-- banner -->
    @if(isset($sliders) && count($sliders) > 0)
    <div class="fluid_container">
        <div class="site_banner">
            <div class="banner_inner">
                <ul class="banner_list">
                @foreach($sliders as $slider)
                    @includeIf('visitor.components.home.top_slide', ['slider' => $slider])
                @endforeach
                </ul>
                <div class="scroll_bottom">
                    <span onclick="PISNOKA.main.SmoothScrollTo('.bot-home-text');"><img src="{{ asset('img/common/icon_scroll_to_bottom_08.png') }}"></span>
                </div>
            </div>

            <div class="load_banner"></div>
        </div>
    </div>
    @endif
<!-- /banner -->
@endsection

@section('content')
<!-- gallery-home -->
<div class="bot-home-text onStep" data-animation="fadeInUp" data-time="300">
    <div class="container">
        <div class="row">

            <div id="owl-gal" class="owl-carousel">
            @if(isset($projects) && count($projects) > 0)
                @foreach($projects as $project)
                    @includeIf('visitor.components.home.project_slide', ['project' => $project])
                @endforeach
            @endif
            </div>

        </div>
    </div>
</div>
<!-- gallery-home end -->

<!-- section about -->
<section class="whitepage" id="about">

    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8">
            @if(isset($services) && count($services) > 0)
                @foreach($services->chunk(2) as $serviceRow)
                <div class="row">
                    @foreach($serviceRow as $key => $service)
                        @includeIf('visitor.components.home.service_box', ['service'=> $service, 'key'=> $key])
                    @endforeach
                </div>
                @endforeach
            @endif
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="row">
                    <div class="col-xs-12">
                    @if(isset($director_msg) && $director_msg !== null)
                        <div class="director_msg">
                            <h3 class="heading">
                                MESSAGE FROM DIRECTOR
                            </h3>

                            <div class="avatar">
                                <div class="inner" style="background-image: url({{ asset('storage/'.$director_msg->avatar_picture) }})">

                                </div>
                            </div>

                            <div class="name_position">
                                <span class="name">
                                    {{ title_case($director_msg->fullname) }}
                                </span>

                                <span class="position">
                                    {{ title_case($director_msg->position) }}
                                </span>
                            </div>

                            <div class="message_txt">
                                {!! $director_msg->voice !!}
                            </div>
                        </div>
                    @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
<!-- section about end -->

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

<!-- stepwork -->
<section id="step-page" class="step-page">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="text-center">
                    <h2>Why Pisnoka? </h2>
                    <span class="devider-center"></span>
                    <div class="space-single"></div>
                </div>
            </div>

            <!-- step menu -->
            <div class="onStep" data-animation="fadeInUp" data-time="300">
            @if(isset($why_us) && count($why_us) > 0)
                <div class="step-mains">
                @foreach($why_us as $key => $item)
                    <div class="col-md-{{ 12 / count($why_us) }} step-main">
                        <div class="step-main">
                            <a class="filt-step @if($key==0){{ 'active' }}@endif" data-filter=".{{ $item->slug }}"><span>{{ title_case($item->title) }}</span></a>
                        </div>
                    </div>
                @endforeach

                </div>
                <!-- step menu end -->

                <!-- step content -->
                <div id="step-text" class="col-md-12">
                    @foreach($why_us as $key => $item)
                    <div class="cont {{ $item->slug }}">
                        <div class="text-center">
                            {!! $item->body !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
            </div>
            <!-- step content end -->

        </div>
    </div>
</section>
<!-- stepwork end -->

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

@endsection

@push('script_dependencies')

@endpush

@section('script')

@endsection
