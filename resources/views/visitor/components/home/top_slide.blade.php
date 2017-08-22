<li class="banner_item active" style="z-index:0;">
    <div class="item_inner">
        <div class="item_title">
            <div>
                <div class="title">
                @if($slider->title)
                    <h1>{{ $slider->title }}</h1>
                @endif
                </div>
                <div class="slogan">
                @if($slider->slogan)
                    <span>{{ $slider->slogan }}</span>
                @endif
                </div>
                <div class="description">
                @if($slider->description)
                    <p>{{ $slider->description }}</p>
                @endif
                </div>
            </div>
        </div>
        <div class="item_img">
            <img src="@if($slider->image){{ asset($slider->image) }}@endif">
        </div>
    </div>
</li>
