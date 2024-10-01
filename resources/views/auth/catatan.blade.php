@extends('template.main')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-family: 'Arial', sans-serif; font-weight: bold;">Catat perjalanan harian kamu di sini :)</h1>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-... (tambahkan integrity)" crossorigin="anonymous" />
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Catatan
                <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus-circle"></i> Tambah Data</button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Suhu</th>
                            <th>Catatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($catatan as $row)
                            <tr>
                                <td width="5%">{{$no++}}</td>
                                <td>{{$row->nik}}</td>
                                <td>{{$row->tanggal}}</td>
                                <td>{{$row->waktu}}</td>
                                <td>{{$row->lokasi}}</td>
                                <td>{{$row->suhu}}&deg;C</td>
                                <td><a href="/isiCatatan/{{$row->id}}" class="btn btn-info btn-sm">Lihat Catatan</a></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Aksi">
                                        <form action="{{route('catatan.delete',$row->id)}}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{$row->id}}" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($catatan as $row)
    <div class="modal fade" id="editModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('catatan.update', ['id' => $row->id]) }}" method="POST"> 
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" aria-describedby="nik" name="nik" value="{{ Auth::user()->nik }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $row->tanggal }}">
                        </div>

                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <input type="time" class="form-control" id="waktu" name="waktu" value="{{ $row->waktu }}">
                        </div>

                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $row->lokasi }}">
                        </div>

                        <div class="form-group">
                            <label for="suhu">Suhu</label>
                            <input type="text" class="form-control" id="suhu" name="suhu" value="{{ $row->suhu }}">
                        </div>

                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea name="catatan" id="catatan" cols="30" rows="5" class="form-control">{{ $row->catatan }}</textarea>
                        </div>

                        <div class="modal-footer">  
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-secondary" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Modal Tambah Data -->

<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('catatan/save') }}" method="POST"> 
                    @csrf
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" aria-describedby="nik" name="nik" value="{{ Auth::user()->nik }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>

                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="time" class="form-control" id="waktu" name="waktu">
                    </div>

                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                    </div>

                    <div class="form-group">
                        <label for="suhu">Suhu</label>
                        <input type="text" class="form-control" id="suhu" name="suhu">
                    </div>

                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea name="catatan" id="catatan" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-secondary" type="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Catatan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="detail_nik">NIK</label>
                    <input type="text" class="form-control" id="detail_nik" name="detail_nik" value="{{ $row->nik }}" readonly>
                </div>
                <div class="form-group">
                    <label for="detail_tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="detail_tanggal" name="detail_tanggal" value="{{ $row->tanggal }}" readonly>
                </div>
                <div class="form-group">
                    <label for="detail_waktu">Waktu</label>
                    <input type="time" class="form-control" id="detail_waktu" name="detail_waktu" value="{{ $row->waktu }}" readonly>
                </div>
                <div class="form-group">
                    <label for="detail_lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="detail_lokasi" name="detail_lokasi" value="{{ $row->lokasi }}" readonly>
                </div>
                <div class="form-group">
                    <label for="detail_suhu">Suhu</label>
                    <input type="text" class="form-control" id="detail_suhu" name="detail_suhu" value="{{ $row->suhu }}" readonly>
                </div>
                <div class="form-group">
                    <label for="detail_catatan">Catatan</label>
                    <textarea class="form-control" id="detail_catatan" name="detail_catatan" rows="5" readonly>{{ $row->catatan }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection
