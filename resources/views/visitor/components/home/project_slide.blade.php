<div class="item">
    <div class="gal-home">
        <a href="{{ route('visitor.project.detail', $project->slug) }}">
            <div class="hovereffect">
                <img alt="imageportofolio" class="img-responsive" src="@if(isset($project->featured_image)){{ asset($project->featured_image) }}@endif">
                <div class="overlay">
                    <h3>
                        {{ $project->title }}
                        <span class="devider"></span>
                    </h3>
                    <p>MORE DETAIL</p>
                </div>
            </div>
        </a>
    </div>
</div>
