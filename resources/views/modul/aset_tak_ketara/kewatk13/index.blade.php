@extends('layouts.base') @section('content') <div id="show">

  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">KEWATK 13</h6>
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
              <th scope="col">Tarikh</th>
              <th scope="col">Jenis Penyelenggaraan</th>
              <th scope="col">No Siri Pendaftaran</th>
              <th scope="col">Syarikat Penyelenggara</th>
              <th scope="col">Kos</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>

        @foreach ($kewatk13 as $k13)
        <tbody>
          <tr>


            <td scope="col">{{$loop->index + 1}}</td>
            <td scope="col">{{$k13->tarikh}}</td>
            <td scope="col">{{$k13->jenis_penyelenggaraan}}</td>
            <td scope="col">{{$k13->no_siri_pendaftaran}}</td>
            <td scope="col">{{$k13->syarikat_penyelenggara}}</td>
            <td scope="col">{{$k13->kos}}</td>


            <td scope="col">
              <a href="#" onclick="updateData({{$k13}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk13" onclick="deleteData({{$k13}})"><i class="fas fa-trash"></i></a>
              <a href="/kewatk13pdf/{{$k13->id}}" ><i class="fas fa-print"></i></a>
            </td>

          </tr>

        </tbody>
        @endforeach
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk13" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
              <h6 class="text-white">KEWATK 13</h6>
          </div>
          </br>
          <div class="card-body pt-0">

            <label for="">No Siri Pendaftaran</label>
            <div class="input-group">
              <select class="form-control mb-3" name="no_siri_pendaftaran">
                <option value=""></option>
                @foreach ($kewatk3a as $kew3)
                <option value="{{$kew3->no_siri_pendaftaran}}">{{$kew3->no_siri_pendaftaran}}</option>
                @endforeach
              </select>
            </div>

            <label for="">Tarikh</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh" value="">
            </div>
            <label for="">Jenis Penyelenggaraan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="jenis_penyelenggaraan" value="">
            </div>
            <label for="">Butir-butir kerja</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="butir_kerja" value="">
            </div>
            <label for="">Syarikat/Jabatan Penyelenggara</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="syarikat_penyelenggara" value="">
            </div>

            <label for="">Kos (RM)</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kos" value="">
            </div>

            
            <div id="info_kewatk13_create"></div>

          <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="          
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
              <h6 class="text-white">KEWATK 13</h6>
          </div>
          </br>
          <div class="card-body pt-0"> 

          <label for="">No Siri Pendaftaran</label>
            <div class="input-group">
              <select class="form-control mb-3" name="no_siri_pendaftaran">
                <option value=""></option>
                @foreach ($kewatk3a as $kew3)
                <option value="{{$kew3->no_siri_pendaftaran}}">{{$kew3->no_siri_pendaftaran}}</option>
                @endforeach
              </select>
            </div>

            <label for="">Tarikh</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh" value="">
            </div>
            <label for="">Jenis Penyelenggaraan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="jenis_penyelenggaraan" value="">
            </div>
            <label for="">Butir-butir kerja</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="butir_kerja" value="">
            </div>
            <label for="">Syarikat/Jabatan Penyelenggara</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="syarikat_penyelenggara" value="">
            </div>

            <label for="">Kos (RM)</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kos" value="">
            </div>

            
            
          <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>


<script type="text/javascript">

    $(document).ready(function () {
      initiateDatatable();
      $("#info_kewatk13_form").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {

      $("#show").hide();

      $("#updateForm input[name=tarikh]").val(obj.tarikh);
      $("#updateForm input[name=jenis_penyelenggaraan]").val(obj.jenis_penyelenggaraan);
      $("#updateForm input[name=no_pesanan_kerajaan_dan_tarikh]").val(obj.no_pesanan_kerajaan_dan_tarikh);
      $("#updateForm select[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);
      $("#updateForm input[name=butir_kerja]").val(obj.butir_kerja);
      $("#updateForm input[name=syarikat_penyelenggara]").val(obj.syarikat_penyelenggara);
      $("#updateForm input[name=kos]").val(obj.kos);
      $("#updateForm input[name=nama_dan_jawatan]").val(obj.nama_dan_jawatan);



      $("#updateForm action").val("/kewatk13/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk13/" + obj.id)
      $("#updateDiv").show();

    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk13/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk13";;
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
