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
    var $apiLanguage = "en-US";

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
        $body = $response->getBody()->getContents();
        return $body;
    }

    public function getMovieList($genre = "NULL", $pageno = 'NULL') {
        $client = new Client(['base_uri' => $this->baseURL]);

        $response = $client->request('GET', $this->apiDiscoverMovieURL, [
            'query' => [
                'language' => $this->apiLanguage,
                'api_key' => $this->apikey,
                'page' => $pageno,
                'with_genres' => $genre
            ]
        ] );
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        return $body;
    }

    public function getMovieDetail($movieid) {
        $client = new Client(['base_uri' => $this->baseURL]);

        $response = $client->request('GET', $this->apiGetMovieURL.$movieid, [
            'query' => [
                'language' => $this->apiLanguage,
                'api_key' => $this->apikey
            ]
        ] );
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        return $body;
    }

}
