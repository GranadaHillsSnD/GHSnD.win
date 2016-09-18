@extends('auth.master')

@section('title', 'Home')

@section('style')
  <style>
  .post {
    padding-bottom: 1em;
    margin-bottom: 2em;
    border-bottom: 1px solid;
  }
  .postMedia {
    height: 250px;
    text-align: center;
    border: 1px solid;
  }
  .mediaSection {
    text-align: center;
  }
  .deny {
    margin-left: 5px;
  }
  form.approval {
    display: inline-block;
  }
  </style>
@stop

@include('auth.nav')
@section('content')
                <div class="col-lg-12">
                    <h1 class="page-header">{{ $pageHeader }}</h1>
                    @foreach($soc_media as $post)
                      <div class="col-lg-12 post">
                        <p>Source: {{ $post->source }} {!! Form::open([
            'method' => 'PATCH',
            'route' => ['media.deny', $post->social_media_id],
            'class' => 'pull-right deny approval'
        ]) !!}
        {!! Form::submit('Deny', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        {!! Form::open([
          'method' => 'PATCH',
          'route' => ['media.approve', $post->social_media_id],
          'class' => 'pull-right approval approval'
          ]) !!}
          {!! Form::submit('Approve', ['class' => 'btn btn-success']) !!}
          {!! Form::close() !!}
                        <p>Username: @<span>{{ $post->username }}</span></p>
                        <p>Caption/Tweet: @if($post->caption != 'N/A')
                            {{ $post->caption }}
                          @elseif($post->tweet != 'N/A')
                            {{ $post->tweet }}
                          @endif
                        </p>
                        <div class="mediaSection">@if($post->source == 'Instagram' || $post->source == 'Admin-Insta')<img src="{{ URL::asset('/instagrams/'.$post->insta_id.'.jpg') }}" class="postMedia">@endif</div>
                      </div>
                    @endforeach
                </div>
                <!-- /.col-lg-12 -->
@stop

@include('auth.nav2')
