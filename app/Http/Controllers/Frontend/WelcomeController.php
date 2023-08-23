<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        $silogs = Category::where('name', 'Silog meals')->first();
        return view('welcome', compact('silogs'));
    }
}
