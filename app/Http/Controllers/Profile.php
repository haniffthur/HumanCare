<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profile extends Controller
{
    public function formProfile()
    {
        $data=[
            'title' => 'HumanCare|MyApp',
            'active'=> 'Profile',
        ];
        return view('auth.profile',$data);
    }
}

