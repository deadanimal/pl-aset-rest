@extends('layouts.base_atk') @section('content')
<div id="show">

  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">KEWATK 9</h6>
        </div>
        <div class="col text-end">
          <button class="btn btn-sm btn-primary" id="tambah"><i class="fas fa-plus"></i></button>

        </div>
      </div>
    </div>
    </br>
    <div class="card-body pt-0">

      <table class="table" id="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Bil</th>
            <th scope="col">Pegawai Pemeriksa1</th>
            <th scope="col">Pegawai Pemeriksa2</th>
            <th scope="col">Status</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kewatk9 as $k9)
          <tr>
            <td scope="col">{{$loop->index + 1}}</td>
            <td scope="col">{{$k9->pegawai_pemeriksa1}}</td>
            <td scope="col">{{$k9->pegawai_pemeriksa2}}</td>

            @if ($k9->status=="DERAF") 
              <td scope="col"><span class="badge bg-warning">{{$k9->status}}</span></th>
            @elseif ($k9->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$k9->status}}</span></th>
            @elseif ($k9->status=="SOKONG") 
              <td scope="col"><span class="badge bg-warning">{{$k9->status}}</span></th>
            @elseif ($k9->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$k9->status}}</span></th>
            @elseif ($k9->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$k9->status}}</span></th>
            @endif


            @if ($k9->status=="DERAF") 
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk9" onclick="updateStatus({{$k9}}, 'LULUS')"><i class="fas fa-check-circle"></i></a>
              <a href="/kewatk9" onclick="updateStatus({{$k9}}, 'DITOLAK')"><i class="fas fa-times-circle"></i></a>
              <a href="" onclick="cetakPdf()"><i class="fas fa-print"></i></a>

              @else
              <a href="/kewatk9" onclick="updateStatus({{$k9}}, 'HANTAR')"><i class="fas fa-arrow-up"></i></a>
              <a href="#" onclick="updateData({{$k9}})"><i class="fas fa-pen"></i></a>
              <a href="" onclick="cetakPdf()"><i class="fas fa-print"></i></a>
              <a href="/kewatk9" onclick="deleteData({{$k9}})"><i class="fas fa-trash"></i></a>
              @endif
            </td>

            @elseif ($k9->status=="SOKONG") 
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk9" onclick="updateStatus({{$k9}}, 'SOKONG')"><i class="fas fa-arrow-up"></i></a>
              <a href="/kewatk9pdf/"><i class="fas fa-print"></i></a>
              <a href="#" onclick="updateData({{$k9}})"><i class="fas fa-pen"></i></a>

              @else
              <a href="/kewatk9pdf/{{$k9->id}}"><i class="fas fa-print"></i></a>
              @endif
            </td>
            @endif


          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk9" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
              <h6 class="text-white">KEWATK 9</h6>
          </div>
          </br>
          <div class="card-body pt-0">

            <label for="">Agensi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="agensi" value="">
>>>>>>> main
            </div>
            </br>
            <div class="card-body pt-0">

                <table class="table" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Bil</th>
                            <th scope="col">Pegawai Pemeriksa1</th>
                            <th scope="col">Pegawai Pemeriksa2</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewatk9 as $k9)
                            <tr>
                                <td scope="col">{{ $loop->index + 1 }}</td>
                                <td scope="col">{{ $k9->pegawai_pemeriksa1 }}</td>
                                <td scope="col">{{ $k9->pegawai_pemeriksa2 }}</td>

                                @if ($k9->status == 'DERAF')
                                    <td scope="col"><span class="badge bg-warning">{{ $k9->status }}</span></th>
                                    @elseif ($k9->status=="HANTAR")
                                    <td scope="col"><span class="badge bg-primary">{{ $k9->status }}</span></th>
                                    @elseif ($k9->status=="SOKONG")
                                    <td scope="col"><span class="badge bg-warning">{{ $k9->status }}</span></th>
                                    @elseif ($k9->status=="LULUS")
                                    <td scope="col"><span class="badge bg-success">{{ $k9->status }}</span></th>
                                    @elseif ($k9->status=="DITOLAK")
                                    <td scope="col"><span class="badge bg-danger">{{ $k9->status }}</span></th>
                                @endif


                                @if ($k9->status == 'DERAF')
                                    <td scope="col">
                                        @if (Auth::user()->jawatan == 'superadmin')
                                            <a href="/kewatk9" onclick="updateStatus({{ $k9 }}, 'LULUS')"><i
                                                    class="fas fa-check-circle"></i></a>
                                            <a href="/kewatk9" onclick="updateStatus({{ $k9 }}, 'DITOLAK')"><i
                                                    class="fas fa-times-circle"></i></a>
                                            <a href="" onclick="cetakPdf()"><i class="fas fa-print"></i></a>

                                        @else
                                            <a href="/kewatk9" onclick="updateStatus({{ $k9 }}, 'HANTAR')"><i
                                                    class="fas fa-arrow-up"></i></a>
                                            <a href="#" onclick="updateData({{ $k9 }})"><i
                                                    class="fas fa-pen"></i></a>
                                            <a href="" onclick="cetakPdf()"><i class="fas fa-print"></i></a>
                                            <a href="/kewatk9" onclick="deleteData({{ $k9 }})"><i
                                                    class="fas fa-trash"></i></a>
                                        @endif
                                    </td>

                                @elseif ($k9->status=="SOKONG")
                                    <td scope="col">
                                        @if (Auth::user()->jawatan == 'superadmin')
                                            <a href="/kewatk9" onclick="updateStatus({{ $k9 }}, 'SOKONG')"><i
                                                    class="fas fa-arrow-up"></i></a>
                                            <a href="/kewatk9pdf/"><i class="fas fa-print"></i></a>
                                            <a href="#" onclick="updateData({{ $k9 }})"><i
                                                    class="fas fa-pen"></i></a>

                                        @else
                                            <a href="/kewatk9pdf/{{ $k9->id }}"><i class="fas fa-print"></i></a>
                                        @endif
                                    </td>
                                @endif


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="create" style="display: none;">
        <form method="POST" action="/kewatk9" enctype="multipart/form-data">
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header" style="
                      background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
                      ">
                    <h6 class="text-white">KEWATK 9</h6>
                </div>
                </br>
                <div class="card-body pt-0">

                    <label for="">Agensi</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="agensi" value="">
                    </div>
                    <label for="">Bahagian</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="bahagian" value="">
                    </div>

                    <div id="info_kewatk9_create"></div>

                    <a id="button_aset_diperiksa" class="btn btn-sm btn-primary text-white"
                        onclick="tambahAsetDiperiksa()">Tambah Aset</a>

                    <hr>

                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <div id="updateDiv" style="display: none;">
        <form id="updateForm" method="POST" action="/kewatk9" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card mt-4" id="basic-info">
                <div class="card-header" style="
                      background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
                      ">
                    <h6 class="text-white">KEWATK 9</h6>
                </div>
                </br>
                <div class="card-body pt-0">

                    <label for="">Agensi</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="agensi" value="">
                    </div>
                    <label for="">Bahagian</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="bahagian" value="">
                    </div>

                    <!-- hidden form -->
                    <input class="form-control mb-3" type="hidden" name="status" value="">
                    <input class="form-control mb-3" type="hidden" name="pegawai_pemeriksa1" value="">
                    <input class="form-control mb-3" type="hidden" name="pegawai_pemeriksa2" value="">


                    <div id="info_kewatk9_update"></div>

                    <hr>

                    <a id="button_aset_diperiksa" class="btn btn-sm btn-primary text-white"
                        onclick="tambahAsetDiperiksaUpdate()">Tambah Aset</a>

                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


    <script type="text/javascript">
        //global vars
        var info_kewatk9 = [];

        $(document).ready(function() {
            initiateDatatable();
            $("#info_kewatk9_form").hide();
            $("#button_tambah").hide();
        })

        $("#tambah").click(function() {
            $("#show").hide();
            $("#create").show();
        });

        function updateData(obj) {

            $("#show").hide();

            // kewatk9 assign data to input 
            $("#updateForm input[name=agensi]").val(obj.agensi);
            $("#updateForm input[name=bahagian]").val(obj.bahagian);
            $("#updateForm input[name=pegawai_pemeriksa1]").val(obj.pegawai_pemeriksa1);
            $("#updateForm input[name=pegawai_pemeriksa2]").val(obj.pegawai_pemeriksa2);
            $("#updateForm input[name=status]").val(obj.status);

            // lookup info_kewatk9 data and assign to update form
            getInfoKewatk9(obj.id)


            $("#updateForm action").val("/kewatk9/" + obj.id);
            $("#updateForm").attr('action', "/kewatk9/" + obj.id)
            $("#updateDiv").show();

        }

        function updateStatus(obj, mode) {
            $("#updateForm input[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);
            $("#updateForm input[name=agensi]").val(obj.agensi);
            $("#updateForm input[name=bahagian]").val(obj.bahagian);
            $("#updateForm input[name=kod_nasional]").val(obj.kod_nasional);
            $("#updateForm input[name=cara_aset_diperolehi]").val(obj.cara_aset_diperolehi);
            $("#updateForm input[name=kategori]").val(obj.kategori);
            $("#updateForm input[name=sub_kategori]").val(obj.sub_kategori);
            $("#updateForm input[name=jenis]").val(obj.jenis);
            $("#updateForm input[name=rajuk]").val(obj.rajuk);
            $("#updateForm input[name=nombor_dalam_negara]").val(obj.nombor_dalam_negara);
            $("#updateForm input[name=nombor_luar_negara]").val(obj.nombor_luar_negara);
            $("#updateForm input[name=tarikh_lulus_luput_dalam]").val(obj.tarikh_lulus_luput_dalam);
            $("#updateForm input[name=tarikh_lulus_luput_luar]").val(obj.tarikh_lulus_luput_luar);
            $("#updateForm input[name=tarikh_permohonan_dalam]").val(obj.tarikh_permohonan_dalam);
            $("#updateForm input[name=tarikh_permohonan_luar]").val(obj.tarikh_permohonan_luar);
            $("#updateForm input[name=tarikh_cipta_dalam]").val(obj.tarikh_cipta_dalam);
            $("#updateForm input[name=usia_guna]").val(obj.usia_guna);
            $("#updateForm input[name=spesifikasi]").val(obj.spesifikasi);
            $("#updateForm input[name=harga_perolehan_asal]").val(obj.harga_perolehan_asal);
            $("#updateForm input[name=tarikh_dibeli]").val(obj.tarikh_dibeli);
            $("#updateForm input[name=no_pesanan]").val(obj.no_pesanan);
            $("#updateForm input[name=tempoh_jaminan]").val(obj.tempoh_jaminan);
            $("#updateForm input[name=nama_pembekal]").val(obj.nama_pembekal);
            $("#updateForm input[name=alamat_pembekal]").val(obj.alamat_pembekal);
            $("#updateForm input[name=status]").val(mode);
            $("#updateForm input[name=staff_id]").val(obj.staff_id);
            $("#updateForm input[name=ketua_jabatan]").val(obj.ketua_jabatan);

            $("#updateForm action").val("/kewatk9/" + obj.id);
            $("#updateForm").attr('action', "/kewatk9/" + obj.id)

            var values = {};
            $.each($('#updateForm').serializeArray(), function(i, field) {
                values[field.name] = field.value;
            });
            console.log(values);

            var url = $("#updateForm").attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: values, // serializes the form's elements.
                success: function(data) {}
            });
        }

        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewatk9/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/kewatk9";;
                }
            })
        }

        function getInfoKewatk9(obj) {
            console.log("obj", obj);

            var option_data = ""

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/info_kewatk9/" + obj,
                type: "GET",
                success: function(data) {
                    info_kewatk9 = data;

                    //assign info_kewatk9 to update form
                    assignInfoKewatk9(data);
                }
            })

        }

        function assignInfoKewatk9(data) {
            for (let i = 0; i < data.length; i++) {
                $("#info_kewatk9_update").append(

                    `<div class="row">
              
            <div class="col">
              <label for="">No Siri Pendaftaran</label>
              <div class="input-group">
                <select class="form-control mb-3" name="no_siri_pendaftaran[]">
                <option value="${data[i].no_siri_pendaftaran}"selected=selected>${data[i].no_siri_pendaftaran}</option>
                @foreach ($kewatk3a as $k3)
                    <option value="{{ $k3->no_siri_pendaftaran }}">{{ $k3->no_siri_pendaftaran }}</option>
                @endforeach
              </select>
              </div>
            </div>

            <div class="col">
              <label for="">lokasi</label>
              <div class="input-group">
                <select id="no_kod_select" class="form-control mb-3" name="lokasi_sebenar[]">
                <option value="${data[i].lokasi_sebenar}" selected=selected>${data[i].lokasi_sebenar}</option>
                @foreach ($lokasi as $lok)
                    <option value="{{ $lok->kod_lokasi }}">{{ $lok->kod_lokasi }}</option>
                @endforeach
                </select>

              </div>
            </div>


            <div class="col">
              <label for="">Status</label>
              <div class="input-group">
                <select class="form-control mb-3" name="status_harta[]">
                <option value="${data[i].status_harta}" selected=selected>${data[i].status_harta}</option>
                <option value="(A) Sempurna">(A) Sempurna</option>
                <option value="(B) Tidak Sempurna">(B) Tidak Sempurna</option>
                <option value="(C) Perlu Pembaikan">(C) Perlu Pembaikan</option>
                <option value="(D) Sedang Diselenggara">(D) Sedang Diselenggara</option>
                <option value="(E) Medium Rosak/Tidak Sesuai">(E) Medium Rosak/Tidak Sesuai</option>
                <option value="(F) Hilang">(F) Hilang</option>
              </select>


              </div>
            </div>

            <div class="col">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan[]" value="${data[i].catatan}">
              </div>
            </div>

            <!-- hidden input -->
            <input class="form-control mb-3" type="hidden" name="id[]" value="${data[i].id}">

         </div>`)
            }
        }


        function tambahAsetDiperiksa() {

            $("#info_kewatk9_create").append(
                `<div class="row">
              
            <div class="col">
              <label for="">No Siri Pendaftaran</label>
              <div class="input-group">
                <select class="form-control mb-3" name="no_siri_pendaftaran[]">
                <option value=""></option>
                @foreach ($kewatk3a as $k3)
                    <option value="{{ $k3->no_siri_pendaftaran }}">{{ $k3->no_siri_pendaftaran }}</option>
                @endforeach
              </select>
              </div>
            </div>

            <div class="col">
              <label for="">lokasi</label>
              <div class="input-group">
                <select id="no_kod_select" class="form-control mb-3" name="lokasi_sebenar[]">
                <option value="" selected disabled hidden>Pilih Lokasi Sebenar</option>
                @foreach ($lokasi as $lok)
                    <option value="{{ $lok->kod_lokasi }}">{{ $lok->kod_lokasi }}</option>
                @endforeach
                </select>

              </div>
            </div>


            <div class="col">
              <label for="">Status</label>
              <div class="input-group">
                <select class="form-control mb-3" name="status_harta[]">
                <option value="" selected disabled hidden>Pilih Status</option>
                <option value="(A) Sempurna">(A) Sempurna</option>
                <option value="(B) Tidak Sempurna">(B) Tidak Sempurna</option>
                <option value="(C) Perlu Pembaikan">(C) Perlu Pembaikan</option>
                <option value="(D) Sedang Diselenggara">(D) Sedang Diselenggara</option>
                <option value="(E) Medium Rosak/Tidak Sesuai">(E) Medium Rosak/Tidak Sesuai</option>
                <option value="(F) Hilang">(F) Hilang</option>
              </select>


              </div>
            </div>

            <div class="col">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan[]" value="">
              </div>
            </div>

         </div>`
            )

        }

        function tambahAsetDiperiksaUpdate() {

            $("#info_kewatk9_update").append(
                `<div class="row">
              
            <div class="col">
              <label for="">No Siri Pendaftaran</label>
              <div class="input-group">
                <select class="form-control mb-3" name="no_siri_pendaftaran[]">
                <option value=""></option>
                @foreach ($kewatk3a as $k3)
                    <option value="{{ $k3->no_siri_pendaftaran }}">{{ $k3->no_siri_pendaftaran }}</option>
                @endforeach
              </select>
              </div>
            </div>

            <div class="col">
              <label for="">lokasi</label>
              <div class="input-group">
                <select id="no_kod_select" class="form-control mb-3" name="lokasi_sebenar[]">
                <option value="" selected disabled hidden>Pilih Lokasi Sebenar</option>
                @foreach ($lokasi as $lok)
                    <option value="{{ $lok->kod_lokasi }}">{{ $lok->kod_lokasi }}</option>
                @endforeach
                </select>

              </div>
            </div>


            <div class="col">
              <label for="">Status</label>
              <div class="input-group">
                <select class="form-control mb-3" name="status_harta[]">
                <option value="" selected disabled hidden>Pilih Status</option>
                <option value="(A) Sempurna">(A) Sempurna</option>
                <option value="(B) Tidak Sempurna">(B) Tidak Sempurna</option>
                <option value="(C) Perlu Pembaikan">(C) Perlu Pembaikan</option>
                <option value="(D) Sedang Diselenggara">(D) Sedang Diselenggara</option>
                <option value="(E) Medium Rosak/Tidak Sesuai">(E) Medium Rosak/Tidak Sesuai</option>
                <option value="(F) Hilang">(F) Hilang</option>
              </select>


              </div>
            </div>

            <div class="col">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan[]" value="">
              </div>
            </div>

         </div>`
            )

        }



        function getInfoKewatk1(obj) {

            $("#medium_storan_create option").remove();

            var option_data = ""

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/info_kewatk1/" + obj.value,
                type: "GET",
                success: function(data) {

                    no_kod = data;
                    for (let i = 0; i < no_kod.length; i++) {
                        option_data = option_data +
                            `<option value=${no_kod[i].medium}>${no_kod[i].medium}</option>`
                    }

                    $("#medium_storan_create").append(option_data);


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


        function getPenempatanData(obj) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewatk9_penempatan/" + obj.id,
                type: "GET",
                success: function(data) {
                    console.log("data penempatan", data);

                    $("#medium_storan_create").append(option_data);


                }
            })
        }

        function cetakPdf() {
            window.open('http://127.0.0.1:8001/cetak/atk9')
        }
    </script>

@endsection
