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
                <li class="breadcrumb-item"><a href="">Kewatk17</a></li>
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
            <h2 class="mb-0">Perakuan Penilaian Semula</h2>
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
              <th scope="col">No Sijil Pendaftaran</th>
              <th scope="col">Status</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>

        <tbody>

        @foreach ($kewatk17 as $k17)
          <tr>

            <td scope="col">{{$loop->index + 1}}</td>
            <td scope="col">{{$k17->no_siri_pendaftaran}}</td>
            <td scope="col">{{$k17->no_sijil_pendaftaran}}</td>

            @if ($k17->status=="DERAF") 
              <td scope="col"><span class="badge bg-warning">{{$k17->status}}</span></th>
            @elseif ($k17->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$k17->status}}</span></th>
            @elseif ($k17->status=="SOKONG") 
              <td scope="col"><span class="badge bg-warning">{{$k17->status}}</span></th>
            @elseif ($k17->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$k17->status}}</span></th>
            @elseif ($k17->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$k17->status}}</span></th>
            @endif

            <td scope="col">
              <a href="#" onclick="updateData({{$k17}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk17" onclick="deleteData({{$k17}})"><i class="fas fa-trash"></i></a>
              <a href="/kewatk17pdf/{{$k17->id}}" ><i class="fas fa-print"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk17" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h2 class="mb-0">Tambah Perakuan</h2>
                  </div>
                </div>
              </div>
          </br>
          <div class="card-body pt-0">

              <label for="">No Siri Pendaftaran</label>
              <div class="input-group">
                <select class="form-control mb-3" name="no_siri_pendaftaran">
                  <option value="" selected disabled hidden>Pilih Aset</option>
                  @foreach ($kewatk3a as $kew3)
                  <option value="{{$kew3->no_siri_pendaftaran}}">{{$kew3->no_siri_pendaftaran}}</option>
                  @endforeach
                </select>
              </div>

              <label for="">Kos Bersangkutan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kos_bersangkutan" value="">
              </div>
              <label for="">Tarikh Tamat Perlindungan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_tamat_perlindungan" value="">
              </div>
              <label for="">Butir</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="butir" value="">
              </div>
              <label for="">Laporan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="laporan" value="">
              </div>

              <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" action="/kewatk17" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h2 class="mb-0">Sunting Perakuan</h2>
                  </div>
                </div>
              </div>
          </br>
          <div class="card-body pt-0">

              <label for="">No Siri Pendaftaran</label>
              <div class="input-group">
                <select class="form-control mb-3" name="no_siri_pendaftaran">
                  <option value="" selected disabled hidden>Pilih Aset</option>
                  @foreach ($kewatk3a as $kew3)
                  <option value="{{$kew3->no_siri_pendaftaran}}">{{$kew3->no_siri_pendaftaran}}</option>
                  @endforeach
                </select>
              </div>

              <label for="">Kos Bersangkutan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kos_bersangkutan" value="">
              </div>
              <label for="">Tarikh Tamat Perlindungan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_tamat_perlindungan" value="">
              </div>
              <label for="">Butir</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="butir" value="">
              </div>
              <label for="">Laporan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="laporan" value="">
              </div>

              <input class="form-control mb-3" type="hidden" name="status" value="">
              <input class="form-control mb-3" type="hidden" name="pengaku" value="">

              <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>



<script type="text/javascript">

  $(document).ready(function() {
    initiateDatatable();
    $("#info_kewatk17_form").hide();
    $("#button_tambah").hide();
  })

  $("#tambah").click(function() {
    $("#show").hide();
    $("#create").show();
  });

  function updateData(obj) {
    $("#show").hide();

    $("#updateForm select[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);
    $("#updateForm input[name=butir]").val(obj.butir);
    $("#updateForm input[name=laporan]").val(obj.laporan);
    $("#updateForm input[name=kos_bersangkutan]").val(obj.kos_bersangkutan);
    $("#updateForm input[name=tarikh_tamat_perlindungan]").val(obj.tarikh_tamat_perlindungan);

    $("#updateForm input[name=status]").val(obj.status);
    $("#updateForm input[name=pengaku]").val(obj.pengaku);

    $("#updateForm action").val("/kewatk17/" + obj.id);      
    $("#updateForm").attr('action', "/kewatk17/" + obj.id)
    $("#updateDiv").show();

  }

  function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk17/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk17";;
				}
      })
    } 



</script>




@endsection
