<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class WelcomeController extends Controller
{
   
    public function index()
    {
            $items = Item::paginate(10);
            
            return view('welcome', [
                'items' => $items,
            ]);
    }
}