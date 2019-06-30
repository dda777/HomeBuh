<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneratorController extends Controller
{
    public function index()
    {
        return view('vendor.laravel-admin.generator');
    }
}
