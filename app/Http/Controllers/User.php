<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class User extends Controller
{
    public function index()
    {
        echo "ini adalah Admin";
    }
}
