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
                                <li class="breadcrumb-item"><a href="">kewps23</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps23">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Kenyataan Tawaran Tender Pelupusan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">Agensi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kementerian" value="Perbadanan Labuan">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Tender</label>
                            <input type="text" name="no_tender" class="form-control">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Nama Bank</label>
                            <input type="text" value="Perbadanan Labuan" class="form-control" disabled>
                        </div>


                        <div class="col-6 mt-3">
                            <label for="">Tarikh Mula</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_mula" value="">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Tarikh Tamat</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_tamat" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Masa Mula</label>
                            <div class="input-group">
                                <input class="form-control" type="time" name="masa_mula" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Masa Tamat</label>
                            <div class="input-group">
                                <input class="form-control" type="time" name="masa_tamat" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Tempat</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tempat" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Tarikh Tutup</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_tutup" value="">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" name="alamat"
                                value="Jabatan Kewangan, Wisma Perbadanan Labuan, Peti Surat 81245,87022, Wilayah Persekutuan Labuan.">
                        </div>
                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    @foreach ($infokewps20 as $ik20)
                        <div class="row">
                            <div class="col-12 mt-2 mb-2">
                                <h3 class="mt-4">No Rujukan Infokewps20 : {{ $ik20->id }}</h3>
                            </div>
                            <div class="col-3">
                                <label for="">No Kod</label>
                                <select class="form-control mb-3" name="kewps3a_id[]">
                                    <option selected disabled hidden>Pilih</option>
                                    @foreach ($kewps3a as $k3)
                                        <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Perihal Stok</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text"
                                        value="{{ $ik20->kewps3a->perihal_stok }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti[]"
                                        value="{{ $ik20->kuantiti }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Keadaan Stok</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="harga_simpanan[]" value="">
                                </div>
                            </div>

                        </div>
                    @endforeach
                    {{-- <div class="mt-2">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahAsetK23()">Tambah Aset</a>
                    </div> --}}
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahAsetK23() {
            $("#info_kewps23").append(
                `      <div class="col-4">
                                <label for="">No Kod</label>
                                <select class="form-control mb-3" name="kewps3a_id[]">
                                    <option selected>Pilih</option>
                                    @foreach ($kewps3a as $k3)
                                        <option value="{{ $k3->id }}">{{ $k3->nama_stor }} -
                                            {{ $k3->perihal_stok }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti[]" value="">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Keadaan Stok</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="harga_simpanan[]" value="">
                                </div>
                            </div>
                `
            )
        }
    </script>
@endsection
