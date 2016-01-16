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
		@yield('extra-links')
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
  <style>
	#content {
		background-color: #fafafa;
	}
	#banner {
    width: 700px;
    height: 200px;
    padding-bottom: 50px;
  }
  .today {
    background-color: #c94663;
  }
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
	.bottom-nav {
		text-align: center;
		padding-top: 2em;
	}
	#content {
		background-color: #fafafa;
	}
	.subscriber {
		padding-top: 2em;
		text-align: center;
	}
	.subscriber-button {
		margin-top: 0.5em;
	}

	</style>
	@yield('styles')
	<body>
		<?php
			$first = \Carbon\Carbon::createFromFormat('Y-m-d', substr(new \Carbon\Carbon('first day of this month'), 0, 10))->dayOfWeek;
			$last = \Carbon\Carbon::createFromFormat('Y-m-d', substr(new \Carbon\Carbon ('last day of this month'), 0, 10))->dayOfWeek;
			$numDays = \Carbon\Carbon::today()->daysInMonth;
			$numWeeks = (int)(($numDays - ((7 - $first) + $last + 1))/7); //did some math here
			$carbon = [
				'first' => $first,
				'last' => $last,
				'numWeeks' => $numWeeks,
				'numDays' => $numDays,
				'today' => (int)substr(substr(\Carbon\Carbon::today(), 0, 10), 8, 5)
			];
		?>

		<!-- Content -->
		<div class="title-banner">
			<h1 class="banner-text">GHCHS Speech and Debate</h1>
		</div>
			<div id="content">
				<div class="inner">
					@yield('content')

					@yield('banner')

					@yield('articles')

					@yield('pagination')

					<div class="bottom-nav">
						<ul class="special">
							<li><a href="/staff" class="glyphicon glyphicon-sunglasses"></a></li>
							<li><a href="/about" class="glyphicon glyphicon-user"></a></li>
							<li><a href="/calendar" class="glyphicon glyphicon-calendar"></a></li>
							<li><a href="/resources" class="glyphicon glyphicon-briefcase"></a></li>
						</ul>
					</div>
				</div>

			</div>

		<!-- Sidebar -->
			<div id="sidebar">
				<!-- Logo -->
					<h1 id="logo"><img id="primaryLogo" src="{{ URL::asset('assets/images/logofixed.png') }}"></h1>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<?php $route = Route::current()->uri(); ?>
							<li @if($route == '/') class="current" @endif><a href="/">Home</a></li>
							<li @if($route == 'updates') class="current" @endif><a href="/updates">Team Updates</a></li>
							<li @if($route == 'calendar') class="current" @endif><a href="/calendar">Calendar</a></li>
							<li @if($route == 'about') class="current" @endif><a href="/about">What We Do</a></li>
							<li @if($route == 'staff') class="current" @endif><a href="/staff">Meet The Staff</a></li>
							<li @if($route == 'apparel') class="current" @endif><a href="/apparel">Apparel</a></li>
						</ul>
					</nav>
					<!-- Subscribe -->
					<div class="subscriber">
						@if (Session::has('email'))
							<p>{{ Session::get('email') }}</p>
						@else
							{!! Form::open(['id' => 'post-form', 'route' => 'subscribe.success']) !!}
								<input type="email" name="email" placeholder="Email Address">
								{!! Form::submit('Subscribe', ['class' => 'subscriber-button']) !!}
							{!! Form::close() !!}
						@endif
					</div>

          <!-- Calendar -->
  					<section class="box calendar">
  						<div class="inner">
								<table>
								  <caption>August 2015</caption>
								  <thead>
								    <tr>
								      <th scope="col" title="Sunday">S</th>
								      <th scope="col" title="Monday">M</th>
								      <th scope="col" title="Tuesday">T</th>
								      <th scope="col" title="Wednesday">W</th>
								      <th scope="col" title="Thursday">T</th>
								      <th scope="col" title="Friday">F</th>
								      <th scope="col" title="Saturday">S</th>
								    </tr>
								  </thead>
								  <tbody>
								    <?php $count = 1; ?>
								    <tr>
								      <td colspan="{{ $carbon['first'] }}" class="pad"><span>&nbsp;</span></td>
								    @for ($f = $carbon['first']; $f < 7; $f++ )
								      <td @if($carbon['today'] == $count) class="today" @endif><span>{{$count}}</td>
								      <?php $count++; ?>
								    @endfor
								    </tr>
								    @for ($i = 1; $i <= $carbon['numWeeks']; $i++)
								    <tr>
								      @for ($k = 0; $k <= 6; $k++)
								        <td @if($carbon['today'] == $count) class="today" @endif><span>{{$count}}</td>
								        <?php $count++; ?>
								      @endfor
								    </tr>
								    @endfor
								    <tr>
								    @for($l = $count; $l <= $carbon['numDays']; $l++)
								      <td @if($carbon['today'] == $count) class="today" @endif><span>{{$count}}</td>
								      <?php $count++; ?>
								    @endfor
								    <td class="pad" colspan="3"><span>&nbsp;</span></td>
								  </tbody>
								</table>
  						</div>
  					</section>
				<!-- Search -->
					<!-- <section class="box search">
						<form method="post" action="#">
							<input type="text" class="text" name="search" placeholder="Search" />
						</form>
					</section> -->


				<!-- Recent Posts -->
					<section class="box recent-posts">
						<header>
							<h2>Upcoming Events</h2>
						</header>
						<ul>
							<?php $calendarEvents = DB::table('calendar_events')->where('start','>=', \Carbon\Carbon::today())->orderBy('start', 'asc')->take(5)->get(); ?>
							@foreach($calendarEvents as $event)
								<li><a href="/calendar">{{$event->title}}</a></li>
							@endforeach
						</ul>
					</section>


				<!-- Copyright -->
					<ul id="copyright">
						<li>&copy; GHCHS Speech &amp; Debate.</li>
						<li>Designed By: Cory Cunanan</li>
						<li><a href="http://kevincunanan.com">Engineered By: Kevin Cunanan</a></li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
			<script src="{{ URL::asset('assets/js/skel.min.js') }}"></script>
			<script src="{{ URL::asset('assets/js/util.js') }}"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="{{ URL::asset('assets/js/main.js') }}"></script>
			@yield('extra-scripts')
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-68285865-1', 'auto');
			  ga('send', 'pageview');
			</script>

	</body>
</html>
