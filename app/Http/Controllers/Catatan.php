<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelCatatan;

class Catatan extends Controller
{
    public function formCatatan()
    {
        $catatan = ModelCatatan::all();
        $data = [
            'title' => 'HumanCare| Myapp',
            'active' => 'catatan',
            'catatan'=> $catatan
        ];
        return view('auth.catatan',$data);
    }
    public function save(Request $request)
    {
        ModelCatatan::create($request->except(['_token', 'simpan']));
        return redirect()->to(url('catatan'));
    }
    public function delete($id)
    {
        ModelCatatan::destroy($id);
        return redirect()->to(url('catatan'))->with('dataDelete','Data Berhasil di hapus');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'HumanCare| Myapp',
            'active' => 'catatan',
            'catatan'=> ModelCatatan::find($id)
        ];
        return view('catatan.edit',$data);
    }
    public function update(Request $request, $id)
    {
        $catatan= ModelCatatan::find($id);
        $catatan->update($request->except(['_token','_method']));
        return redirect()->to(url('catatan'));
    }   
}