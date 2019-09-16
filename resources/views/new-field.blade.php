@extends('layouts.master')

@section('title')
    Add New Field
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-6">
            <h3>Add New Field</h3>
            <form action="{{ route('field.create') }}" method="post">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Field Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ Request::old('name') }}">
                </div>
                <div class="form-group {{ $errors->has('type_of_crops') ? 'has-error' : '' }}">
                    <label for="type_of_crops">Type of crops</label>
                    <input class="form-control" type="text" name="type_of_crops" id="type_of_crops" value="{{ Request::old('type_of_crops') }}">
                </div>
                <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                    <label for="area">Area</label>
                    <input class="form-control" type="text" name="area" id="area" value="{{ Request::old('area') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

    </div>
@endsection
