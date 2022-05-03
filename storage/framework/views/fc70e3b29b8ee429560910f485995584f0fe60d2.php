<!-- 84246 36 22766 337626337 636337 -->
<!-- FAVICON -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('img/favicons/favicon.png')); ?>">
<link rel="icon" type="image/png" href="<?php echo e(asset('img/favicons/favicon.png')); ?>" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo e(asset('img/favicons/favicon.png')); ?>" sizes="16x16">
<link rel="manifest" href="<?php echo e(asset('img/favicons/manifest.json')); ?>">

<link rel="mask-icon" href="<?php echo e(asset('img/favicons/safari-pinned-tab.svg')); ?>" color="#00b1e3">
<meta name="theme-color" content="#ffffff">

<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1, shrink-to-fit=no">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; utf-8">
<title><?php echo e($headTitulo); ?></title>
<meta name="keywords" content="">
<meta name="description" content="<?php echo e($headDescricao); ?>">
<!--<meta name="Robots" content="index,follow">-->
<meta name="geo.region" content="PT">
<meta name="geo.position" content="PT">
<meta name="geo.placename" content="PT">

<!-- token-laravel -->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"> 

<!-- FONT AWESOME -->
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">-->

<!-- STYLE -->
<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet"><!-- font-family:'Open Sans',sans-serif; -->
<link type="text/css" href="/font/Fontes/">


<!-- FACEBOOK -->
<meta property="og:url" content="<?php echo e(\Request::fullUrl()); ?>" />
<meta property="og:title" content="<?php if(isset($faceTitulo)): ?><?php echo e(strip_tags($faceTitulo)); ?><?php else: ?><?php echo e(strip_tags($headTitulo)); ?><?php endif; ?>" />
<meta property="og:description" content="<?php if(isset($faceDescricao)): ?><?php echo e(strip_tags($faceDescricao)); ?><?php else: ?><?php echo e(strip_tags($headDescricao)); ?><?php endif; ?>" />
<meta property="og:image" content="<?php if(isset($faceImagem)): ?><?php echo e($faceImagem); ?><?php else: ?><?php echo e(asset('img/site/faceImagem.png')); ?><?php endif; ?>" />
<meta property="og:type" content="<?php if(isset($faceTipo)): ?><?php echo e($faceTipo); ?><?php else: ?><?php echo e('article'); ?><?php endif; ?>" />
<!--<meta property="fb:app_id" content="270040710562913"/>-->