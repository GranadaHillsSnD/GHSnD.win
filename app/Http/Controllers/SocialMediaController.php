<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialMedia;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libraries\j7mbo\twitter_api_php\TwitterAPIExchange;

class SocialMediaController extends Controller
{

    public function getInstagrams() {
      $tag = 'catsofinstagram';
      $url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.env('INSTAGRAM_CLIENT_ID');
      $content = file_get_contents($url);
      $json = json_decode($content, true);
      // echo "<pre>";
      // var_dump($json);
      // echo "</pre>";
      foreach($json['data'] as $images) {
          $imgUrl = $images['images']['standard_resolution']['url'];
          $description = $images['caption']['text'];
          $datetime_posted = $images['caption']['created_time'];
          $datetime_posted = Carbon::createFromTimestamp($datetime_posted)->toDateTimeString()."<br>";
          $username = $images['caption']['from']['username']."<br>";
          $profilePic = $images['caption']['from']['profile_picture'];
          $link = $images['link'];
          $insta = new SocialMedia;
          $insta->username = $username;
          $insta->profile_pic_url = $profilePic;
          $insta->tweet = 'N/A';
          $insta->caption = $description;
          $insta->imgUrl = $imgUrl;
          $insta->message = 'N/A';
          $insta->source = 'Instagram';
          $insta->link = $link;
          $insta->width = 0;
          $insta->height = 0;
          $insta->resize = 'fit';
          $insta->approved = 'Pending';
          $insta->approver_id = -1;
          $insta->datetime_posted = $datetime_posted;
          $insta->save();
          echo "Saved!";
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
      foreach($json['statuses'] as $tweet_info) {
          $tweet = $tweet_info['text'];
          $datetime_posted = $tweet_info['created_at'];
          $date = explode(' ', $datetime_posted);
          $month = date('m', strtotime($date[1]));
          $day = $date[2];
          $year = $date[5];
          $time = $date[3];
          $datetime = Carbon::createFromFormat('Y-m-d H:i:s', $year."-".$month."-".$day." ".$time, 'UTC');
          $datetime->setTimezone('America/Los_Angeles');
          $username = $tweet_info['user']['screen_name'];
          $profile_img = $tweet_info['user']['profile_image_url'];
          $link = $imgUrl = $resize = 'N/A';
          $height = $width = -1;
          if(isset($tweet_info['entities']['media'][0]['display_url'])) {
            $link = $tweet_info['entities']['media'][0]['display_url'];
          }
          if(isset($tweet_info['entities']['media'][0]['media_url_https'])) {
            $imgUrl = $tweet_info['entities']['media'][0]['media_url_https'];
          }
          if(isset($tweet_info['entities']['media'][0]['sizes']['large']['h'])) {
            $height = $tweet_info['entities']['media'][0]['sizes']['large']['h'];
          }
          if(isset($tweet_info['entities']['media'][0]['sizes']['large']['w'])) {
            $width = $tweet_info['entities']['media'][0]['sizes']['large']['w'];
          }
          if(isset($tweet_info['entities']['media'][0]['sizes']['large']['resize'])) {
            $resize = $tweet_info['entities']['media'][0]['sizes']['large']['resize'];
          }

          $newTweet = new SocialMedia;
          $newTweet->username = $username;
          $newTweet->profile_pic_url = $profile_img;
          $newTweet->tweet = $tweet;
          $newTweet->caption = 'N/A';
          $newTweet->message = 'N/A';
          $newTweet->imgUrl = $imgUrl;
          $newTweet->link = $link;
          $newTweet->width = $width;
          $newTweet->height = $height;
          $newTweet->source = 'Twitter';
          $newTweet->approved = 'Pending';
          $newTweet->approver_id = -1;
          $newTweet->datetime_posted = $datetime_posted;
          $newTweet->save();
          echo "Saved!";
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
