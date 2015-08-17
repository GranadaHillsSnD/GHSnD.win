<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SocialMedia;
use Carbon\Carbon;
use j7mbo\TwitterAPIPHP\TwitterAPIExchange;

class GetTweets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tweets:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets relevant tweets.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      //actual account
      $settings = array(
        'oauth_access_token'          => env('TWITTER_ACCESS_TOKEN'),
        'oauth_access_token_secret'   => env('TWITTER_ACCESS_TOKEN_SECRET'),
        'consumer_key'                => env('TWITTER_CONSUMER_KEY'),
        'consumer_secret'             => env('TWITTER_CONSUMER_SECRET')
      );
      $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
      $getField = 'screenname=ghchsnd';
      $requestMethod = 'GET';
      $twitter = new TwitterAPIExchange($settings);
      $content = $twitter->setGetfield($getField)
        ->buildOauth($url, $requestMethod)
        ->performRequest();
      $json = json_decode($content, true);
      var_dump ($json);
      foreach($json as $tweet_info) {
          $tweet = $tweet_info['text'];
          $datetime_posted = $tweet_info['created_at'];
          $date = explode(' ', $datetime_posted);
          $month = date('m', strtotime($date[1]));
          $day = $date[2];
          $year = $date[5];
          $time = $date[3];
          $datetime = Carbon::createFromFormat('Y-m-d H:i:s', $year."-".$month."-".$day." ".$time, 'UTC');
          $datetime = $datetime->setTimezone('America/Los_Angeles');
          $username = $tweet_info['user']['screen_name'];
          $profile_img = $tweet_info['user']['profile_image_url'];
          $link = $imgUrl = $resize = 'N/A';
          $height = $width = -1;
          if(isset($tweet_info['entities']['media'][0]['expanded_url'])) {
            $link = $tweet_info['entities']['media'][0]['expanded_url'];
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
          if ($username != 'ghchsnd' || SocialMedia::where('tweet', $tweet)->exists()) {
            echo "This post already exists";
          }
          else{
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
            $newTweet->source = 'Admin-Twitter';
            $newTweet->approved = 'Approved';
            $newTweet->approver_id = -1;
            $newTweet->datetime_posted = $datetime;
            $newTweet->save();
            echo "Saved!";
          }
      }

      //hashtag
      $settings = array(
        'oauth_access_token'          => env('TWITTER_ACCESS_TOKEN'),
        'oauth_access_token_secret'   => env('TWITTER_ACCESS_TOKEN_SECRET'),
        'consumer_key'                => env('TWITTER_CONSUMER_KEY'),
        'consumer_secret'             => env('TWITTER_CONSUMER_SECRET')
      );
      $url = 'https://api.twitter.com/1.1/search/tweets.json';
      $getField = 'q=%23ghsnd&result_type=recent';
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
          $datetime = $datetime->setTimezone('America/Los_Angeles');
          $username = $tweet_info['user']['screen_name'];
          $profile_img = $tweet_info['user']['profile_image_url'];
          $link = $imgUrl = $resize = 'N/A';
          $height = $width = -1;
          if(isset($tweet_info['entities']['media'][0]['expanded_url'])) {
            $link = $tweet_info['entities']['media'][0]['expanded_url'];
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
          if (SocialMedia::where('tweet', $tweet)->exists()) {
            echo "This post already exists";
          }
          else{
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
            $newTweet->datetime_posted = $datetime;
            $newTweet->save();
            echo "Saved!";
          }
      }
      echo "FINISHED";
    } //end handle()
}
