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
              <div class="">
                {!! Form::label('Post Event') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content', 'placeholder' => 'Post Content']) !!}
              </div>
            </div>
            <div class="col-lg-12">
              {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            </div>
               {!! Form::close() !!}
        </div>
@stop

@include('auth.nav2')
