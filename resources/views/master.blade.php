<!DOCTYPE HTML>
<!--
	Striped by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cinzel">
		<link rel="shortcut icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
  <style>
  @media screen and (min-width: 737px) {
    #primaryLogo {
      display: inline-block;
      vertical-align: middle;
      text-align: center;
      height: 150px;
    }
  }

  @media screen and (max-width: 1000px) {
    #primaryLogo {
      display: inline-block;
      float: right;
      height: 75px;
    }
  }
	@media screen and (min-width: 1000px) {
		#primaryLogo {
			padding-left: .3em;
		}
		.title-banner {
			padding-bottom: 5em;
			padding-top: 5em;
			background-image: url(https://dl.dropboxusercontent.com/u/48479368/GHSnD/cover-photo.png);
			background-size: cover;
			background-position: 25% 25%;
		}
	}
	@media screen and (max-width: 999px) {
		.title-banner {
			padding-top: 5em;
			background-image: url(https://dl.dropboxusercontent.com/u/48479368/GHSnD/cover-photo.png);
			background-size: cover;
			background-position: 25% 25%;
		}
		.banner-text {
			font-size: 50px;
			color: #fff;
			font-weight:100;
			text-align: center;
			padding-left: 0em;
			line-height: 1.3em;
			font-family: "Source Sans Pro", sans-serif;
		}
	}
	@media screen and (min-width: 1000px) {
		.banner-text {
			font-size: 50px;
			color: #fff;
			font-weight:100;
			text-align: center;
			padding-bottom: 10px;
			padding-left: 5em;
			font-family: "Source Sans Pro", sans-serif;
		}
	}
  #titleBar {
    height: 75px;
  }
  #titleBar .toggle:before {
    height: 45px;
    line-height: 45px;
		background: #16621b;
  }
	#titleBar .toggle {
		top: 7px;
	}
	#content {
		box-shadow: inset 0px 5px 0px rgba(0, 0, 0, 0.2);
	}
	.banner-text {
		text-shadow: 1.5px 1.5px #707070;
	}

	</style>
	@yield('styles')
	<body>

		<!-- Content -->
		<div class="title-banner">
			<h1 class="banner-text">GHCHS Speech and Debate</h1>
		</div>
			<div id="content">
				<div class="inner">
					@yield('banner')

					@yield('articles', 'Social Media and Admin Updates')

					@yield('pagination')

				</div>
			</div>

		<!-- Sidebar -->
			<div id="sidebar">

				<!-- Logo -->
					<h1 id="logo"><img id="primaryLogo" src="{{ URL::asset('assets/images/logofixed.png') }}"></h1>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li class="current"><a href="#">Home</a></li>
							<li><a href="#">Team Updates</a></li>
							<li><a href="#">Recent Posts</a></li>
							<li><a href="#">Calendar</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href"#">Resources</a></li>
						</ul>
					</nav>

          <!-- Calendar -->
  					<section class="box calendar">
  						<div class="inner">
  							@yield('calendar')
  						</div>
  					</section>
				<!-- Search -->
					<section class="box search">
						<form method="post" action="#">
							<input type="text" class="text" name="search" placeholder="Search" />
						</form>
					</section>


				<!-- Recent Posts -->
					<section class="box recent-posts">
						<header>
							<h2>Recent Posts</h2>
						</header>
						<ul>
							<li><a href="#">Lorem ipsum dolor</a></li>
							<li><a href="#">Feugiat nisl aliquam</a></li>
							<li><a href="#">Sed dolore magna</a></li>
							<li><a href="#">Malesuada commodo</a></li>
							<li><a href="#">Ipsum metus nullam</a></li>
						</ul>
					</section>


				<!-- Copyright -->
					<ul id="copyright">
						<li>&copy; GHCHS Speech &amp; Debate.</li><li>Design: Cory Cunanan</a></li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
			<script src="{{ URL::asset('assets/js/skel.min.js') }}"></script>
			<script src="{{ URL::asset('assets/js/util.js') }}"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="{{ URL::asset('assets/js/main.js') }}"></script>

	</body>
</html>
