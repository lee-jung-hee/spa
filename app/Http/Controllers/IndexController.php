<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        // dd(Auth::check());

        return inertia(
            'Index/Index',
            [
                'message' => 'Hello from laravel'
            ]
        );
    }
    public function show()
    {
        return inertia('Index/Show');
    }
}

// Listing::make(['office_name' => '북조선오피스', 'beds' => 2, 'baths' =>2, 'area' => 100, 'city' => '평양', 'street' => 'Tinker st', 'street_nr' => 20, 'code' => 'TS', 'price' => 200_000]);