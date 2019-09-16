<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Processed_field;


class reportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processed_fields= Processed_field::with('field','tractor')->get();

        return view('reports',  compact('processed_fields'));


    }
    /**
     * Filter .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $where="";

        if ($request->has('field_name')) {
            $processed_fields = DB::table('processed_fields')
                ->join('fields', 'fields.id', '=', 'processed_fields.field_id')
                ->join('tractors', 'tractors.id', '=', 'processed_fields.tractor_id')
                ->select('tractors.name  as tractor_name','processed_fields.id  as processed_fields_id','processed_fields.*','fields.*')
                ->where('fields.name', '=', $request->field_name)
                ->get();

            $filtered_by="Field Name : ".$request->field_name ;
            return view('filtered-reports',  compact('processed_fields','filtered_by'));
        }
        else if ($request->has('culture')) {
            $processed_fields = DB::table('processed_fields')
                ->join('fields', 'fields.id', '=', 'processed_fields.field_id')
                ->join('tractors', 'tractors.id', '=', 'processed_fields.tractor_id')
                ->select('tractors.name  as tractor_name','processed_fields.id  as processed_fields_id','processed_fields.*','fields.*')
                ->where('fields.type_of_crops', 'like', '%'.$request->culture.'%')
                ->get();

            $filtered_by="Culture : ".$request->culture;

            return view('filtered-reports',  compact('processed_fields','filtered_by'));
        }
        else if ($request->has('date')) {
            $processed_fields = DB::table('processed_fields')
                ->join('fields', 'fields.id', '=', 'processed_fields.field_id')
                ->join('tractors', 'tractors.id', '=', 'processed_fields.tractor_id')
                ->select('tractors.name  as tractor_name','processed_fields.id  as processed_fields_id','processed_fields.*','fields.*')
                ->where('processed_fields.added_on', '=', $request->date)
                ->get();

            $filtered_by="Date : ".$request->date;

            return view('filtered-reports',  compact('processed_fields','filtered_by'));
        }
        else{
            $processed_fields = DB::table('processed_fields')
                ->join('fields', 'fields.id', '=', 'processed_fields.field_id')
                ->join('tractors', 'tractors.id', '=', 'processed_fields.tractor_id')
                ->select('tractors.name  as tractor_name','processed_fields.id  as processed_fields_id','processed_fields.*','fields.*')
                ->get();

            $filtered_by="Reset";

            return view('filtered-reports',  compact('processed_fields','filtered_by'));

        }

    }


}
