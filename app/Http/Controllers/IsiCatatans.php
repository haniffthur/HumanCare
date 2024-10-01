<?php

namespace App\Http\Controllers;
use App\Models\ModelCatatan;
use Illuminate\Http\Request;

class IsiCatatans extends Controller
{
    public function isiCatatan($id)
    {

        $data = [
            'title' => 'HumanCare|Myapp',
            'active'=>'IsiCatatan',
            'data' => ModelCatatan::where('id', $id)->first()
        ];
        return view ('auth.isiCatatan', $data);
    }
}
