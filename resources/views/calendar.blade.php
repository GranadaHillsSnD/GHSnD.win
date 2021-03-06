@extends('master')

@section('extra-links')
<link href="{{ URL::asset('assets/calendar/css/fullcalendar.css') }}" rel='stylesheet' />
<link href="{{ URL::asset('assets/calendar/css/fullcalendar.print.css') }}" rel='stylesheet' media='print' />
@stop

@section('styles')
<style>
	body {
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar, .events {
		background-color: #fff;
		border-radius: 3px;
		margin-bottom: 60px;
		margin-left: -1px;
		margin-right: -1px;
		border: 1px solid #edeeee;
		clear:both;
		padding: 1em 3em 1em 3em;
		margin-bottom: 2.5em;
	}
	.events h1 {
		font-size: 50px;
		line-height: 50px;
		text-align: center;
		padding-bottom: 1em;
	}

</style>
@stop

@section('content')
  <div id='calendar'></div>
	<div class="events">
		<h1>Calendar Events</h1>
		<div>
			@foreach($calendarEvents as $event)
				<div>
					@if($event->start >= \Carbon\Carbon::today())
							<span class="">{{$event->title}}</span> <a href="{{ URL::asset('/uploads/'.$event->file1_name) }}">{{ $event->file1_name }}</a> @if($event->all_day == '1')<span class="pull-right">{{ date('l, F d Y', strtotime($event->start)) }}</span>@else<span class="pull-right">{{ date('l, F d Y @ h:i a', strtotime($event->start)) }}</span>
						@endif
					@endif
				</div>
			@endforeach
		</div>
	</div>
@stop


@section('extra-scripts')
<script src="{{ URL::asset('assets/calendar/js/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/calendar/js/fullcalendar.js') }}"></script>
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
			@foreach($calendarEvents as $event)
				{
					title: '{{ $event->title }}',
					@if($event->all_day == 1)
						start: "{{ substr($event->start, 0, 10) }}",
						end: "{{ substr($event->end, 0, 10) }}",
					@else
					start: "{{ str_replace(' ', 'T', $event->start) }}",
					end: "{{ str_replace(' ', 'T', $event->end) }}",
					@endif
					backgroundColor: "#{{ $event->color }}"
				},
			@endforeach
						]
			});
	});

</script>
@stop
