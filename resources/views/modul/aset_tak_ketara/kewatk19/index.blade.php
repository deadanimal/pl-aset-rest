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
                <li class="breadcrumb-item"><a href="">Kewatk19</a></li>
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
            <h2 class="mb-0">Pelupusan Harta Intelek</h2>
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
              <th scope="col">No. Rujukan</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>

        <tbody>

        @foreach ($kewatk19 as $k19)
          <tr>

            <td scope="col">{{$loop->index + 1}}</td>
            <td scope="col">{{$k19->agensi}}</td>
            <td scope="col">No. {{$k19->id}}</td>

            @if ($k19->status=="DERAF") 
              <td scope="col"><span class="badge bg-warning">{{$k19->status}}</span></th>
            @elseif ($k19->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$k19->status}}</span></th>
            @elseif ($k19->status=="SOKONG") 
              <td scope="col"><span class="badge bg-warning">{{$k19->status}}</span></th>
            @elseif ($k19->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$k19->status}}</span></th>
            @elseif ($k19->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$k19->status}}</span></th>
            @endif

            <td scope="col">
              <a href="/kewatk19/{{$k19->id}}"><i class="fas fa-pen"></i></a>
              <a href="/kewatk19" onclick="deleteData({{$k19}})"><i class="fas fa-trash"></i></a>
              <a href="/kewatk19pdf/{{$k19->id}}" ><i class="fas fa-print"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk19" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
             <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h2 class="mb-0">Tambah Pelupusan Baru</h2>
                  </div>
                </div>
              </div>

            <div class="card-body pt-0">

            </br>
            <label for="">Agensi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="agensi" value="">
            </div>

            <div id="info_kewatk19_create"></div>

            <a id="button_aset_dilupus" class="btn btn-sm btn-primary text-white" onclick="tambahAsetDilupus()">Tambah Aset</a>

          <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
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
                <h2 class="mb-0">Sunting Pelupusan</h2>
              </div>
            </div>
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

            <div id="info_kewatk19_update"></div>

            <a id="button_aset_dilupus" class="btn btn-sm btn-primary text-white" onclick="tambahAsetDilupus()">Tambah Aset</a>

          <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>


</div>

<script type="text/javascript">

  $(document).ready(function() {
    initiateDatatable();
    $("#info_kewatk19_form").hide();
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

    $("#updateForm action").val("/kewatk19/" + obj.id);      
    $("#updateForm").attr('action', "/kewatk19/" + obj.id)
    $("#updateDiv").show();

  }

  function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk19/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk19";;
				}
      })
    } 

    function tambahAsetDilupus() {

      $("#info_kewatk19_create").append(

        `
        <div class="row">
          <div class="col-4">
            <label for="">Keadaan Aset</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="keadaan_aset[]" value="">
            </div>
          </div>
          <div class="col-4">
            <label for="">Kaedah Pelupusan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="kaedah_pelupusan[]">
                <option value="" selected disabled hidden>Pilih Kaedah</option>
                <option value="Musnah">Musnah</option>
                <option value="Hapus">Hapus</option>
              </select>

            </div>
          </div>
          <div class="col-4">
            <label for="">Justifikasi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="justifikasi[]" value="">
            </div>
          </div>
          <div class="col-4">
            <label for="">Catatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="catatan[]" value="">
            </div>
          </div>
          <div class="col-4">
            <label for="">No Siri Pendaftaran</label>
              <select class="form-control mb-3" name="no_siri_pendaftaran[]">
                <option value="" selected disabled hidden>Pilih No Siri</option>
                @foreach ($kewatk3a as $kew3)
                <option value="{{$kew3->no_siri_pendaftaran}}">{{$kew3->no_siri_pendaftaran}}</option>
                @endforeach
              </select>
          </div>
          
        </div>
        <hr>
      `
      );

    }

</script>




@endsection
