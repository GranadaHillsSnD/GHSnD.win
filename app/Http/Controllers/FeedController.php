<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Route;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FeedController extends Controller
{
    public function showLatestFeed() {
      $social_media = DB::table('social_media')->where('approved', 'Approved')->orderBy('datetime_posted', 'desc')->paginate(10);
      return view('home', ['soc_med' => $social_media]);
    }

    public function showTeamUpdates() {
      $social_media = DB::table('social_media')->where('source', 'Admin-Twitter')->orWhere('source', 'Admin-Insta')->orWhere('source', 'Admin-Post')->orderBy('datetime_posted', 'desc')->paginate(10);
      return view('home', ['soc_med' => $social_media]);
    }
    public function showAbout() {
      return view('about', ['route' => '/about']);
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
