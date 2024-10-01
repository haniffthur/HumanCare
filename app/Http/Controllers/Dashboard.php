<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'HumanCare| Myapp',
            'active' => 'dashboard'
        ];
        return view('auth.index',$data);
    }
}
