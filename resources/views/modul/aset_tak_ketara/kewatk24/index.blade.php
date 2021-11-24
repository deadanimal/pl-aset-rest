@extends('layouts.base_atk') @section('content') <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                <li class="breadcrumb-item"><a href="">Kewatk24</a></li>
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
            <h2 class="mb-0">Lantikan Penyiasat</h2>
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
              <th scope="col">Agensi</th>
              <th scope="col">Tarikh Pulang</th>
              <th scope="col">Pegawai Pengawal</th>
              <th scope="col">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kewatk24 as $k24)
            <tr>

              <td scope="col">{{$loop->index + 1}}</td>
              <td scope="col">{{$k24->agensi}}</td>
              <td scope="col">{{$k24->tarikh_pulang}}</td>
              <td scope="col">{{$k24->name}}</td>

              <td scope="col">
              <a href="#" onclick="updateData({{$k24}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk24pdf/{{$k24->id}}" ><i class="fas fa-print"></i></a>
              <a href="/kewatk24" onclick="deleteData({{$k24}})"><i class="fas fa-trash"></i></a>
              </td>
  
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk24" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Lantikan</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">

              <label for="">Laporan</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="kewatk23_id">
                  <option value="" selected disabled hidden>Pilih Laporan</option>
                  @foreach ($kewatk23 as $k23)
                  <option value="{{$k23->id}}">Laporan No: {{$k23->id}}</option>
                  @endforeach
                </select>
              </div>


              <label for="">Agensi</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="agensi" value="">
              </div>
              <label for="">Tarikh Pulang</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_pulang" value="">
              </div>

              <label for="">Pegawai Pengawal</label>
              <div class="input-group">
                <select class="form-control mb-3" name="pegawai_pengawal">
                  <option value="" selected disabled hidden>Pilih Pengawal</option>
                  @foreach ($users as $pg)
                  <option value="{{$pg->id}}">{{$pg->name}}</option>
                  @endforeach
                </select>
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

              <label for="">Laporan</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="kewatk23_id">
                  <option value="" selected disabled hidden>Pilih Laporan</option>
                  @foreach ($kewatk23 as $k23)
                  <option value="{{$k23->id}}">Laporan No: {{$k23->id}}</option>
                  @endforeach
                </select>
              </div>


              <label for="">Agensi</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="agensi" value="">
              </div>
              <label for="">Tarikh Pulang</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_pulang" value="">
              </div>

              <label for="">Pegawai Pengawal</label>
              <div class="input-group">
                <select class="form-control mb-3" name="pegawai_pengawal">
                  <option value="" selected disabled hidden>Pilih Pengawal</option>
                  @foreach ($users as $pg)
                  <option value="{{$pg->id}}">{{$pg->name}}</option>
                  @endforeach
                </select>
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
        url: "/kewatk24/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk24";;
				}
      })
    } 

    function updateData(obj) {
      $("#show").hide();
      // kewatk9 assign data to input 
      $("#updateForm input[name=agensi]").val(obj.agensi);
      $("#updateForm input[name=tarikh_pulang]").val(obj.tarikh_pulang);
      $("#updateForm select[name=kewatk23_id]").val(obj.kewatk23_id);
      $("#updateForm select[name=pegawai_pengawal]").val(obj.pegawai_pengawal);

      $("#updateForm action").val("/kewatk24/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk24/" + obj.id)
      $("#updateDiv").show();
    }


</script>

@endsection
