@extends('layouts.base_atk') @section('content') 
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                <li class="breadcrumb-item"><a href="/kewatk13">Kewatk13</a></li>
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
            <h2 class="mb-0">Rekod Penyelenggaraan</h2>
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
              <th scope="col">Bil</th>
              <th scope="col">Tarikh</th>
              <th scope="col">Jenis Penyelenggaraan</th>
              <th scope="col">No Siri Pendaftaran</th>
              <th scope="col">Syarikat Penyelenggara</th>
              <th scope="col">Kos</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>

        <tbody>

        @foreach ($kewatk13 as $k13)
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
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk13" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
             <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h2 class="mb-0">Tambah Penyelenggaraan</h2>
                  </div>
                </div>
              </div>

            <div class="card-body pt-0">
              
            </br>

            <div class="row">
            <div class="col-4">
            <label for="">No Siri Pendaftaran</label>
            <div class="input-group">
              <select class="form-control mb-3" name="no_siri_pendaftaran">
                <option value=""></option>
                @foreach ($kewatk3a as $kew3)
                <option value="{{$kew3->no_siri_pendaftaran}}">{{$kew3->no_siri_pendaftaran}}</option>
                @endforeach
              </select>
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Jenis Penyelenggaraan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="jenis_penyelenggaraan" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Butir-butir kerja</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="butir_kerja" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Syarikat/Jabatan Penyelenggara</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="syarikat_penyelenggara" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Kos (RM)</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kos" value="">
            </div>

            </div>
            </div>

            
            <div id="info_kewatk13_create"></div>

          <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
            <div class="row">
              <div class="col">
                <h2 class="mb-0">Sunting Penyelenggaraan</h2>
              </div>
            </div>
          </div>

          </br>
          <div class="card-body pt-0"> 

          <div class="row">
          <div class="col-4">
          <label for="">No Siri Pendaftaran</label>
            <div class="input-group">
              <select class="form-control mb-3" name="no_siri_pendaftaran">
                <option value=""></option>
                @foreach ($kewatk3a as $kew3)
                <option value="{{$kew3->no_siri_pendaftaran}}">{{$kew3->no_siri_pendaftaran}}</option>
                @endforeach
              </select>
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh" value="">
            </div>
            </div>

          <div class="col-4">
            <label for="">Jenis Penyelenggaraan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="jenis_penyelenggaraan" value="">
            </div>
            </div>

          <div class="col-4">
            <label for="">Butir-butir kerja</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="butir_kerja" value="">
            </div>
            </div>

          <div class="col-4">
            <label for="">Syarikat/Jabatan Penyelenggara</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="syarikat_penyelenggara" value="">
            </div>

            </div>


          <div class="col-4">
            <label for="">Kos (RM)</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kos" value="">
            </div>

            </div>
            </div>
            
            
          <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
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
