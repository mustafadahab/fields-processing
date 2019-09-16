<?php

namespace App\Http\Controllers;
use App\Field;
use Illuminate\Http\Request;

class fieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:1000',
            'type_of_crops' => 'required',
            'area' => 'required',
        ]);
        $field = new Field();
        $field->name = $request['name'];
        $field->type_of_crops = $request['type_of_crops'];
        $field->area = $request['area'];
        $message = 'There was an error';
        if ($field->save()) {
            $message = 'Field successfully created!';
        }
        return redirect()->route('add-field')->with(['message' => $message]);
    }


}
