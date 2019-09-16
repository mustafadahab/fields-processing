@extends('layouts.master')

@section('title')
   Home
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-12">



            @if(Auth::check())
                <?php $user = auth()->user(); ?>
                <h1>Welcome {{$user->name}}To Farm Manager</h1>
                @else
                <h1>Welcome To Farm Manager</h1>
                @endif

        </div>

    </div>
@endsection
