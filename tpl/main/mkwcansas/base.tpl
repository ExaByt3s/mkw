<!DOCTYPE html>
<html lang="hu">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="{$seodescription}">
		<meta name="keywords" content="{$seokeywords}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>{$pagetitle}</title>
		<link type="application/rss+xml" rel="alternate" title="{$feedhirtitle}" href="/feed/hir">
		<link type="application/rss+xml" rel="alternate" title="{$feedtermektitle}" href="/feed/termek">
		<link type="text/css" rel="stylesheet" href="/themes/main/mkwcansas/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="/themes/main/mkwcansas/bootstrap-responsive.min.css">
		<link type="text/css" rel="stylesheet" href="/themes/main/mkwcansas/jquery.autocomplete.css">
		<link type="text/css" rel="stylesheet" href="/themes/main/mkwcansas/style.css">
		{block "css"}{/block}
		<script src="/js/main/mkwcansas/jquery.js"></script>
		<script src="/js/main/mkwcansas/jquery.autocomplete.min.js"></script>
		{block "script"}{/block}
		<script src="/js/main/mkwcansas/mkwcansas.js"></script>
	</head>
	<body>
		<header>
			{include 'header.tpl'}
		</header>
		{block "kozep"}
		{/block}
		<footer>
			{include 'footer.tpl'}
		</footer>
	</body>
</html>