<div class="col-xs-12 col-md-3 col-sm-6">
  <div class="team-wrapper">
    <img alt="team img 4" class="img-responsive" src="@if($team->avatar_picture){{ asset('storage/'.$team->avatar_picture) }}@endif">
    <div class="team-des">
        <h3>{{ $team->fullname }}</h3>
        <span>{{ $team->position }}</span>
        <a href="{{ $team->fb_acc }}"><span class="ti-facebook"></span></a>
        <a href="{{ $team->twitter_acc }}"><span class="ti-twitter"></span></a>
        <a href="{{ $team->linked_acc }}"><span class="ti-linkedin"></span></a>
    </div>
  </div>
</div>
