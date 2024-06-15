<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title> {{ $pageTitle ?? config('app.name',"") }}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="keywords" content="{{ $pageKeywords ?? config("app.keywords") }}"/>
<meta name="description" content="{{ $pageDescription ?? config("app.description") }}">

<meta property="fb:app_id" content="1864140550529962"/>
<meta property="og:title" content="{{ $pageTitle ?? config('app.name') }}"/>
<meta property="og:type" content="WEBSITE"/>
<meta property="og:url" content="{{ url()->current() }}"/>
<meta property="og:image" content="{{ $pageImage ?? config('app.image') }}"/>
<meta property="og:site_name" content="{{ config('app.name') }}"/>
<meta property="og:description" content="{{ $pageDescription ?? config('app.description') }}"/>

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ config('app.name') }}">
<meta name="twitter:domain" content="{{ config("app.url") }}"/>
<meta name="twitter:title" content="{{ $pageTitle ?? config('app.name') }}">
<meta name="twitter:description" content="{{ $pageDescription ?? config('app.description') }}">
<meta name="twitter:creator" content="{{ $pageTitle ?? config('app.name',"") }}">
<meta name="twitter:image" content="{{ $pageImage ?? config('app.image') }}">
<meta itemprop="image" content="{{ $pageImage ?? config('app.image') }}"/>

<link rel="canonical" href="{{ url()->current() }}"/>
<link rel="icon" href="{{ asset("images/favicon.png") }}"/>