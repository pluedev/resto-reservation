<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\Admin;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }
}
