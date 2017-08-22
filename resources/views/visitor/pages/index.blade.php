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
                        <div class="director_msg">
                            <h3 class="heading">
                                MESSAGE FROM DIRECTOR
                            </h3>

                            <div class="avatar">
                                <div class="inner" style="background-image: url({{ asset('img/director_profile.jpg') }})">

                                </div>
                            </div>

                            <div class="name_position">
                                <span class="name">
                                    Mr.SOK SOTHYRA
                                </span>

                                <span class="position">
                                    MANAGING DIRECTOR
                                </span>
                            </div>

                            <div class="message_txt">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                            </div>
                        </div>
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

                <div class="step-mains">

                    <div class="col-md-3 step-main">
                        <div class="step-main">
                            <a class="filt-step active" data-filter=".quality"><span>Quality</span></a>
                        </div>
                    </div>

                    <div class="col-md-3 step-main">
                        <div class="step-main">
                            <a class="filt-step" data-filter=".safe"><span>Safe</span></a>
                        </div>
                    </div>

                    <div class="col-md-3 step-main">
                        <div class="step-main">
                            <a class="filt-step" data-filter=".schedule"><span>Schedule</span></a>
                        </div>
                    </div>

                    <div class="col-md-3 step-main">
                        <div class="step-main">
                            <a class="filt-step" data-filter=".budget"><span>Budget</span></a>
                        </div>
                    </div>
                </div>
              <!-- step menu end -->

              <!-- step content -->
                <div id="step-text" class="col-md-12">

                    <div class="cont quality">
                        <div class="text-center">
                            <p>Maecenas justo neque, efficitur sit amet scelerisque eu, ornare a justo. Morbi scelerisque ex ut consequat vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent vel augue rutrum, scelerisque velit non, interdum nisl. Etiam purus lorem, aliquet a eros sit amet, vestibulum finibus augue. Cras egestas neque vitae dui tincidunt, vitae tristique tellus volutpat. Fusce justo ante, interdum in augue in, commodo imperdiet turpis.</p>
                        </div>
                    </div>

                    <div class="cont safe">
                        <div class="text-center">
                            <p>Etiam purus lorem, aliquet a eros sit amet, vestibulum finibus augue. Cras egestas neque vitae dui tincidunt, vitae tristique tellus volutpat. Fusce justo ante, interdum in augue in, commodo imperdiet turpis. Morbi scelerisque ex ut consequat vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent vel augue rutrum, scelerisque velit non, interdum nisl. Etiam purus lorem, aliquet a eros sit amet, vestibulum finibus augue. Cras egestas neque vitae dui tincidunt, vitae tristique tellus volutpat. Fusce justo ante, interdum in augue in, commodo imperdiet turpis.</p>
                        </div>
                    </div>

                    <div class="cont schedule">
                        <div class="text-center">
                            <p>Morbi scelerisque ex ut consequat vestibulum. Cras egestas neque vitae dui tincidunt, vitae tristique tellus volutpat. Fusce justo ante, interdum in augue in, commodo imperdiet turpis. Maecenas justo neque, efficitur sit amet scelerisque eu, ornare a justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent vel augue rutrum, scelerisque velit non, interdum nisl. Etiam purus lorem, aliquet a eros sit amet, vestibulum finibus augue. Cras egestas neque vitae dui tincidunt, vitae tristique tellus volutpat. Fusce justo ante, interdum in augue in, commodo imperdiet turpis.</p>
                        </div>
                    </div>

                    <div class="cont budget">
                        <div class="text-center">
                            <p>Praesent vel augue rutrum, scelerisque velit non, interdum nisl. Fusce justo ante, interdum in augue in, commodo imperdiet turpis. Maecenas justo neque, efficitur sit amet scelerisque eu, ornare a justo. Morbi scelerisque ex ut consequat vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent vel augue rutrum, scelerisque velit non, interdum nisl. Etiam purus lorem, aliquet a eros sit amet, vestibulum finibus augue. Cras egestas neque vitae dui tincidunt, vitae tristique tellus volutpat. Fusce justo ante, interdum in augue in, commodo imperdiet turpis.</p>
                        </div>
                    </div>

                </div>
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
