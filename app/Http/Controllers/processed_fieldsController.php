<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use App\Tractor;
use App\Processed_field;

class processed_fieldsController extends Controller
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
$fields_list=Field::all();
$tractor_list= Tractor::all();
return view('new-processing-field',  compact('fields_list','tractor_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields_list=Field::find($request['field']);
        $user = auth()->user();

        $this->validate($request, [
            'tractor' => 'required',
            'field' => 'required',
            'entered_date' => 'required',
            'number_of_tractors' => 'required',
            'processed_area' => 'required|lte:'.$fields_list->area,
        ]);
        $tractor = new Processed_field();
        $tractor->tractor_id = $request['tractor'];
        $tractor->field_id = $request['field'];
        $tractor->user_id = $user->id;
        $tractor->added_on = $request['entered_date'];
        $tractor->no_of_tractors = $request['number_of_tractors'];
        $tractor->processed_area = $request['processed_area'];
        $message = 'There was an error';
        if ($tractor->save()) {
            $message = 'Field has been proceeded !';
        }
        return redirect()->route('paf-create')->with(['message' => $message]);
    }


    public function destroy($id)
    {
        $processed_field = Processed_field::where('id', $id)->first();
        if (auth()->user()->id != $processed_field->user_id) {
            return redirect()->back();
        }
        $processed_field->delete();
        return redirect()->route('display-reports')->with(['message' => 'Successfully deleted!']);
    }
}
