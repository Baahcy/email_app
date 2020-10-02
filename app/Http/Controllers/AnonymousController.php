<?php

namespace App\Http\Controllers;

use App\Anonymous;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AnonymousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('anonymous.index');
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
        $this->validate(
            $request,
            [
                'message' => 'required'

            ]
        );

        $anonymous = new Anonymous();

        $anonymous->message = $request->input('message');
        // dd($anonymous);

        $anonymous->save();

        Mail::to('cbaah123@gmail.com')->send(new TestMail());

        return redirect('/anonymous')->with('success', 'Anonymous Message sent successfully');
    }
}
