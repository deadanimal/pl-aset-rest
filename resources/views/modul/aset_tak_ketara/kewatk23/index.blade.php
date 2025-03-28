@extends('layouts.base_atk') @section('content') <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                <li class="breadcrumb-item"><a href="">Kewatk23</a></li>
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
            <h2 class="mb-0">Laporan Awal Kehilangan</h2>
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
              <th scope="col">No Siri Pendaftaran</th>
              <th scope="col">Tempat Kehilangan</th>
              <th scope="col">Tarikh Kehilangan</th>
              <th scope="col">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kewatk23 as $k23)
            <tr>
              <td scope="col">{{$loop->index + 1}}</td>
              <td scope="col">{{$k23->no_siri_pendaftaran}}</td>
              <td scope="col">{{$k23->tempat_kehilangan}}</td>
              <td scope="col">{{$k23->tarikh_kehilangan}}</td>

              <td scope="col">
              <a href="#" onclick="updateData({{$k23}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk23pdf/{{$k23->id}}" ><i class="fas fa-print"></i></a>
              <a href="/kewatk23" onclick="deleteData({{$k23}})"><i class="fas fa-trash"></i></a>
              </td>
  
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk23" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Laporan</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">

              <label for="">No Siri Pendaftaran</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="no_siri_pendaftaran">
                  <option value="" selected disabled hidden>Pilih Aset</option>
                  @foreach ($kewatk3a as $k3)
                  <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
                  @endforeach
                </select>
              </div>


              <label for="">Tempat Kehilangan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="tempat_kehilangan" value="">
              </div>
              <label for="">Tarikh Kehilangan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_kehilangan" value="">
              </div>
              <label for="">Cara Kehilangan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="cara_kehilangan" value="">
              </div>
              <label for="">No Rujukan Polis</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="no_rujukan_polis" value="">
              </div>
              <label for="">Tarikh Polis</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_polis" value="">
              </div>
              <label for="">Langkah Sedia Ada</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="langkah_sedia_ada" value="">
              </div>
              <label for="">Langkah Segera</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="langkah_segera" value="">
              </div>
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan" value="">
              </div>
              <label for="">Dokumen Sokongan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="file" name="dokumen_sokongan" value="">
              </div>
              <label for="">Gambar</label>
              <div class="input-group">
                <input class="form-control mb-3" type="file" name="gambar" value="">
              </div>
              <button class="btn btn-primary" type="submit">Simpan</button>

          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" action="/kewatk9" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Sunting Laporan</h2>
               </div>
             </div>
           </div>
          </br>
          <div class="card-body pt-0">

            <label for="">No Siri Pendaftaran</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="no_siri_pendaftaran">
                  @foreach ($kewatk3a as $k3)
                  <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
                  @endforeach
                </select>
              </div>


              <label for="">Tempat Kehilangan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="tempat_kehilangan" value="">
              </div>
              <label for="">Tarikh Kehilangan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_kehilangan" value="">
              </div>
              <label for="">Cara Kehilangan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="cara_kehilangan" value="">
              </div>
              <label for="">No Rujukan Polis</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="no_rujukan_polis" value="">
              </div>
              <label for="">Tarikh Polis</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_polis" value="">
              </div>
              <label for="">Langkah Sedia Ada</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="langkah_sedia_ada" value="">
              </div>
              <label for="">Langkah Segera</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="langkah_segera" value="">
              </div>
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan" value="">
              </div>
              <label for="">Dokumen Sokongan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="file" name="dokumen_sokongan" value="">
              </div>
              <label for="">Gambar</label>
              <div class="input-group">
                <input class="form-control mb-3" type="file" name="gambar" value="">
              </div>
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>




</div>


<script type="text/javascript">

    $(document).ready(function () {
      initiateDatatable();
      $("#button_tambah").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk23/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk23";;
				}
      })
    } 

    function updateData(obj) {
      $("#show").hide();
      // kewatk9 assign data to input 
      $("#updateForm input[name=tempat_kehilangan]").val(obj.tempat_kehilangan);
      $("#updateForm input[name=tarikh_kehilangan]").val(obj.tarikh_kehilangan);
      $("#updateForm input[name=cara_kehilangan]").val(obj.cara_kehilangan);
      $("#updateForm input[name=no_rujukan_polis]").val(obj.no_rujukan_polis);
      $("#updateForm input[name=tarikh_polis]").val(obj.tarikh_polis);
      $("#updateForm input[name=langkah_sedia_ada]").val(obj.langkah_sedia_ada);
      $("#updateForm input[name=langkah_segera]").val(obj.langkah_segera);
      $("#updateForm input[name=catatan]").val(obj.catatan);
      $("#updateForm select[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);

      $("#updateForm action").val("/kewatk23/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk23/" + obj.id)
      $("#updateDiv").show();
    }


</script>

@endsection
