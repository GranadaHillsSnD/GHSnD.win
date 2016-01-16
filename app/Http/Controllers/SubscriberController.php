<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribers;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
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

    public function unsubscribe($unsubscribe_code) {
      if(!$unsubscribe_code) {
        throw new InvalidConfirmationCodeException;
      }

      $subscriber = Subscribers::where('unsubscribe', $unsubscribe_code)->first();

      if (!$subscriber) {
        throw new InvalidConfirmationCodeException;
      }

      $subscriber->confirmed = 0;
      $subscriber->code = null;
      $subscriber->save();

      return redirect('/')->with('email', 'Successfully unsubscribed from Speech & Debate news!');
    }

    public function store(Request $request)
    {
      if(Subscribers::where('email', $request->input('email'))->exists()) {
        $request->session()->flash('email', 'This email is already subscribed');
        return redirect('/');
      }
      else {
        $code = str_random(30);
        while(Subscribers::where('code', $code)->exists()) {
          $code = str_random(30);
        }
        $unsubscribe = str_random(45);
        while(Subscribers::where('unsubscribe', $unsubscribe)->exists()) {
          $unsubscribe = str_random(45);
        }
        $subscriber = new Subscribers;
        $subscriber->email = $request->input('email');
        $subscriber->code = $code;
        $subscriber->unsubscribe = $unsubscribe;

        Mail::send('email.verify', ['code' => $code], function($message) use($subscriber) {
          $message->from('team@ghsnd.win', 'Granada Hills Speech & Debate');
          $message->subject('Welcome to GHSnD!');
          $message->to($subscriber->email);
        });

        $subscriber->save();

        $request->session()->flash('email', "Thanks for subscribing");
        return redirect('/');
      }
    }

    public function confirm($confirmation_code) {
      if(!$confirmation_code) {
        throw new InvalidConfirmationCodeException;
      }

      $subscriber = Subscribers::where('code', $confirmation_code)->first();

      if (!$subscriber) {
        throw new InvalidConfirmationCodeException;
      }

      $subscriber->confirmed = 1;
      $subscriber->code = null;
      $subscriber->save();

      return redirect('/')->with('email', 'Successfully confirmed email!');
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
