@extends('layouts.master')

@section('title')
    Filtered Reports
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-12">
            <h1>Welcome To Farm Manager Reports</h1>

        </div>

    </div>
    <div class="table-responsive-md">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Field</th>
                <th scope="col">Culture</th>
                <th scope="col">Date</th>
                <th scope="col">Tractor Name</th>
                <th scope="col">Processed Area</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($processed_fields as $processed_field)
                <tr>
                    <th scope="row">{{ $processed_field->id }}</th>
                    <td>{{ $processed_field->field->name }}</td>
                    <td>{{ $processed_field->field->type_of_crops }}</td>
                    <td>{{ $processed_field->added_on }}</td>
                    <td>{{ $processed_field->tractor->name }}</td>
                    <td>
                        The area of the processed land is {{ $processed_field->processed_area }} out of {{ $processed_field->field->area }},
                        using {{ $processed_field->no_of_tractors }} Tractors
                    </td>
                    <td>
                    <td><?php  $user = auth()->user(); ?>

                        @if($user->id == $processed_field->user_id)
                            <a href="{{ route('paf.delete', ['id' => $processed_field->id]) }}" class="btn btn-danger">Delete</a>
                        @endif
                    </td>
                    </td>
                </tr>
            @endforeach


            </tbody>
            <tfoot>
            <tr>
                <td>Filter By</td>
                <td>
                    <form action="{{ route('filter') }}" method="post">
                        <div class="form-group {{ $errors->has('field_name') ? 'has-error' : '' }}">
                            <label for="field_name">Field Name</label>
                            <input class="form-control" type="text" name="field_name" id="field_name" value="{{ Request::old('field_name') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </td>
                <td>
                    <form action="{{ route('filter') }}" method="post">
                        <div class="form-group {{ $errors->has('culture') ? 'has-error' : '' }}">
                            <label for="culture">Culture</label>
                            <input class="form-control" type="text" name="culture" id="culture" value="{{ Request::old('culture') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </td>
                <td>
                    <form action="{{ route('filter') }}" method="post">
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label for="date">Date</label>
                            <input class="form-control" type="text" name="date" id="date" value="{{ Request::old('date') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </td>
                <td>
                    <form action="{{ route('filter') }}" method="post">
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label for="date">Reset Search</label>
                            <button type="submit" class="btn btn-primary">Reset</button>
                        </div>

                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </td>
                <td>

                </td>
            </tr>
            </tfoot>

        </table>
    </div>


@endsection
