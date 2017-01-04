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
				<a class="navbar-brand" href="./">CP2 Interface</a>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="main_navbar_collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo Config::get('home');?>">Home</a></li>
					<li><a href="https://github.com/IntellectualCrafters/PlotSquared/wiki">Wiki</a></li>
					<li><a href="https://github.com/IntellectualCrafters/PlotSquared/issues">Issues</a><li>
				</ul>
				<!-- User control (right side of navbar) -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown alert-dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span style="margin: -10px 0px; font-size: 16px;"><i class="fa fa-envelope"></i> <div style="display: inline;" id="pms"></div></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Click View Messages</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="../user/messaging">View Messages</a></li>
						</ul>
					</li>	
					
					<li class="dropdown alert-dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span style="margin: -10px 0px; font-size: 16px;"><i class="fa fa-flag"></i> <div style="display: inline;" id="alerts"></div></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Click View Alerts</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="../user/alerts">View Alerts</a></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;MuhsinunCool <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="../profile/">Profile</a></li>
							<li class="divider"></li>
							<li><a href="../user">UserCP</a></li>
							<li><a href="../mod">ModCP</a></li>
							<li><a href="../admin">AdminCP</a></li>
							<li class="divider"></li>
							<li><a href="../infractions">Infractions</a></li>
							<li class="divider"></li>
							<li><a href="./login.php"></a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav>
	
</head>