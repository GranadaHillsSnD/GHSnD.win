<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Calendar;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Goutte;
use App\CalendarEvents;

function sanitize($str) {
  $str = str_replace(chr(194)," ", $str);
  $str = preg_replace('/\s+/', ' ', $str);
  return $str;
}
class CalendarController extends Controller
{
    public function getCalendarEvents() {
      $client = new Client();
      $crawler = $client->request('GET', 'http://trivalleysite.yolasite.com/calendar.php');
      $status_code = $client->getResponse()->getStatus();
      if($status_code==200) {
          echo '200 OK<br>';
      }
      $crawler->filter('table')->each(function ($node) {
        $count = 0;
        $node->filter('tr')->each(function ($node1) {
            $date = $node1->filter('td')->text();
            $title = $node1->filter('td')->nextAll()->first()->text();
            echo sanitize($title)."<br>";
            $links = $node1->filter('td')->nextAll()->first()->filter('a')->each(function ($link) {
              return $link->attr('href');
            });
            echo "<pre>";
            var_dump($links);
            echo "</pre>";
            $location = $node1->filter('td')->nextAll()->last()->text();
        });
      });
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $calendarEvents = DB::table('calendar_events')->where('start','>=', \Carbon\Carbon::today())->orderBy('start', 'asc')->get();
      return view('calendar', ['calendarEvents' => $calendarEvents]);
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
      $event = new CalendarEvents;
      $event->title = $request->input('title');
      if($request->input('all_day') != 1) {
        $event->all_day = 0;
        $date_start = $request->input('start-date')." ".$request->input('start-time');
        $event->start = $date_start;
        $date_end = $request->input('end-date')." ".$request->input('end-time');
        $event->end = $date_end;
      }
      else {
        $event->all_day = $request->input('all_day');
        $date_start = $request->input('start-date')." 00:00:00";
        $event->start = $date_start;
        $date_end = $request->input('end-date')." 00:00:00";
        $event->end = $date_end;
      }
      $event->save();
      $request->session()->flash('added', 'Event Added.');
      return view('auth.calendar');
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
