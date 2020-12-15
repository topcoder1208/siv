<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    public function index()
    {
        return view('admin.test.index');
    }
}
