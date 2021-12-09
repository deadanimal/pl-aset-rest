@extends('layouts.base_stor') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">kewps7</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps7">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Senarai Stok Bertarikh Luput</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <input class="form-control form-control-sm" type="hidden" name="status" value="DIPOHON">
                        <input class="form-control form-control-sm" type="hidden" name="pemohon_id"
                            value="{{ Auth::user()->id }}">
                        <div class="col-6">
                            <label for="">Nama Stor Pemesan</label>
                            <input class="form-control mb-3" type="text" name="nama_stor_pemesan" value="">
                        </div>
                        <div class="col-6">
                            <label for="">Alamat Stor Pemesan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="alamat_stor_pemesan" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->id }} - {{ $k3->perihal_stok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti Dipohon</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_dimohon" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Catatan Pemohon</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan_pemohon" value="">
                            </div>
                        </div>


                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
