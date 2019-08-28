@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <img src = images/logoonly.png width="300px"> <br>
            <h1> Your Movies DB </h1>
            <h2 class="font-italic"> All your movies in one place </h2>
            @guest
                <button class = "load-register btn btn-danger m-4"> Register Now </button>
                <button class = "load-login btn btn-warning m-4"> Login Now </button>
            @else
            <div class="card">
                <div class="card-body">
                    <h3> Welcome  {{ Auth::user()->name }} </h3>
                    <p> Lets Begin your Search </p>
                    <button id="load-genre" class = "btn btn-danger m-3"> Search by Genre </button>
                    <button id="load-search" class = "btn btn-warning m-3"> Search by Name </button>
                </div>
            </div>
            @endguest



        </div>
    </div>
</div>
@endsection
