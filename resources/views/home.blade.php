@extends('master')

@section('title')
  Granada Hills Speech And Debate Team
@stop

@section('styles')
<style>
  article {
    background-color: #fff;
    border-radius: 3px;
    margin-bottom: 40px;
    margin-left: -1px;
    margin-right: -1px;
    border: 2px solid #edeeee;
    clear:both;
    padding: 1em 1em 1em 1em;
  }
  .profilePic {
    border-radius: 50px;
    height: 50px;
    width: 50px;
  }
  .caption {
    font-size: 1.3em;
    line-height: 1.3em;
    font-weight: lighter;
  }
  ul.pagination {
    list-style-type: none;
    text-align: center;
  }
  ul.pagination li {
    display: inline;
    padding: 0 5px 0 5px;
  }
  .inner {
    overflow: hidden;
  }
  .box.post h2 {
    font-size: 24px;
  }
  @media screen and (min-width: 737px) {
    .post-excerpt {
      padding-bottom: 2.5em;
    }
    .image img {
      width: 450px;
      display: inline-block;
    }
  }
  @media screen and (min-width: 1000px) {
    .post-excerpt {
      text-align: center;
    }
  }
  @media screen and (max-width: 999px) {
    .post-excerpt {
      text-align: center;
    }
    .post {
      border-bottom: solid 1px #ddd;
    }
  }
  .twitter-title {
    color: #55acee;
  }
  .insta-title {
    color: #af8a72;
  }
  .fa-twitter {
    padding-right: 10px;
  }
  .fa-instagram {
    padding-right: 15px;
  }
  .message {
    padding: 1em 2em 1em 2em;
  }
  .message-username {
    text-align: center;
  }
  .message-username h2{
    line-height: 24px;
  }
  div.message ul {
    list-style: disc;
  }
  .flash {
    text-align: center;
    text-decoration: underline;
  }
</style>
@stop

@section('articles')
<!-- Post -->
  @if (Session::has('email'))
    <article class="box post">
      <div class="message-username username">
        <img class="profilePic" src="{{ URL::asset('assets/images/email-icon.png') }}">
        <div class="info">
          <!--
            Note: The date should be formatted exactly as it's shown below. In particular, the
            "least significant" characters of the month should be encapsulated in a <span>
            element to denote what gets dropped in 1200px mode (eg. the "uary" in "January").
            Oh, and if you don't need a date for a particular page or post you can simply delete
            the entire "date" element.

          -->
          <span class="date">{{ \Carbon\Carbon::now()->diffForHumans() }}
        </div>
        <h2>From Granada Hills Speech & Debate</h2>
      </div>
      <div class="flash">
          <h3>{{ Session::get('email') }}</h3>
      <div>
    </article>
  @endif
  @foreach($soc_med as $post)
  @if($post->source == 'Admin-Post')
  <article class="box post">
    <div class="message-username username">
      <img class="profilePic" src="{{ $post->profile_pic_url }}">
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
  @else
  <article class="box post post-excerpt">
    <header>
      <!--
        Note: Titles and subtitles will wrap automatically when necessary, so don't worry
        if they get too long. You can also remove the <p> entirely if you don't
        need a subtitle.
      -->
        <div class="username">
          <img class="profilePic" src="{{ $post->profile_pic_url }}">
              @if($post->source == 'Instagram' || $post->source == 'Admin-Insta')<h2 class="insta-title"><i class="icon-logo fa fa-instagram"></i> @<span>{{$post->username}}</span> @endif
              @if($post->source == 'Twitter' || $post->source == 'Admin-Twitter')<h2 class="twitter-title"><i class="icon-logo fa fa-twitter"></i> @<span>{{ $post->username }}</span> @endif
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
          <span class="date">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->datetime_posted)->diffForHumans() }}</span>
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
        @if($post->link != 'N/A')<a href="{{ $post->link }}" class="image featured">@if($post->imgUrl != 'N/A')<img src="{{ $post->imgUrl }}" alt=""/>@endif</a>@endif
        <p class="caption">
          @if($post->source == 'Instagram' || $post->source == 'Admin-Insta')
            {{ $post->caption }}
          @elseif($post->source == 'Twitter' || $post->source == 'Admin-Twitter')
            {{ $post->tweet }}
          @endif
        </p>
  </article>
  @endif
  @endforeach

@stop

@section('pagination')
<!-- Pagination -->
  <div class="paginate-section">
    <!--<a href="#" class="button previous">Previous Page</a>-->
      <p>{!! $soc_med->render() !!}</p>
  </div>
@stop
