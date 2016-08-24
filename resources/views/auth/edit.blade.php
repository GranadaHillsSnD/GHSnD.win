@extends('auth.master')

@section('stylesheets')
  <style>
    .box {
      margin-top: 20px;
    }
  </style>
@stop

@section('title', 'Edit Posts')

@include('auth.nav')

@section('content')
  <div class="col-lg-12">
  @if(Session::has('edited-post'))
      <h1 class="alert alert-success"> {{ Session::get('edited-post') }}</h1>
  @endif
  @foreach($posts as $post)
    <article class="box post">
      <div class="message-username username">
        <img class="profilePic" src="{{ $post->profile_pic_url }}">
        <a href="{{ route('post.edit', ['id' => $post->social_media_id]) }}"><button class="btn btn-danger pull-right">Edit</button></a>
        <div class="info">
          <!--
            Note: The date should be formatted exactly as it's shown below. In particular, the
            "least significant" characters of the month should be encapsulated in a <span>
            element to denote what gets dropped in 1200px mode (eg. the "uary" in "January").
            Oh, and if you don't need a date for a particular page or post you can simply delete
            the entire "date" element.

          -->
          <span class="date">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->datetime_posted)->diffForHumans() }}
        </div>
        <h2>From {{ $post->username }}</h2>
      </div>
      <div class="message">
          {!! $post->message !!}
      <div>
    </article>

  @endforeach
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
tinyMCE.activeEditor.setContent('<span>some</span>');
</script>
@stop
