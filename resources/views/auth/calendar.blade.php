@extends('auth.master')

@section('title', 'Calendar')

@section('stylesheets')
  <link href="{{ URL::asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/css/jquery-ui.theme.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/css/jquery-ui.structure.min.css') }}" rel="stylesheet">
@stop

@section('style')
  <style>
    .start, .end {
      display: inline-block;
      width: 30%;
    }
    .div-form {
      padding-bottom: 3em;
    }
  </style>
@stop

@include('auth.nav')

@section('content')
  @if(Session::has('added'))
      <h1 class="alert alert-success"> {{ Session::get('added') }}</h1>
  @else
        <h1 class="page-header">Add Event</h1>
  @endif
          <div class="form-group">
            {!! Form::open(['id' => 'event-form']) !!}
            <div class="col-lg-12 div-form">
              <div class="">
                {!! Form::label('Event Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'calendar-title', 'placeholder' => 'Untitled Event']) !!}
              </div>
              <div class="">
                <label>All Day?</label>
                {!! Form::checkbox('all_day', '1', false, ['id' => 'allDay', 'onClick' => 'disableButtons()']) !!}
              </div>
            </div>
            <div class="col-lg-10 div-form">
              <div class="col-lg-6">
                {!! Form::text('start-date', substr(\Carbon\Carbon::now(), 0, 10), ['class' => 'form-control start pull-left', 'id' => 'calendar-start-date']) !!}
                {!! Form::select('start-time', ['00:00:00' => '12:00AM',
                                                '00:30:00' => '12:30AM',
                                                '01:00:00' => '1:00AM',
                                                '01:30:00' => '1:30AM',
                                                '02:00:00' => '2:00AM',
                                                '02:30:00' => '2:30AM',
                                                '03:00:00' => '3:00AM',
                                                '03:30:00' => '3:30AM',
                                                '04:00:00' => '4:00AM',
                                                '04:30:00' => '4:30AM',
                                                '05:00:00' => '5:00AM',
                                                '05:30:00' => '5:30AM',
                                                '06:00:00' => '6:00AM',
                                                '06:30:00' => '6:30AM',
                                                '07:00:00' => '7:00AM',
                                                '07:30:00' => '7:30AM',
                                                '08:00:00' => '8:00AM',
                                                '08:30:00' => '8:30AM',
                                                '09:00:00' => '9:00AM',
                                                '09:30:00' => '9:30AM',
                                                '10:00:00' => '10:00AM',
                                                '10:30:00' => '10:30AM',
                                                '11:00:00' => '11:00AM',
                                                '11:30:00' => '11:30AM',
                                                '12:00:00' => '12:00PM',
                                                '12:30:00' => '12:30PM',
                                                '13:00:00' => '1:00PM',
                                                '13:30:00' => '1:30PM',
                                                '14:00:00' => '2:00PM',
                                                '14:30:00' => '2:30PM',
                                                '15:00:00' => '3:00PM',
                                                '15:30:00' => '3:30PM',
                                                '16:00:00' => '4:00PM',
                                                '16:30:00' => '4:30PM',
                                                '17:00:00' => '5:00PM',
                                                '17:30:00' => '5:30PM',
                                                '18:00:00' => '6:00PM',
                                                '18:30:00' => '6:30PM',
                                                '19:00:00' => '7:00PM',
                                                '19:30:00' => '7:30PM',
                                                '20:00:00' => '8:00PM',
                                                '20:30:00' => '8:30PM',
                                                '21:00:00' => '9:00PM',
                                                '21:30:00' => '9:30PM',
                                                '22:00:00' => '10:00PM',
                                                '22:30:00' => '10:30PM',
                                                '23:00:00' => '11:00PM',
                                                '23:30:00' => '11:30PM'
                ], null, ['form' => 'event-form', 'id' => 'select-start']) !!}
              </div>
              <div class="pull-right col-lg-6">
                {!! Form::text('end-date', substr(\Carbon\Carbon::now()->addDay(), 0, 10), ['class' => 'form-control end pull-left', 'id' => 'calendar-end-date']) !!}
                {!! Form::select('end-time', ['00:00:00' => '12:00AM',
                                                '00:30:00' => '12:30AM',
                                                '01:00:00' => '1:00AM',
                                                '01:30:00' => '1:30AM',
                                                '02:00:00' => '2:00AM',
                                                '02:30:00' => '2:30AM',
                                                '03:00:00' => '3:00AM',
                                                '03:30:00' => '3:30AM',
                                                '04:00:00' => '4:00AM',
                                                '04:30:00' => '4:30AM',
                                                '05:00:00' => '5:00AM',
                                                '05:30:00' => '5:30AM',
                                                '06:00:00' => '6:00AM',
                                                '06:30:00' => '6:30AM',
                                                '07:00:00' => '7:00AM',
                                                '07:30:00' => '7:30AM',
                                                '08:00:00' => '8:00AM',
                                                '08:30:00' => '8:30AM',
                                                '09:00:00' => '9:00AM',
                                                '09:30:00' => '9:30AM',
                                                '10:00:00' => '10:00AM',
                                                '10:30:00' => '10:30AM',
                                                '11:00:00' => '11:00AM',
                                                '11:30:00' => '11:30AM',
                                                '12:00:00' => '12:00PM',
                                                '12:30:00' => '12:30PM',
                                                '13:00:00' => '1:00PM',
                                                '13:30:00' => '1:30PM',
                                                '14:00:00' => '2:00PM',
                                                '14:30:00' => '2:30PM',
                                                '15:00:00' => '3:00PM',
                                                '15:30:00' => '3:30PM',
                                                '16:00:00' => '4:00PM',
                                                '16:30:00' => '4:30PM',
                                                '17:00:00' => '5:00PM',
                                                '17:30:00' => '5:30PM',
                                                '18:00:00' => '6:00PM',
                                                '18:30:00' => '6:30PM',
                                                '19:00:00' => '7:00PM',
                                                '19:30:00' => '7:30PM',
                                                '20:00:00' => '8:00PM',
                                                '20:30:00' => '8:30PM',
                                                '21:00:00' => '9:00PM',
                                                '21:30:00' => '9:30PM',
                                                '22:00:00' => '10:00PM',
                                                '22:30:00' => '10:30PM',
                                                '23:00:00' => '11:00PM',
                                                '23:30:00' => '11:30PM'
                ], null, ['form' => 'event-form', 'id' => 'select-end']) !!}
              </div>
            </div>
            <div class="col-lg-12">
              {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            </div>
               {!! Form::close() !!}
        </div>
@stop

@include('auth.nav2')

@section('scripts')
  <script src="{{ URL::asset('assets/js/jquery-ui.min.js') }}"></script>
  <script>
    $( "#calendar-start-date" ).datepicker({
    	inline: true,
      dateFormat: 'yy-mm-dd'
    });
    $( "#calendar-end-date" ).datepicker({
      inline: true,
      dateFormat: 'yy-mm-dd'
    });
  </script>
  <script>
  function disableButtons() {
    if( document.getElementById('allDay').checked) {
      document.getElementById('select-start').disabled = true;
      document.getElementById('select-end').disabled = true;
      console.log('here');
    }
    if( document.getElementById('allDay').checked == false) {
      document.getElementById('select-start').disabled = false;
      document.getElementById('select-end').disabled = false;
      console.log('here');
    }
  }
  </script>
@stop
