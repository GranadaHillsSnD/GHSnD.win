@extends('auth.master')

@section('title', 'Edit Post')

@include('auth.nav')

@section('content')
  <h1 class="page-header">Edit Post from {{ $post[0]->datetime_posted }}</h1>
  <div class="form-group">
    {!! Form::open(['id' => 'post-form']) !!}
    <div class="col-lg-12 div-form">
      <div class="post-form">
        {!! Form::label('Post Event') !!}
        <textarea id="content" name="content" class="form-control" maxlength=10000>{!! $post[0]->message !!}</textarea>
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
<script type="text/javascript" src="{{ URL::asset('assets/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
tinymce.init({
  selector: "textarea",
  plugins: [
      "advlist autolink lists link image charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime media table contextmenu paste"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
@stop
