<html>
<head>
    @includeIf('visitor.includes._head')
    @stack('styles')
</head>
<body id="main-body">

    <!-- Facebook javascript SDK -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if(d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=120640301845733";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- /Facebook javascript SDK -->

    <!-- preloader -->
    <div class="bg-preloader"></div>
      <div class="preloader">
        <div class="mainpreloader">
        <span></span>
        </div>
    </div>
    <!-- preloader end -->

    <!-- content wraper -->
    <div class="content-wrapper">
        @includeIf('visitor.includes._navigation')

        @yield('slideshow')

        @yield('content')

        @includeIf('visitor.includes._footer')
    </div>
    <!-- content wraper end -->




    <!-- Subscribe start -->
    <div class="white-popup-block mfp-hide animbounceInDown" data-time="0" id="subwrap">
      <h5>
        PLEASE FILL YOUR EMAIL BELOW
      </h5>

      <div class="space-half">
      </div>

      <form action="subscribe.php" id="subscribe" method="post" name="subscribe">
        <input class="subscribfield subscribeemail" id="subscribeemail" name="subscribeemail" type="text"> <button class="btn-form" id="submit-2" type="submit">Subscribe</button>
      </form>

      <div class="subscribesuccess">
        Thank you for fill your email
      </div>
    </div>
    <!-- Subscribe end -->

    <!-- Required script -->
    <!-- plugin JS -->
    <script src="{{ asset('plugin/pluginson3step.js') }}" type="text/javascript"></script>
    <!-- slider revolution  -->
    <script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- on3step JS -->
    <script src="{{ asset('js/on3step.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugin-set.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
    @stack('script_dependencies')
    @yield('script')

</body>
</html>
