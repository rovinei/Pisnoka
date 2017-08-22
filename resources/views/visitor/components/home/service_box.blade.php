<div class="col-xs-12 col-sm-6 col-md-6">
    <div class="wrap-news onStep" data-animation="fadeInLeft" data-time="{{ $key * 300 }}">
        <img alt="imageportofolio" class="" width="100%" src="@if($service->featured_image){{ asset($service->featured_image) }}@endif">
        <h3>{{ $service->title }}</h3>
        <p>
            {{ str_limit($service->excerpt, 200) }}
        </p>
        <a class="link-class" href="{{ route('visitor.service.detail', $service->slug) }}">
            MORE DETAIL
            <span class="devider"></span>
        </a>
    </div>
</div>


