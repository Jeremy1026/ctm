<?php if (!defined('HEADER_RENDERED')): ?>
<?php define('HEADER_RENDERED', 1) ?>
<html>
	<head">

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">

	<?php $title = Response::getMetaTitle() ?>
	<?php $title = $title ?
							$title . (strpos($title, 'Jeremy Curcio') === false ? ' - Jeremy Curcio' : '') :
							'Jeremy Curcio' ?>
	<title><?php echo $title ?></title>

    <link href="/assets/css/styles.min.css" rel="stylesheet" type="text/css" />
	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>  

	<meta name="description" content="<?php echo Response::getMetaDescription() ?>">
	<meta property="og:title" content="<?php echo $title ?>" />
	<meta property="og:description" content="<?php echo Response::getMetaDescription() ?>"/>
	<meta property="og:site_name" content="Jeremy Curcio" />
	<?php foreach(Response::getMetaImages() as $image): ?>
		<meta property="og:image" content="<?php echo $image ?>" />
	<?php endforeach ?>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<base target="_parent" />
	</head>
	<body>
		<div class="header">
			Jeremy Curcio - Twilio Demo
		</div>
		<main class="<?php echo $template; ?>">
<?php endif ?>
