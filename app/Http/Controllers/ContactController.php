<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required'

            ]);

    	$contact = new Contact();

    	$contact->name = $request->input('name');
    	$contact->email = $request->input('email');
    	$contact->message = $request->input('message');

        $contact->save();

        Mail::to('journalist@example.com')->send(new SendEmail());

    	return redirect('/')->with('success', 'Message sent successfully');
    }

    // public function sendmail(){
    //     Mail::to('journalist@example.com')->send(new SendEmail());

    //         return redirect('/')->with('success', 'Message sent successfully');
    // }


}
