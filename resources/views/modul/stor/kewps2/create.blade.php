@extends('layouts.base_stor') @section('content')
    <div class="container">
        <form method="POST" action="/kewps2" enctype="multipart/form-data">
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header"
                    style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)                                                                                                                                                               ">
                    <h6 class="text-white">KEW.PS-2</h6>
                </div>
                </br>
                <div class="card-body pt-0">

                    <label for="">Tindakan</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="tindakan" value="">
                    </div>

                    <label for="">Borang BTB</label>
                    <select class="form-select mb-4" name="kewps1_id" id="kewps2_select">
                        <option selected>Pilih</option>
                        @foreach ($kewps1 as $k1)
                            <option value="{{ $k1->id }}">{{ $k1->nama_pembekal }}</option>
                        @endforeach
                    </select>


                    <div id="info_kewps2_create"></div>

                    <a id="button_aset_diperiksa" class="btn btn-sm btn-primary text-white"
                        onclick="tambahAsetDiperiksa()">Tambah Aset</a>

                    <hr>

                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>

                </div>
            </div>



        </form>
    </div>

    <script>
        $(document).ready(function() {

            $("#kewps2_select").change(function() {
                var info1 = @json($infokewps1->toArray());

                $('.selectinfo')
                    .find('option')
                    .remove()
                    .end();

                info1.forEach(element => {
                    if (element.kewps1_id == this.value) {
                        $('.selectinfo').append($('<option>', {
                            value: element.id,
                            text: element.perihal_barang,
                        }));
                    }
                });

            });



        });

        function tambahAsetDiperiksa() {

            $("#info_kewps2_create").append(
                `<div class="row">
                        
                         <div class="col-3">
                        <label for="">Aset</label>
                        <div class="input-group">
                        <select class="form-select selectinfo mb-4" name="infokewps1_id[]">
                        <option selected>Pilih</option>
                        </select>
                        </div>
                        </div>
                        <div class="col-3">
                        <label for="">Kuantiti Ditolak</label>
                        <div class="input-group">
                            <input class="form-control mb-3" type="text" name="kuantiti_ditolak[]" value="">
                        </div>
                        </div>
                        <div class="col-3">
                        <label for="">Kuantiti Kurang Lebih</label>
                        <div class="input-group">
                            <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih[]" value="">
                        </div>
                        </div>
                        <div class="col-3">
                        <label for="">Sebab penolakan</label>
                        <div class="input-group">
                            <input class="form-control mb-3" type="text" name="sebab_penolakan[]" value="">
                        </div>
                        </div>
                       
                      
                    </div>`
            )

        }
    </script>


@endsection
