@extends('template.main')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-family: serif">Notes</h1>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-... (tambahkan integrity)" crossorigin="anonymous" />
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @php
                $user = App\Models\ModelCatatan::where('nik', Auth::user()->nik)->first(); // Mengambil pengguna berdasarkan NIK
            @endphp
            @if ($user)
                <textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control" readonly>{{$data->catatan}}</textarea>
            @else
                <p>Belum ada catatan untuk pengguna ini.</p>
            @endif
        </div>
    </div>
</div>
@endsection
