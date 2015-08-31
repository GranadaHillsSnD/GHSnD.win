<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admins;
use App\SocialMedia;
use DB;
use App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(\Auth::check()) {
          $social_media = DB::table('social_media')->orderBy('datetime_posted', 'asc')->where('approved', 'Pending')->get();
          return view('auth.home', ['admin' => \Auth::user(), 'soc_media' => $social_media, 'pageHeader' => 'Pending Approval']);
        }
        else {
          return redirect('admin/login');
        }
    }

    public function showApproved() {
      if(\Auth::check()) {
        $social_media = DB::table('social_media')->orderBy('datetime_posted', 'desc')->where('approved', 'Approved')->get();
        return view('auth.home', ['admin' => \Auth::user(), 'soc_media' => $social_media, 'pageHeader' => 'Approved']);
      }
      else {
        return redirect('admin/login');
      }
    }

    public function showDenied() {
      if(\Auth::check()) {
        $social_media = DB::table('social_media')->orderBy('datetime_posted', 'desc')->where('approved', 'Denied')->get();
        return view('auth.home', ['admin' => \Auth::user(), 'soc_media' => $social_media, 'pageHeader' => 'Denied']);
      }
      else {
        return redirect('admin/login');
      }
    }
    public function addEvent()
    {
      if(\Auth::check()) {
        return view('auth.calendar');
      }
      else {
        return redirect('admin/login');
      }
    }

    public function addPost() {
      if(\Auth::check()) {
        return view('auth.post');
      }
      else {
        return redirect('admin/login');
      }
    }

    public function storePost(Request $request) {
      $post = new SocialMedia;
      $post->username = \Auth::user()->name;
      $post->profile_pic_url = 'http://ghsnd.win/assets/images/logofixed.png';
      $post->tweet = 'N/A';
      $post->caption = 'N/A';
      $post->imgUrl = 'N/A';
      $post->message = $request->input('content');
      $post->source = 'Admin-Post';
      $post->link = 'N/A';
      $post->width = 'N/A';
      $post->height = 'N/A';
      $post->resize = 'N/A';
      $post->approved = 'Approved';
      $post->approver_id = \Auth::user()->admin_id;
      $post->datetime_posted = \Carbon\Carbon::now();
      $post->save();
      $request->session()->flash('added-post', 'Post Added.');
      return view('auth.post');

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
