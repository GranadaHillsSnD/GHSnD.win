<?php

namespace App\Console\Commands;

use App\SocialMedia;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GetInstagrams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets all relevant instagrams.';

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
		$url ='https://api.instagram.com/v1/users/self/media/recent/?access_token='.env('INSTAGRAM_ACCESS_TOKEN');
		$content = file_get_contents($url);
		$json = json_decode($content, true);
		foreach($json['data'] as $images) {
          $imgUrl = $images['images']['standard_resolution']['url'];
          $description = $images['caption']['text'];
          $datetime_posted = $images['caption']['created_time'];
          $datetime_posted = Carbon::createFromTimestamp($datetime_posted)->toDateTimeString();
          $username = $images['caption']['from']['username'];
          $profilePic = $images['caption']['from']['profile_picture'];
          $link = $images['link'];
          if (SocialMedia::where('caption', $description)->exists()) {
            echo "This post already exists";
          }
          else{
            $insta = new SocialMedia;
            $insta->username = $username;
            $insta->profile_pic_url = $profilePic;
            $insta->tweet = 'N/A';
            $insta->caption = $description;
            $insta->imgUrl = $imgUrl;
            $insta->message = 'N/A';
            $insta->source = 'Admin-Insta';
            $insta->link = $link;
            $insta->width = 0;
            $insta->height = 0;
            $insta->resize = 'fit';
            $insta->approved = 'Approved';
            $insta->approver_id = -1;
            $insta->datetime_posted = $datetime_posted;
            $insta->save();
            echo "Saved!";
          }
        }

		  $tag = 'ghsnd';
		  $url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.env('INSTAGRAM_CLIENT_ID');
		  $content = file_get_contents($url);
		  $json = json_decode($content, true);
		  foreach($json['data'] as $images) {
			  $imgUrl = $images['images']['standard_resolution']['url'];
			  $description = $images['caption']['text'];
			  $datetime_posted = $images['caption']['created_time'];
			  $datetime_posted = Carbon::createFromTimestamp($datetime_posted)->toDateTimeString();
			  $username = $images['caption']['from']['username'];
			  $profilePic = $images['caption']['from']['profile_picture'];
			  $link = $images['link'];
			  if (SocialMedia::where('caption', $description)->exists()) {
				  echo "This post already exists";
			  }
			  else {
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
		echo "FINISHED";
    } //end handle
}
