@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h2>Movie Detail:</h2>
                <div class="card justify-content-center">
                    <h4 class="card-title mt-3">{{ $moviedetail['title'].' ('.substr($moviedetail['release_date'],0,4).')' }}</h4>

                    @if ($moviedetail['backdrop_path'] != "")
                    <img class="card-img-top" src="{{ $imageurl.$moviedetail['backdrop_path'] }}" alt="Poster">
                    @endif
                    <div class="card-body">
                        <strong>Genre: </Strong> <p>
                            @foreach ($moviedetail['genres'] as $genre)
                                <em> {{ $genre['name'] }}</em>
                                @if (!$loop->last)
                                ,
                                @endif

                            @endforeach
                        </p>
                        <p class="card-text font-weight-bold">Synopsis:<br>{{ $moviedetail['overview'] }}<br><em>- {{ $moviedetail['runtime'] }} min - </em></p>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Release Date:</strong><br> {{ $moviedetail['release_date'] }}</li>
                            <li class="list-group-item"><strong>Production Companies: </strong><br> @foreach ($moviedetail['production_companies'] as $p) {{ $p['name'] }} <br> @endforeach</li>
                            <li class="list-group-item"><strong>Original Language:</strong><br> {{ $moviedetail['original_language'] }}</li>
                            <li class="list-group-item"><strong>Spoken Languages</strong><br> @foreach ($moviedetail['spoken_languages'] as $s) {{ $s['name'] }}<br> @endforeach</li>
                            <li class="list-group-item"><strong>Rating:</strong><br> {{ $moviedetail['vote_average'].' ('.$moviedetail['vote_count'].')' }}</li>
                        </ul>
                        @if ($moviedetail['imdb_id'] != "")
                        <a href="{{ $imdburl.$moviedetail['imdb_id'] }}" class="btn btn-warning mt-4 float-left">Go to IMDB</a>
                        @endif
                        <!-- <a href="{{ url()->previous() }}" class="btn btn-primary mt-4 float-right">Go Back</a> -->
                        <a href="" class="btn btn-primary mt-4 float-right" id="load-mainpage">Go to Home</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
