@extends('master')

@section('title')
  Granada Hills Speech And Debate Team
@stop

@section('styles')
<style>
  .profilePic {
    border-radius: 50px;
    height: 50px;
    width: 50px;
  }
  .caption {
    font-size: 1.2em;
  }
  ul.pagination {
    list-style-type: none;
    text-align: center;
  }
  ul.pagination li {
    display: inline;
    padding-left: 5px;
    padding-right: 5px;
  }
  .inner {
    overflow: hidden;
  }
  #banner {
    width: 1000px;
    height: 200px;
    padding-bottom: 50px;
  }
</style>
@stop

@section('banner')
    <img id="banner" src="{{ URL::asset('assets/images/ghsnd_cover_photo.jpg')}}">
@stop

@section('articles')
<!-- Post -->
  @foreach($soc_med as $post)
  <article class="box post post-excerpt">
    <header>
      <!--
        Note: Titles and subtitles will wrap automatically when necessary, so don't worry
        if they get too long. You can also remove the <p> entirely if you don't
        need a subtitle.
      -->
      <h2><img class="profilePic" src="{{ $post->profile_pic_url }}"><a href="#">@if($post->source == 'Instagram') Instagram - {{$post->username}} @endif
        @if($post->source == 'Twitter') Twitter - @<span>{{ $post->username }}</span> @endif</a>
      </h2>
    </header>
    <div class="info">
      <!--
        Note: The date should be formatted exactly as it's shown below. In particular, the
        "least significant" characters of the month should be encapsulated in a <span>
        element to denote what gets dropped in 1200px mode (eg. the "uary" in "January").
        Oh, and if you don't need a date for a particular page or post you can simply delete
        the entire "date" element.

      -->
      <span class="date"><span class="month">Aug<span>ust</span></span> <span class="day">14</span><span class="year">, 2014</span></span>
      <!--
        Note: You can change the number of list items in "stats" to whatever you want.
      -->
      <ul class="stats">
        <li><a href="#" class="icon fa-comment">16</a></li>
        <li><a href="#" class="icon fa-heart">32</a></li>
        <li><a href="#" class="icon fa-twitter">64</a></li>
        <li><a href="#" class="icon fa-facebook">128</a></li>
      </ul>
    </div>
    <a href="#" class="image featured">@if($post->imgUrl != 'N/A')<img src="{{ $post->imgUrl }}" alt="" href="{{ $post->link }}"/>@endif</a>
    <h2 class="caption">
      @if($post->source == 'Instagram')
        {{ $post->caption }}
      @endif
      @if($post->source == 'Twitter')
        {{ $post->tweet }}
      @endif
    </h2>
  </article>
  @endforeach

@stop

@section('pagination')
<!-- Pagination -->
  <div class="paginate-section">
    <!--<a href="#" class="button previous">Previous Page</a>-->
      <p>{!! $soc_med->render() !!}</p>
  </div>
@stop
