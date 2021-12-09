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
                <li class="breadcrumb-item"><a href="">Kewatk26</a></li>
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
            <h2 class="mb-0">Sijil Hapus Kira</h2>
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
              <th scope="col">Bil Kelulusan</th>
              <th scope="col">No Siri Pendaftaran</th>
              <th scope="col">Tarikh</th>
              <th scope="col">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kewatk26 as $k26)
            <tr>

              <td scope="col">{{$loop->index + 1}}</td>
              <td scope="col">{{$k26->bil_kelulusan}}</td>
              <td scope="col">{{$k26->no_siri_pendaftaran}}</td>
              <td scope="col">{{$k26->tarikh}}</td>

              <td scope="col">
              <a href="#" onclick="updateData({{$k26}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk26pdf/{{$k26->id}}" ><i class="fas fa-print"></i></a>
              <a href="/kewatk26" onclick="deleteData({{$k26}})"><i class="fas fa-trash"></i></a>
              </td>
  
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk26" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Sijil</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">

              <label for="">No Siri Pendaftaran</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="no_siri_pendaftaran">
                  <option value="" selected disabled hidden>Pilih Aset</option>
                  @foreach ($kewatk3a as $k3a)
                  <option value="{{$k3a->no_siri_pendaftaran}}">Laporan No: {{$k3a->no_siri_pendaftaran}}</option>
                  @endforeach
                </select>
              </div>

              <label for="">Bil Kelulusan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="bil_kelulusan" value="">
              </div>
              <label for="">Tarikh</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh" value="">
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
                  <option value="" selected disabled hidden>Pilih Aset</option>
                  @foreach ($kewatk3a as $k3a)
                  <option value="{{$k3a->no_siri_pendaftaran}}">Laporan No: {{$k3a->no_siri_pendaftaran}}</option>
                  @endforeach
                </select>
              </div>

              <label for="">Bil Kelulusan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="bil_kelulusan" value="">
              </div>
              <label for="">Tarikh</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh" value="">
              </div>


              <button class="btn btn-primary" type="submit">Simpan</button>

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
        url: "/kewatk26/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk26";;
				}
      })
    } 

    function updateData(obj) {
      $("#show").hide();

      $("#updateForm input[name=bil_kelulusan]").val(obj.bil_kelulusan);
      $("#updateForm select[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);
      $("#updateForm input[name=tarikh]").val(obj.tarikh);

      $("#updateForm action").val("/kewatk26/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk26/" + obj.id)
      $("#updateDiv").show();
    }


</script>

@endsection
