<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PagesController extends Controller
{
    //
    var $apikey =  "8b33d72074a553accc4d688b433f805c";
    var $baseURL = "https://api.themoviedb.org/3/";
    var $apiGenreURL = "genre/movie/list?";
    var $apiDiscoverMovieURL = "discover/movie/";
    var $apiGetMovieURL = "movie/";
    var $apiSearchMovieURL = "search/movie";
    var $apiLanguage = "en-US";
    var $imageurl = "https://image.tmdb.org/t/p/w500/";
    var $imdburl = "https://www.imdb.com/title/";
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getGenre(){
        $client = new Client(['base_uri' => $this->baseURL]);

        $response = $client->request('GET', $this->apiGenreURL, [
            'query' => [
                'language' => $this->apiLanguage,
                'api_key' => $this->apikey
            ]
        ] );
        $statusCode = $response->getStatusCode();
        $genrelist = json_decode($response->getBody()->getContents(), true);
        //dd($genrelist);
        if (request()->ajax())
        {
            $sections = view('app.genrelist', compact('genrelist'))->renderSections();
            return $sections['content'];
            //return view('app.genrelist', compact('genrelist'));
        }

        return view('app.genrelist', compact('genrelist'));
    }

    public function getMovieList(Request $request, $genre = NULL, $pageno = NULL) {
        $client = new Client(['base_uri' => $this->baseURL]);
        //dd($pageno);
        if ($pageno == NULL) {
            //echo $request->input('pageno');
            $pageno = $request->input('pageno');
        }
        $response = $client->request('GET', $this->apiDiscoverMovieURL, [
            'query' => [
                'language' => $this->apiLanguage,
                'api_key' => $this->apikey,
                'page' => $pageno,
                'with_genres' => $genre
            ]
        ] );
        $statusCode = $response->getStatusCode();
        $movielist = json_decode($response->getBody()->getContents(), true);
        //dd($movielist);
        if (request()->ajax())
        {
            $sections = view('app.movielist', compact('movielist'))->renderSections();
            return $sections['content'];
            //return view('app.genrelist', compact('genrelist'));
        }
        return view('app.movielist', compact('movielist'));
    }

    public function getMovieDetail($movieid) {
        $client = new Client(['base_uri' => $this->baseURL]);

        $response = $client->request('GET', $this->apiGetMovieURL.$movieid, [
            'query' => [
                'language' => $this->apiLanguage,
                'api_key' => $this->apikey
            ]
        ] );
        $imageurl = $this->imageurl;
        $imdburl = $this->imdburl;
        $statusCode = $response->getStatusCode();
        $moviedetail = json_decode($response->getBody()->getContents(),true);
        if (request()->ajax())
        {
            $sections = view('app.moviedetail', compact('moviedetail','imageurl', 'imdburl'))->renderSections();
            return $sections['content'];
            //return view('app.genrelist', compact('genrelist'));
        }
        return view('app.moviedetail', compact('moviedetail', 'imageurl', 'imdburl'));
    }


    public function searchMovie(Request $request, $pageno = NULL) {
        $client = new Client(['base_uri' => $this->baseURL]);
        //dd($pageno);
        if ($pageno == NULL) {
            //echo $request->input('pageno');
            $pageno = $request->input('pageno');
            $query = $request->input('query');
        }
        if ($query == NULL) {
            $query = " ";
        }
        $response = $client->request('GET', $this->apiSearchMovieURL, [
            'query' => [
                'language' => $this->apiLanguage,
                'api_key' => $this->apikey,
                'page' => $pageno,
                'query' => $query
            ]
        ] );
        $statusCode = $response->getStatusCode();
        $movielist = json_decode($response->getBody()->getContents(), true);
        //dd($movielist);
        if (request()->ajax())
        {
            $sections = view('app.searchmovielist', compact('movielist'))->renderSections();
            return $sections['content'];
            //return view('app.genrelist', compact('genrelist'));
        }
        return view('app.searchmovielist', compact('movielist'));
    }
}
