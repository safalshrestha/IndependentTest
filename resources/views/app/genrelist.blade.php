@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h2>Choose a Genre:</h2>
                <hr>
                <ul class="list-unstyled">
                @foreach ($genrelist['genres'] as $genre)
                    <!-- <li> <a href="/movies/{{ $genre['id'] }}/1"> {{  $genre['name'] }} </a> </li> -->
                    <li> <a href="#" class="load-movie-list" data-genre = "{{ $genre['id'] }}"> {{  $genre['name'] }} </a> </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
