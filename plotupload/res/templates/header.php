<head>

	<!-- Input header for all pages below -->

	<TITLE><?php echo Config::get('title');?></TITLE>
	<link rel='stylesheet' type='text/css' href='style/style_<?php echo Config::get('style');?>.css'>
	<!-- BEGIN Custom Themes -->
		<!-- Yeti - DEFAULT -->
			<!-- For Development -->
			<link rel="stylesheet" href="res/themes/Yeti/css/bootstrap.min.css?version=2" title="Yeti">
			<link rel="stylesheet" href="res/themes/Yeti/css/custom.css?version=2" title="Yeti">
			<link rel="stylesheet" href="res/themes/Yeti/css/font-awesome.min.css?version=2" title="Yeti">
			<!-- Live CSS -->
			<link rel="stylesheet" href="/styles/themes/Yeti/css/bootstrap.min.css?version=2" title="Yeti">
			<link rel="stylesheet" href="/styles/themes/Yeti/css/custom.css?version=2" title="Yeti">
			<link rel="stylesheet" href="/styles/themes/Yeti/css/font-awesome.min.css?version=2" title="Yeti">
	<!-- END Custom Themes -->
	<link rel='stylesheet' type='text/css' href="style/custom.css">
	<script type="text/javascript" src="res/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="res/js/bootstrap-filestyle.min.js"></script>
	
	<!-- Add jquery flicker fixing class -->
	<script>
		document.write('<style type="text/css">.fix-jquery-flicker{display:none}</style>');
		jQuery(function($) {
		$('.fix-jquery-flicker').css('display','block');
		});
	</script>

	<!-- Input navbar for all pages below -->
	
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_navbar_collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="./"><?php echo Config::get('navtitle');?></a>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="main_navbar_collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo Config::get('home');?>">Home</a></li>
					<li><a href="https://github.com/IntellectualCrafters/PlotSquared/wiki">Wiki</a></li>
					<li><a href="https://github.com/IntellectualCrafters/PlotSquared/issues">Issues</a><li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav>
	
</head>