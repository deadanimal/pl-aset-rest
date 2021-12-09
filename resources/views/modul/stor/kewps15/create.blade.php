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
                                <li class="breadcrumb-item"><a href="">kewps15</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps15">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pelarasan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <label for="">Verifikasi Stor</label>
                            <select class="form-control mb-3" name="infokewps10_id">
                                <option selected>Pilih</option>
                                @foreach ($infokewps10 as $k10)
                                    <option value="{{ $k10->id }}">{{ $k10->id }} -
                                        {{ $k10->kewps10->kementerian }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <h3>ASET</h3>
                        </div>
                    </div>
                    <div class="row" id="asetk15">
                        <div class="col-3 mt-3">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3a)
                                    <option value="{{ $k3a->id }}">{{ $k3a->id }} -
                                        {{ $k3a->nama_stor }} - {{ $k3a->perihal_stok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kuantiti Fizikal</label>
                            <input class="form-control" type="text" name="kuantiti_fizikal[]">
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Justifikasi</label>
                            <input class="form-control" type="text" name="justifikasi[]">
                        </div>
                    </div>
                    <a class="btn btn-sm btn-primary text-white mt-3" onclick="tambahk15()">Tambah Aset</a>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class=" mt-5">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahk15() {
            $("#asetk15").append(
                `   <div class="col-3 mt-3">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3a)
                                    <option value="{{ $k3a->id }}">{{ $k3a->id }} -
                                        {{ $k3a->nama_stor }} - {{ $k3a->perihal_stok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kuantiti Fizikal</label>
                            <input class="form-control" type="text" name="kuantiti_fizikal[]">
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Justifikasi</label>
                            <input class="form-control" type="text" name="justifikasi[]">
                        </div> 
                `
            )
        }
    </script>
@endsection
