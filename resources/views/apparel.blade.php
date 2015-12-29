@extends('master')

@section('title', 'GHCHS Apparel')

@section('styles')
  <style>
    .category {
      font-size: 125%;
    }
    .card {
      background-color: #fff;
      border-radius: 3px;
      margin-bottom: 30px;
      margin-left: -1px;
      margin-right: -1px;
      border: 1px solid #edeeee;
      clear:both;
      padding: 1em 2em 1em 2em;
    }
    .card h2 {
      text-align: center;
      font-size: 30px;
      line-height: 30px;
      padding-bottom: 1em;
    }
    .card h3 {
      text-align: center;
    }
    .big-info {
      margin-bottom: 3em;
      margin-top: 2em;
    }
    .apparel {
      text-align: center;
      height: auto;
    }
    .half {
      width: 50%;
      float: left;
      padding: 0 1em 0 1em;
    }
    .apparel {
      max-width: 100%;
      overflow: auto;
    }
    .whole {
      text-align: center;
    }
    .price {
      padding: 1em 0 1em 0;
      clear: both;
    }
    .form {
      text-align: center;
    }
  </style>
@stop

@section('content')
<div class="big-info">
  <div class="card apparel form">
      <h2>GHCHS Apparel Order Form!</h2>
        <p>Download this form and bring this and your payment to the Student Store.</p>
        <a target="_blank" href="{{ URL::asset('assets/images/apparel/ApparelOrderForm.pdf') }}">GHCHS Speech and Debate Apparel Form</a>
  </div>
  <div class="card apparel">
      <h2>T-Shirt</h2>
      <div class="whole">
        <span class="half"><img class="apparel" src="{{ URL::asset('assets/images/apparel/t-front.png') }}"></img></span>
        <span class="half"><img class="apparel" src="{{ URL::asset('assets/images/apparel/t-back.png') }}"></img></span>
      </div>
      <h2 class="price">$20</h2>
  </div>
  <div class="card apparel">
      <h2>Sweater</h2>
      <div class="whole">
        <span class="half"><img class="apparel" src="{{ URL::asset('assets/images/apparel/sweater-front.png') }}"></img></span>
        <span class="half"><img class="apparel" src="{{ URL::asset('assets/images/apparel/sweater-back.png') }}"></img></span>
      </div>
      <h2 class="price">Sweatshirt (empty): $35</h2>
      <h2 class="price">Sweatshirt (1 Line Personalization): $40</h2>
      <h2 class="price">Sweatshirt (2 Line Personalization): $45</h2>
  </div>
</div>
@stop
