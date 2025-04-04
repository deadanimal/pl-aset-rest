@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/kewpa15">kewpa15</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="create">
            <form method="POST" action="/kewpa15" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Pemeriksaan</h2>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">No Siri Pendaftaran</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="no_siri_pendaftaran" onchange="findSelectedKewpa3A()" required>
                                        <option value="" selected disabled hidden>Sila Pilih No Siri</option required>
                                        @foreach ($kewpa3a as $k3)
                                        <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Jenis</label>
                                <input class="form-control mb-3" type="text" value="" name="jenis" disabled>
                            </div>
                            <div class="col-4">
                                <label for="">Sub-Kategori</label>
                                <input class="form-control mb-3" type="text" value="" name="sub_kategori" disabled>
                            </div>
                            <div class="col-4">
                                <label for="">Keterangan Aset Alih</label>
                                <input class="form-control mb-3" type="text" value="" name="keterangan_aset_alih" disabled>
                            </div>
                            <div class="col-4">
                                <label for="">Lokasi</label>
                                <input class="form-control mb-3" type="text" value="" name="lokasi" disabled>
                            </div>
                        </div>

                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahInfo()">Tambah Info Penyelenggaraan</a>
                    </div>



                </div>
                <div id="info_kewpa15_create"></div>
        </div>
        </form>
    </div>

    </div>


    <script type="text/javascript">
        var list_no_siri = <?php echo $kewpa3a; ?>

        $(document).ready(function() {
            initiateDatatable();
            
        })

        document.addEventListener("DOMContentLoaded", function(){
            tambahInfo();
        });

        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewpa15/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/kewpa15";;
                }
            })
        }

        function tambahInfo() {

            $("#info_kewpa15_create").append(

                `
                <div class="card mt-4" id="basic-info">
                <div class="card-header">
                <div class="row">
                    <div class="col">
                    <h2 class="mb-0">Tambah Info Pemeriksaan</h2>
                    </div>
                    <div class="text-end mr-2">
                    <a class="align-self-end btn btn-sm btn-primary text-white" onclick="$(this).closest('.card').remove()">Buang</a>
                    </div>

                </div>
                </div>

                <div class="card-body pt-0">

                <br>
                <div class="row">
                <div class="col-4">
                    <label for="">Tarikh</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="date" name="tarikh[]" value="" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="">Jenis Penyelenggaraan</label>
                    <div class="input-group">
                    <select class="form-control mb-3" name="jenis_penyelenggaraan[]" required>
                                        <option value="" required required selected disabled hidden>Pilih Status Aset
                                        </option required>
                                        <option value="Penyelenggaraan Pencegahan">Penyelenggaraan Pencegahan</option>
                                        <option value="Penyelenggaran Pembaikan">Penyelenggaran Pembaikan</option>
                                    </select>
                    </div>
                </div>

                <div class="col-4">
                    <label for="">Butir Kerja</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="text" name="butir_kerja[]" value="" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="">Nama Syarikat</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="text" name="nama_syarikat[]" value="" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="">Kos</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="text" name="kos[]" value="" required>
                    </div>
                </div>
                <!--<div class="col-4">
                    <label for="">Pegawai Pengesah</label>
                    <div class="input-group">
                    <select class="form-control mb-3" name="pegawai_pengesah[]" required>
                                        <option value="" selected disabled hidden>Sila Pilih Pegawai Pengesah</option required>
                                        @foreach ($pegawai as $pg)
                                        <option value="{{$pg->id}}">{{$pg->name}}</option>
                                        @endforeach
                                    </select>
                    </div>
                </div>-->

                <div class="col-4">
                    <label for="">Nama</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="text" name="" value="{{auth()->user()->name}}" required disabled>
                    </div>
                </div>

                <div class="col-4">
                    <label for="">Jawatan</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="text" name="" value="{{auth()->user()->jawatan}}" required disabled>
                    </div>
                </div>

            </div>

            </div>
            </div>

`
            );

        }

        function findSelectedKewpa3A() {
            let no_siri = $("select[name=no_siri_pendaftaran]").val();
            for (let i = 0; i < list_no_siri.length; i++) {
                if (no_siri == list_no_siri[i]['no_siri_pendaftaran']) {
                    setValueToForm(list_no_siri[i])
                }
            }
        }

        function setValueToForm(k3) {
            $("input[name=jenis]").val(k3['jenis_aset']);
            $("input[name=sub_kategori]").val(k3['sub_kategori']);
            $("input[name=keterangan_aset_alih]").val(k3['keterangan_aset']);
            $("input[name=lokasi]").val(k3['lokasi_penempatan']);
        }

        
    </script>

@endsection
