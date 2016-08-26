@extends('auth.master')

@section('title', 'Add Post')

@include('auth.nav')

@section('content')
  @if(Session::has('added-post'))
      <h1 class="alert alert-success"> {{ Session::get('added-post') }}</h1>
  @else
        <h1 class="page-header">Add New Post</h1>
  @endif
          <div class="form-group">
            {!! Form::open(['id' => 'post-form']) !!}
            <div class="col-lg-12 div-form">
              <div class="post-form">
                {!! Form::label('Post Event') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content', 'placeholder' => 'Post Content', 'maxlength' => 10000]) !!}
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
  height: "300",
  selector: "textarea",
  plugins: [
      "advlist autolink lists link charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime table contextmenu paste"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link"
});
</script>
@stop
