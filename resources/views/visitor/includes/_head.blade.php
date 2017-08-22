
<title>@yield('page_title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="domain" content="{{ url('/') }}">
<meta content="" name="description">
<meta content="" name="author">
<meta content="" name="keywords">

<!-- Facebook web master meta -->
@if(!empty($fbMeta))
<meta property="og:url"           content="{{ $fbMeta->url }}" />
<meta property="og:type"          content="{{ $fbMeta->type }}" />
<meta property="og:title"         content="{{ $fbMeta->title }}" />
<meta property="og:description"   content="{{ $fbMeta->description }}" />
<meta property="og:image"         content="{{ $fbMeta->image }}" />
@else
<meta property="og:url"           content="" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="" />
<meta property="og:description"   content="" />
<meta property="og:image"         content="" />
@endif

<!-- favicon -->
<link href="{{ asset('img/favicon.png') }}" rel="icon" sizes="32x32" type="image/png">
<!-- Bootstrap CSS -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<!-- font themify CSS -->
<link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
<!-- font awesome CSS -->
<link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
<!-- on3step CSS -->
<link href="{{ asset('css/animated-on3step.css') }}" rel="stylesheet">
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
<link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">
<link href="{{ asset('css/on3step-style.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" media="all" rel="stylesheet" type="text/css">
<link href="{{ asset('css/queries-on3step.css') }}" media="all" rel="stylesheet" type="text/css">
