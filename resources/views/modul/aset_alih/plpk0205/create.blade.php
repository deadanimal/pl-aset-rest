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
                                <li class="breadcrumb-item"><a href="/plpk_pa_0205">plpk_pa 0205</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="create">
            <form method="POST" action="/plpk_pa_0205" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah PLPK PA 0205</h2>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <label for="">Pemandu</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="pemandu" required>
                                        <option value="" required required selected disabled hidden>Pilih Pemandu
                                        </option required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label for="">No Rujukan KEWPA 14</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="kewpa14_id" required>
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

                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </div>



                </div>
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
                url: "/plpk_pa_0205/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/plpk_pa_0205";;
                }
            })
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
