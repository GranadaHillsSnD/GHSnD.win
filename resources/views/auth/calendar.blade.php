@extends('auth.master')

@section('title', 'Calendar')

@section('stylesheets')
  <link href="{{ URL::asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/css/jquery-ui.theme.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/css/jquery-ui.structure.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/css/pick-a-color.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/css/fileinput.min.css') }}" rel="stylesheet">
@stop

@section('style')
  <style>
    .start, .end {
      display: inline-block;
    }
    .div-form {
      padding-bottom: 3em;
    }
    .center-text {
      text-align: center;
    }
    .checkbox input[type=checkbox] {
      margin-left: -5px;
    }
    .checkbox {
      margin-top: 2px;
    }
    .form-div h4 {
      margin-bottom: 5px;
    }
    .pick-a-color-markup .color-preview.current-color {
      margin-bottom: 0;
    }
    .pick-a-color-markup .caret {
      margin-bottom: 8px;
    }
    div.file-input .col-md-6.clear-file {
      clear:left;
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
            {!! Form::open(['id' => 'event-form', 'files' => true, 'enctype' => "multipart/form-data"]) !!}
            <div class="col-md-12 div-form">
                <h3><label for="calendar-title">Event Title</label></h3>
                {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'calendar-title', 'placeholder' => 'Event Title']) !!}
              <div class="col-md-2 form-div center-text">
                <h4><label for="allDay">All Day</label></h4>
                <div class="checkbox center-text">
                      {!! Form::checkbox('all_day', '1', false, ['id' => 'allDay', 'onClick' => 'disableButtons()']) !!}
                </div>
              </div>
              <div class="col-md-5">
                <label for="calendar-start-date">Start Date</label>
                <div>
                  <div class="col-md-6">
                      {!! Form::text('start-date', substr(\Carbon\Carbon::now(), 0, 10), ['class' => 'form-control start', 'id' => 'calendar-start-date']) !!}
                  </div>
                  <div class="col-md-6">
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
                    ], null, ['class' => 'form-control','form' => 'event-form', 'id' => 'select-start']) !!}
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <label for="calendar-end-date">End Date</label>
                <div>
                  <div class="col-md-6">
                    {!! Form::text('end-date', substr(\Carbon\Carbon::now()->addDay(), 0, 10), ['class' => 'form-control end pull-left', 'id' => 'calendar-end-date']) !!}
                  </div>
                  <div class="col-md-6">
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
                    ], null, ['class' => 'form-control', 'form' => 'event-form', 'id' => 'select-end']) !!}
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4 div-form color">
                <label for="calendar-color">Color</label>
                <input type="text" value="548b54" name="calendar-color" id="calendar-color" class="pick-a-color form-control">
              </div>
              <div class="col-md-8">
                <label for="location">Location</label>
                {!! Form::text('location', null, ['class' => 'form-control', 'id' => 'location', 'placeholder' => 'Location']) !!}
              </div>
            </div>
            <div class="col-lg-12">
              <label>Event Description</label>
              <div class="form-group">
                {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'maxlength' => 5000]) !!}
              </div>
            </div>
            <div class="form-group file-input">
              <div class="col-md-6 clear-file">
                <input id="file-1" name="file-1" type="file" class="file" data-preview-file-type="text" >
              </div>
              <div class="col-md-6">
                <input id="file-2" name="file-2" type="file" class="file" data-preview-file-type="text" >
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
  <script src="{{ URL::asset('assets/js/tinycolor-0.9.15.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/pick-a-color-1.2.3.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/fileinput.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('assets/tinymce/tinymce.min.js') }}"></script>
  <script type="text/javascript">
  tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link"
  });
  </script>
  <script>
    $(".pick-a-color").pickAColor({
      showSpectrum            : true,
      showSavedColors         : false,
      saveColorsPerElement    : false,
      fadeMenuToggle          : true,
      showHexInput            : true,
      showBasicColors         : true,
      allowBlank              : false,
      inlineDropdown          : true
    });
    $( "#calendar-start-date" ).datepicker({
    	inline: true,
      dateFormat: 'yy-mm-dd'
    });
    $( "#calendar-end-date" ).datepicker({
      inline: true,
      dateFormat: 'yy-mm-dd'
    });
    $(".color-dropdown").addClass("form-control");
  </script>
  <script>
  function disableButtons() {
    if(document.getElementById('allDay').checked) {
      $('#select-start').hide();
      $('#select-end').hide();
    }
    else {
      $('#select-start').show();
      $('#select-end').show();
    }
  }
  </script>
@stop
