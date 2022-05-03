<!-- 84246 36 22766 337626337 636337 -->
<!-- FAVICON -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/favicon.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon.png') }}" sizes="32x32">
<link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon.png') }}" sizes="16x16">
<link rel="manifest" href="{{ asset('img/favicons/manifest.json') }}">

<link rel="mask-icon" href="{{ asset('img/favicons/safari-pinned-tab.svg') }}" color="#00b1e3">
<meta name="theme-color" content="#ffffff">

<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1, shrink-to-fit=no">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; utf-8">
<title>{{ $headTitulo }}</title>
<meta name="keywords" content="">
<meta name="description" content="{{ $headDescricao }}">
<!--<meta name="Robots" content="index,follow">-->
<meta name="geo.region" content="PT">
<meta name="geo.position" content="PT">
<meta name="geo.placename" content="PT">

<!-- token-laravel -->
<meta name="csrf-token" content="{{ csrf_token() }}"> 

<!-- FONT AWESOME -->
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">-->

<!-- STYLE -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet"><!-- font-family:'Open Sans',sans-serif; -->
<link type="text/css" href="/font/Fontes/">


<!-- FACEBOOK -->
<meta property="og:url" content="{{ \Request::fullUrl() }}" />
<meta property="og:title" content="@if(isset($faceTitulo)){{ strip_tags($faceTitulo) }}@else{{ strip_tags($headTitulo) }}@endif" />
<meta property="og:description" content="@if(isset($faceDescricao)){{ strip_tags($faceDescricao) }}@else{{ strip_tags($headDescricao) }}@endif" />
<meta property="og:image" content="@if(isset($faceImagem)){{ $faceImagem }}@else{{ asset('img/site/faceImagem.png') }}@endif" />
<meta property="og:type" content="@if(isset($faceTipo)){{ $faceTipo }}@else{{'article'}}@endif" />
<!--<meta property="fb:app_id" content="270040710562913"/>-->