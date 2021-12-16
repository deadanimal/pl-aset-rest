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
                                <li class="breadcrumb-item"><a href="/kewpa17">Kewpa17</a></li>
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
                            <h2 class="mb-0">Pindahan Aset Alih</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive py-4">

                    <table class="table table-custom-simplified table-flush" id="table">
                        <thead class="thead-light">
                            <tr>

                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Bilangan Info</th>
                                <th scope="col">No Siri Pendaftaran</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kewpa17 as $kewpa17)
                                <tr>

                                    <td scope="col">{{ $loop->iteration }}</td>
                                    <td scope="col">{{ $kewpa17->id }}</td>
                                    <td scope="col">{{ count($kewpa17->infokewpa17) }}</td>
                                    <td scope="col">
                                        @foreach ($kewpa17->infokewpa17 as $ik17)
                                            {{ $ik17->no_siri_pendaftaran }},
                                        @endforeach
                                    </td>
                                    <td scope="col">
                                        <a href="/kewpa17/{{ $kewpa17->id }}"><i class="fas fa-pen"></i></a>
                                        <a href="/kewpa17pdf/{{ $kewpa17->id }}"><i class="fas fa-print"></i></a>
                                        <a href="/kewpa17" onclick="deleteData({{ $kewpa17 }})"><i
                                                class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>


            <div id="create" style="display: none;">
                <form id="create_form" method="POST" action="/kewpa17" enctype="multipart/form-data">
                    @csrf
                    <div class="card mt-4" id="basic-info">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h2 class="mb-0">Tambah Pindahan Aset Alih</h2>
                                </div>
                            </div>
                        </div>

                        </br>
                        <div class="card-body pt-0">
                            <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetPindahan()">Tambah Aset</a>
                            <button id="create_submit" class="btn-sm btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>

                    <div id="info_kewpa17_create"></div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            initiateDatatable();
        })

        $("#tambah").click(function() {
            $("#show").hide();
            $("#create").show();
            tambahAsetPindahan();
        });


        $(document).ready(function() {
            $("#create_form").validate();
        });

        function tambahAsetPindahan() {

            $("#info_kewpa17_create").append(

                `
          <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Info Pindahan</h2>
               </div>
              <div class="text-end mr-2">
                <a class="align-self-end btn btn-sm btn-primary text-white" onclick="$(this).closest('.card').remove()">Buang</a>
              </div>

             </div>
           </div>

          <div class="card-body pt-0">

          <br>
          <div class="row">
             <div class="col-6">
                <label for="">Catatan</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="catatan[]" value="" required>
                </div>
              </div>
              <div class="col-6">
                  <label for="">No Siri Pendaftaran</label>
                  <div class="input-group">
                      <select name="no_siri_pendaftaran[]" class="form-control mb-3" required>
                          <option selected>Pilih</option>
                          @foreach ($kewpa3a as $k3a)
                              <option value="{{ $k3a->no_siri_pendaftaran }}">
                                  {{ $k3a->no_siri_pendaftaran }}</option>
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


        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewpa17/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/kewpa17";;
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
