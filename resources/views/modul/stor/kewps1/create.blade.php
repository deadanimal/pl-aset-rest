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
                                <li class="breadcrumb-item"><a href="">kewps1</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps1">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Penentuan Kumpulan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">Nama Pembekal</label>
                            <input class="form-control" type="text" name="nama_pembekal" value="Perbadanan Labuan">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Alamat Pembekal</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_pembekal"
                                    value="Peti Surat 81245, Wilayah Persekutuan Labuan">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jenis Penerimaan</label>
                            <div class="input-group">
                                <select name="jenis_penerimaan" class="form-control">
                                    <option selected>Pilih...</option>
                                    <option value="Dikira">Dikira</option>
                                    <option value="Diperiksa">Diperiksa</option>
                                    <option value="Diuji">Diuji</option>
                                    <option value="Ditimbang">Ditimbang</option>
                                    <option value="Diukur">Diukur</option>
                                    <option value="Disukat">Disukat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="mt-4">Pesanan Kerajaan (PK)/ Kontrak/ Surat Kelulusan</h5>
                        </div>
                        <div class="col-6">
                            <label for="">No Rujukan PK</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nombor_rujukan_pk" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_pk" value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="mt-4">Nota Hantaran</h5>
                        </div>
                        <div class="col-4">
                            <label for="">No DO</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nombor_do" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh DO</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_do" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Maklumat Pengangkutan</label>
                            <div class="input-group">
                                <select name="maklumat_pengangkutan" class="form-control">
                                    <option selected>Pilih...</option>
                                    <option value="Lori">Lori</option>
                                    <option value="Kapal Terbang">Kapal Terbang</option>
                                    <option value="Kapal Laut">Kapal Laut</option>
                                    <option value="Perkhidmatan kourier">Perkhidmatan kourier</option>
                                </select>

                            </div>
                        </div>
                        <input class="form-control form-control-sm" type="hidden" name="status" value="DERAF">

                        <div class="row" id="aset_create">
                            <div class="col-12">
                                <h3 class="ml-3 mt-5">Aset</h3>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <a class="btn btn-sm btn-primary text-white" onclick="tambahAset()">Tambah Aset</a>
                        </div>


                        <div class="col-12 mt-7">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahAset() {
            $("#aset_create").append(
                `
                <div class="row mx-3">  
                    <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">No Kod</label>
                            <input class="form-control" type="text" name="no_kod[]" value="">
                    </div>    
                    <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Perihal Barang</label>
                            <input class="form-control" type="text" name="perihal_barang[]" value="{{ old('perihal_barang[]') }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Unit Pengukuran</label>
                             <select name="unit_pengukuran[]" class="form-control">
                                    <option selected>Pilih...</option>
                                    <option value="Unit">Unit</option>
                                    <option value="Kotak">Kotak</option>
                                    <option value="Rim">Rim</option>
                                    <option value="Butang">Butang</option>
                                    <option value="Buah">Buah</option>
                                    <option value="Bilah">Bilah</option>
                                    <option value="Paket">Paket</option>
                                    <option value="Keping">Keping</option>
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Kuantiti Dipesan</label>
                            <input class="form-control" type="number" name="kuantiti_dipesan[]" value="{{ old('kuantiti_dipesan[]') }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Kuantiti DO</label>
                            <input class="form-control" type="number" name="kuantiti_do[]" value="{{ old('kuantiti_do[]') }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Kuantiti Diterima</label>
                            <input class="form-control" type="number" name="kuantiti_diterima[]" value="" id="kewps1_kuantiti_diterima[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Harga Seunit</label>
                            <div class="input-group">
                                <span class="input-group-text">RM</span>
                                <input class="form-control" type="number" step="0.01" name="harga_seunit[]" value="" id="kewps1_harga_seunit[]">
                            </div>
                        </div>
                        
                        <div class="col-8 mt-2">
                            <label for="" class="col-form-label ">Catatan</label>
                            <input class="form-control" type="text" name="catatan[]" value="{{ old('catatan[]') }}">
                        </div>
                </div>`
            )
        }

        // $(document).ready(function() {
        //     //setup before functions
        //     var typingTimer; //timer identifier
        //     var doneTypingInterval = 1000; //time in ms, 5 second for example
        //     var $input = $('#kewps1_harga_seunit[0]');

        //     //on keyup, start the countdown
        //     $input.on('keyup', function() {
        //         clearTimeout(typingTimer);
        //         typingTimer = setTimeout(doneTyping, doneTypingInterval);
        //     });

        //     //on keydown, clear the countdown 
        //     $input.on('keydown', function() {
        //         clearTimeout(typingTimer);
        //     });

        //     //user is "finished typing," do something
        //     function doneTyping() {
        //         var satu = parseInt($('#kewps1_kuantiti_diterima[0]').val());
        //         var dua = parseInt($('#kewps1_harga_seunit[0]').val());

        //         var jumlah = satu * dua;
        //         $('#kewps1_jumlah[0]').val(jumlah);
        //     }

        // });
    </script>
@endsection
