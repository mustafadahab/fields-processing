@extends('layouts.master')

@section('title')
    Processing A New Field
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-6">
            <h3>Processing A New Field</h3>
            <form action="{{ route('store.paf') }}" method="post">


                <div class="form-group">
                    <label for="tractor">Select Tractor</label>
                    <select class="form-control" id="tractor" name="tractor" >
                        @foreach ($tractor_list as $tractor)
                            <option value="{{$tractor->id}}">{{$tractor->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group ">
                    <label for="field">Select Field</label>
                    <select class="form-control" id="field" name="field" >
                        @foreach ($fields_list as $field)
                            <option value="{{$field->id}}">{{$field->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group {{ $errors->has('entered_date') ? 'has-error' : '' }}">
                    <label for="entered_date">Date</label>
                    <input class="form-control" type="date" name="entered_date" id="entered_date">
                </div>
                <div class="form-group {{ $errors->has('number_of_tractors') ? 'has-error' : '' }}">
                    <label for="number_of_tractors">Number of Tractors</label>
                    <input class="form-control" type="number" name="number_of_tractors" value="{{ Request::old('number_of_tractors') }}" id="number_of_tractors">
                </div>

                <div class="form-group {{ $errors->has('processed_area') ? 'has-error' : '' }}">
                    <label for="entered_date">Processed Area</label>
                    <input class="form-control" type="text" name="processed_area" value="{{ Request::old('processed_area') }}" id="processed_area">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

    </div>
@endsection
