<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    // Read from JSON file

    $data = file_get_contents(storage_path('data.json'));
    $data = json_decode($data, true);
    return response()->json($data);

    // return $data['name'] = "kofi";


    //Retrieve from Database

    // $person = Person::get();

    // return $person;


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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'dob' => 'required',
            'skills' => 'required',
            'contact' => 'required',

        ]);

        if ($validator->fails()) {
            return ['response' => 'Added Successfully', 'success' => 'false'];


        }

        $person = new Person();

        $person->name = $request->input('name');
        $person->dob = $request->input('dob');
        $person->skills = $request->input('skills');
        $person->contact = $request->input('contact');
        $person->save();

        return response()->json($person);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Retrieve from Database

        $validator = Validator::make($request->all(), [
            'dob' => 'required',
            'skills' => 'required',
            'contact' => 'required',

        ]);

        if ($validator->fails()) {
            return ['response' => 'Updated Successfully', 'success' => 'false'];


        }

        $person = Person::find($id);

        $person->name = $request->input('name');
        $person->dob = $request->input('dob');
        $person->skills = $request->input('skills');
        $person->contact = $request->input('contact');
        $person->save();

        return response()->json($person);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);

        $person->delete();

        return ['response' => 'Item deleted', 'success' => 'true'];
    }
}
