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
                                <li class="breadcrumb-item"><a href="/kewpa12">kewpa12</a></li>
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
                            <h2 class="mb-0">Laporan Pemeriksaan</h2>
                        </div>
                        {{-- <div class="text-end mr-2">
                            <a href="/kewpa12pdf" class="align-self-end btn btn-sm btn-primary" id="cetak">Cetak</a>
                        </div> --}}
                    </div>
                </div>

                    <div class="card-body pt-0">

                        <br>
                        <form method="POST" action="/kewpa12/1">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Pilih Tahun: </label>
                                    <div class="input-group">
                                        <input type="text" name="tahun" id="tahun_kewpa12" class="form-control">
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
            $("#tahun_kewpa12").datepicker({
            format: " yyyy", // Notice the Extra space at the beginning
            viewMode: "years",
            minViewMode: "years"
        });


        })


        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewpa12/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/kewpa12";;
                }
            })
        }
    </script>

@endsection
