<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FeedController extends Controller
{
    public function showLatestFeed() {
      $social_media = DB::table('social_media')->where('approved', 'Approved')->orderBy('datetime_posted', 'desc')->paginate(10);
      $first = new Carbon('first day of this month');
      $date = substr($first, 0, 10);
      $first = Carbon::createFromFormat('Y-m-d', $date)->dayOfWeek;
      $last = new Carbon ('last day of this month');
      $date = substr($last, 0, 10);
      $last = Carbon::createFromFormat('Y-m-d', $date)->dayOfWeek;
      $numDays = Carbon::today()->daysInMonth;
      $numDays2 = $numDays - ((7 - $first) + $last + 1); //did some math here
      $numWeeks = (int)($numDays2/7);
      $carbon = [
        'first' => $first,
        'last' => $last,
        'numWeeks' => $numWeeks,
        'numDays' => $numDays,
        'today' => (int)substr(substr(Carbon::today(), 0, 10), 8, 5)
      ];

      return view('home', ['soc_med' => $social_media, 'carbon' => $carbon]);
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
