@extends('master')

@section('title')
  About Us
@stop

@section('styles')
  <style>
    .card {
      background-color: #fff;
      border-radius: 3px;
      margin-bottom: 60px;
      margin-left: -1px;
      margin-right: -1px;
      border: 1px solid #edeeee;
      clear:both;
      padding: 1em 1em 1em 1em;
    }
    .card h2 {
      text-align: center;
      font-size: 30px;
      line-height: 30px;
      padding-bottom: 1em;
    }
    .big-info {
      border-bottom: 1px solid;
      margin-bottom: 3em;
      margin-top: 2em;
    }
    .about {
      text-align: justify;
      -moz-text-align-last: justify;
      text-align-last: justify;
    }
  </style>
@stop

@section('content')
<div class="big-info">
  <div class="card about">
      <h2>Welcome to the Granada Hills Speech and Debate Team!</h2>
        <p>Public speaking is quite possibly one of the most underrated, yet most valuable skills that one can possess in high school and have available for the rest of his or her life. Public speaking is one of the most significant ways to communicate with others, increase one’s self-confidence and social skill set, and, most importantly, make a profound difference in one’s community. By influencing how others think, it allows many opportunities to create significant, positive change in the world around you.</p>

        <p>Speech and Debate is an academic activity that involves members competing in a/an event(s) that test one’s proficiency at public speaking. We at GHCHS Speech and Debate are guided by our love for self-expression and public speaking. If you love public speaking and wish to use it as a modium to express who you are as an individual, then this team is an incredible opportunity for you. If you want to become more confident and increase your proficiency at communicating with others, then this team will definitely help you accomplish that. If you’d like to increase your skill at presentations and interviews, and widen your professional skillset, this is the perfect place to hone those abilities.</p>

        <p>The Speech and Debate Team is split into two categories, speech and debate. Each category features multiple different events, all of which are very unique and valuable in their own right.</p>
  </div>
</div>
@stop
