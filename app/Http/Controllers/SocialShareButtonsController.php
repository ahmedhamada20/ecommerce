<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jorenvh\Share\ShareFacade;

class SocialShareButtonsController extends Controller
{
    public function ShareWidget()
    {
        $shareComponent = ShareFacade::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();
        
        return view('front.blog.show', compact('shareComponent'));
    }
}
