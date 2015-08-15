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
    padding-left: 5px;
    padding-right: 5px;
  }
  .inner {
    overflow: hidden;
  }
  #banner {
    width: 700px;
    height: 200px;
    padding-bottom: 50px;
  }
  .today {
    background-color: #c94663;
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
      border-bottom: 1px solid;
      text-align: center;
    }
  }
  @media screen and (max-width: 999px) {
    .post-excerpt {
      border-bottom: solid 1px #ddd;
      text-align: center;
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

</style>
@stop

@section('banner')

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
      <div class="username">
        <img class="profilePic" src="{{ $post->profile_pic_url }}">
            @if($post->source == 'Instagram')<h2 class="insta-title"><i class="icon-logo fa fa-instagram"></i> @<span>{{$post->username}}</span> @endif
            @if($post->source == 'Twitter')<h2 class="twitter-title"><i class="icon-logo fa fa-twitter"></i> @<span>{{ $post->username }}</span> @endif
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
      <span class="date">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->datetime_posted)->diffForHumans() }}
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
      @if($post->source == 'Instagram')
        {{ $post->caption }}
      @endif
      @if($post->source == 'Twitter')
        {{ $post->tweet }}
      @endif
    </p>
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

@section('calendar')
<table>
  <caption>August 2015</caption>
  <thead>
    <tr>
      <th scope="col" title="Sunday">S</th>
      <th scope="col" title="Monday">M</th>
      <th scope="col" title="Tuesday">T</th>
      <th scope="col" title="Wednesday">W</th>
      <th scope="col" title="Thursday">T</th>
      <th scope="col" title="Friday">F</th>
      <th scope="col" title="Saturday">S</th>
    </tr>
  </thead>
  <tbody>
    <?php $count = 1; ?>
    <tr>
      <td colspan="{{ $carbon['first'] }}" class="pad"><span>&nbsp;</span></td>
    @for ($f = $carbon['first']; $f < 7; $f++ )
      <td @if($carbon['today'] == $count) class="today" @endif><span>{{$count}}</td>
      <?php $count++; ?>
    @endfor
    </tr>
    @for ($i = 1; $i <= $carbon['numWeeks']; $i++)
    <tr>
      @for ($k = 0; $k <= 6; $k++)
        <td @if($carbon['today'] == $count) class="today" @endif><span>{{$count}}</td>
        <?php $count++; ?>
      @endfor
    </tr>
    @endfor
    <tr>
    @for($l = $count; $l <= $carbon['numDays']; $l++)
      <td @if($carbon['today'] == $count) class="today" @endif><span>{{$count}}</td>
      <?php $count++; ?>
    @endfor
    <td class="pad" colspan="3"><span>&nbsp;</span></td>
  </tbody>
</table>
@stop
