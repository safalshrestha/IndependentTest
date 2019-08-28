@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h2>Choose a Movie to View Detail</h2>
                <hr>
                <ul class="list-unstyled">
                @foreach ($movielist['results'] as $movie)
                    <!-- <li> <a href="/moviedetail/{{ $movie['id'] }}"> {{  $movie['title'] }} </a> </li> -->
                    <li> <a href="" class='load-movie-detail' data-movieid = "{{ $movie['id'] }}"> {{  $movie['title'] }} </a> </li>
                @endforeach
                </ul>
                <ul class="pagination justify-content-center">
                    @if ($movielist['page'] == 1)
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <div class=" mx-4"><li class="page-item"><a class="page-link">{{ $movielist['page'] }}</a></li> </div>
                        <li class="page-item">
                            <!-- <a class="page-link" href="{{ $movielist['page'] +1  }}">Next</a> -->
                            <a class="page-link load-movie-page" data-moviepage="{{ $movielist['page'] +1  }}">Next</a>
                        </li>
                    @elseif ($movielist['page'] > 1 && $movielist['page'] < $movielist['total_pages'])
                        <li class="page-item">
                            <!-- <a class="page-link" href="{{ $movielist['page'] -1  }}" tabindex="-1">Previous</a> -->
                            <a class="page-link load-movie-page" data-moviepage="{{ $movielist['page'] -1  }}" tabindex="-1">Next</a>
                        </li>
                        <div class=" mx-4"><li class="page-item"><a class="page-link">{{ $movielist['page'] }}</a></li> </div>
                        <li class="page-item">
                            <!-- <a class="page-link" href="{{ $movielist['page'] +1  }}">Next</a> -->
                            <a class="page-link load-movie-page" data-moviepage="{{ $movielist['page'] +1  }}">Next</a>
                        </li>
                    @elseif ($movielist['page'] == $movielist['total_pages'])
                        <li class="page-item">
                            <!-- <a class="page-link" href="{{ $movielist['page'] -1  }}" tabindex="-1">Previous</a> -->
                            <a class="page-link load-movie-page" data-moviepage="{{ $movielist['page'] -1  }}" tabindex="-1">Next</a>
                        </li>
                        <div class=" mx-4"><li class="page-item"><a class="page-link">{{ $movielist['page'] }}</a></li> </div>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
