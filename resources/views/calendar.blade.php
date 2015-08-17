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

	#calendar {
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

</style>
@stop

@section('content')
  <div id='calendar'></div>
	<div>

	</div>
@stop


@section('extra-scripts')
<script src="{{ URL::asset('assets/calendar/js/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/calendar/js/fullcalendar.js') }}"></script>
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			defaultDate: '2015-02-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2015-02-01'
				},
				{
					title: 'Long Event',
					start: '2015-02-07',
					end: '2015-02-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2015-02-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2015-02-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2015-02-11',
					end: '2015-02-13'
				},
				{
					title: 'Meeting',
					start: '2015-02-12T10:30:00',
					end: '2015-02-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2015-02-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2015-02-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2015-02-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2015-02-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2015-02-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2015-02-28'
				}
			]
		});

	});

</script>
@stop
