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
                                <li class="breadcrumb-item"><a href="/plpk_pa_0203">plpk_pa_0203</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="create">
            <form method="POST" action="/plpk_pa_0203" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah PLPK PA 0203</h2>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">Tarikh Permohonan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_permohonan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Status Keutamaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="status_keutamaan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Nota Penjelasan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nota_penjelasan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Nota Kebenaran</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nota_kebenaran" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Pembaiki Disyorkan</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="pembaiki_disyorkan" required>
                                        <option value="" required required selected disabled hidden>Pilih Pembaiki
                                        </option required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Pegawai Penyelenggaraan</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="pegawai_penyelenggaraan" required>
                                        <option value="" required required selected disabled hidden>Pilih Pegawai Penyelenggaraan
                                        </option required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                           


                        </div>

                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahInfo()">Tambah Info</a>
                    </div>



                </div>
                <div id="info_plpk_pa_0203_create"></div>
        </div>
        </form>
    </div>

    </div>


    <script type="text/javascript">
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
                url: "/plpk_pa_0203/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/plpk_pa_0203";;
                }
            })
        }

        function tambahInfo() {

            $("#info_plpk_pa_0203_create").append(

                `
                <div class="card mt-4" id="basic-info">
                <div class="card-header">
                <div class="row">
                    <div class="col">
                    <h2 class="mb-0">Tambah Info PLPK PA 0203</h2>
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
                    <label for="">Butiran Kerosakan</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="text" name="butiran_kerosakan[]" value="" required>
                    </div>
                </div>
                
                <div class="col-4">
                                <label for="">No Rujukan KEWPA 14</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="kewpa14_id[]" required>
                                        <option value="" required required selected disabled hidden>Pilih No. Rujukan Kewpa 14
                                        </option required>
                                        @foreach ($kewpa14 as $kew14)
                                            <option value="{{ $kew14->id }}">
                                                No Rujukan: {{ $kew14->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                </div>
            </div>

            </div>
            </div>

`
            );

        }


        function initiateDatatable() {
            const dataTableBasic = new simpleDatatables.DataTable("#table", {
                searchable: true,
                fixedHeight: true,
                sortable: false
            });
        }
    </script>

@endsection
