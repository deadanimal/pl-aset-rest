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
                                <li class="breadcrumb-item"><a href="/kewpa16">kewpa16</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">

            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Penyelenggaraan</h2>
                        </div>
                        {{-- <div class="text-end mr-2">
                            <a href="/kewpa16pdf" class="align-self-end btn btn-sm btn-primary" id="cetak">Cetak</a>
                        </div> --}}
                    </div>
                </div>

                    <div class="card-body pt-0">

                        <br>
                        <form method="POST" action="/kewpa16">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Pilih Tahun: </label>
                                    <div class="input-group">
                                        <input name="tahun" id="tahun_kewpa16" class="form-control" placeholder="Pilih Tahun" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="">Pilih Jabatan: </label>
                                    <div class="input-group">
                                        <select class="form-control mb-3" name="jabatan" required>
                                            <option value="" selected disabled hidden>Pilih Jabatan</option> required>
                                            @foreach ($kod_jabatans as $jabatan)
                                            <option value="{{$jabatan->nama_jabatan}}">{{$jabatan->nama_jabatan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <br>
                            <button type="submit" class="btn btn-sm btn-primary text-white">Jana Laporan</a>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            initiateDatatable();
            


        })

        document.addEventListener("DOMContentLoaded", function(){
            $("#tahun_kewpa16").datepicker({
            format: " yyyy", // Notice the Extra space at the beginning
            viewMode: "years",
            minViewMode: "years"
        });
        });


        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewpa16/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/kewpa16";;
                }
            })
        }
    </script>

@endsection
