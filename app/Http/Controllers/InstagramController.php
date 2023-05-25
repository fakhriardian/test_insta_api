<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class InstagramController extends Controller
{
    public function posts()
    {
        // Retrieve posts using the access token
        // fetch data from the Instagram API
        $accessToken = env('INSTAGRAM_ACCESS_TOKEN');; // Replace with actual access token

        $client = Http::withToken($accessToken)->baseUrl('https://graph.instagram.com/');

        $response = $client->get('me/media', [
            'fields' => 'id,caption,media_type,media_url,username,timestamp,children{id,media_url}'
        ]);
        
        $posts = $response->json()['data'];
    
        return view('instagram', compact('posts',));
    }
}
