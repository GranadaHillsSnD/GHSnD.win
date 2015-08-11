<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libraries\j7mbo\twitter_api_php\TwitterAPIExchange;

class SocialMediaController extends Controller
{

    public function getInstagrams() {
      $url = 'https://api.instagram.com/v1/tags/catsofinstagram/media/recent?client_id='.env('INSTAGRAM_CLIENT_ID');
      $content = file_get_contents($url);
      $json = json_decode($content, true);
      // echo "<pre>";
      // var_dump($json);
      // echo "</pre>";
      foreach($json['data'] as $images) {
          $imgUrl = $images['images']['standard_resolution']['url'];
          $description = $images['caption']['text'];
          echo "<img src=".$imgUrl.">"."<br>";
          echo $description."<br>";
          echo $images['caption']['from']['username']."<br>";
          $profilePic = $images['caption']['from']['profile_picture'];
          echo "<img src=".$profilePic.">"."<br>";
      }
    }

    public function getTweets() {
      $settings = array(
        'oauth_access_token'          => env('TWITTER_ACCESS_TOKEN'),
        'oauth_access_token_secret'   => env('TWITTER_ACCESS_TOKEN_SECRET'),
        'consumer_key'                => env('TWITTER_CONSUMER_KEY'),
        'consumer_secret'             => env('TWITTER_CONSUMER_SECRET')
      );
      $url = 'https://api.twitter.com/1.1/search/tweets.json';
      $getField = 'q=%23cats&result_type=recent';
      $requestMethod = 'GET';
      $twitter = new TwitterAPIExchange($settings);
      $content = $twitter->setGetfield($getField)
        ->buildOauth($url, $requestMethod)
        ->performRequest();
      $json = json_decode($content, true);
      echo "<pre>";
      var_dump($json);
      echo "</pre>";
      foreach($json['statuses'] as $tweet) {
          echo $tweet['text']."<br>";
      }

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
