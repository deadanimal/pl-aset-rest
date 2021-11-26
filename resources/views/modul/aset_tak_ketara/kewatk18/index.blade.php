@extends('layouts.base_atk') @section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-8">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                <li class="breadcrumb-item"><a href="">Kewatk18</a></li>
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
            <h2 class="mb-0">Lantikan Pemeriksa</h2>
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
              <th scope="col">Pegawai</th>
              <th scope="col">Tempoh</th>
              <th scope="col">Tarikh Mula</th>
              <th scope="col">Tarikh Akhir</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>

        <tbody>

        @foreach ($kewatk18 as $k18)
          <tr>

            <td scope="col">{{$loop->index + 1}}</td>
            <td scope="col">{{$k18->nama_pegawai}}</td>
            <td scope="col">{{$k18->tempoh}} Tahun</td>
            <td scope="col">{{$k18->tarikh_mula}}</td>
            <td scope="col">{{$k18->tarikh_tamat}}</td>

            @if ($k18->status=="DERAF") 
              <td scope="col"><span class="badge bg-warning">{{$k18->status}}</span></th>
            @elseif ($k18->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$k18->status}}</span></th>
            @elseif ($k18->status=="SOKONG") 
              <td scope="col"><span class="badge bg-warning">{{$k18->status}}</span></th>
            @elseif ($k18->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$k18->status}}</span></th>
            @elseif ($k18->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$k18->status}}</span></th>
            @endif

            <td scope="col">
              <a href="#" onclick="updateData({{$k18}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk18" onclick="deleteData({{$k18}})"><i class="fas fa-trash"></i></a>
              <a href="/kewatk18pdf/{{$k18->id}}" ><i class="fas fa-print"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk18" enctype="multipart/form-data">
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

              <label for="">Pegawai</label>
              <div class="input-group">
                <select class="form-control mb-3" name="pegawai">
                  <option value="" selected disabled hidden>Pilih pegawai</option>
                  @foreach ($pegawai as $pg)
                  <option value="{{$pg->id}}">{{$pg->name}}</option>
                  @endforeach
                </select>
              </div>

              <label for="">Tempoh</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="tempoh" value="">
              </div>
              <label for="">Tarikh Mula</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_mula" value="">
              </div>
              <label for="">Tarikh Tamat</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_tamat" value="">
              </div>
              <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" action="/kewatk18" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h2 class="mb-0">Sunting Lantikan</h2>
                  </div>
                </div>
              </div>
          </br>
          <div class="card-body pt-0">

              <label for="">Pegawai</label>
              <div class="input-group">
                <select class="form-control mb-3" name="pegawai">
                  <option value="" selected disabled hidden>Pilih pegawai</option>
                  @foreach ($pegawai as $pg)
                  <option value="{{$pg->id}}">{{$pg->name}}</option>
                  @endforeach
                </select>
              </div>

              <label for="">Tempoh</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="tempoh" value="">
              </div>
              <label for="">Tarikh Mula</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_mula" value="">
              </div>
              <label for="">Tarikh Tamat</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_tamat" value="">
              </div>

              <input class="form-control mb-3" type="hidden" name="created_by" value="">

              <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

<script type="text/javascript">

  $(document).ready(function() {
    initiateDatatable();
    $("#info_kewatk18_form").hide();
    $("#button_tambah").hide();
  })

  $("#tambah").click(function() {
    $("#show").hide();
    $("#create").show();
  });

  function updateData(obj) {
    $("#show").hide();

    $("#updateForm select[name=pegawai]").val(obj.pegawai);
    $("#updateForm input[name=tempoh]").val(obj.tempoh);
    $("#updateForm input[name=tarikh_mula]").val(obj.tarikh_mula);
    $("#updateForm input[name=tarikh_tamat]").val(obj.tarikh_tamat);
    $("#updateForm input[name=created_by]").val(obj.created_by);

    $("#updateForm action").val("/kewatk18/" + obj.id);      
    $("#updateForm").attr('action', "/kewatk18/" + obj.id)
    $("#updateDiv").show();

  }

  function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk18/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk18";;
				}
      })
    } 



</script>




@endsection
