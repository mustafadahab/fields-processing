<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tractor;


class tractorsController extends Controller
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
    public function create()
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
        ]);
        $tractor = new Tractor();
        $tractor->name = $request['name'];
        $message = 'There was an error';
        if ($tractor->save()) {
            $message = 'Tractor successfully created!';
        }
        return redirect()->route('add-tractor')->with(['message' => $message]);
    }

   
}
