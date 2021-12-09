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
                <li class="breadcrumb-item"><a href="/kewatk19">Kewatk19</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="container-fluid mt--6">
  <div id="show">

    <form action="/kewatk19/{{$kewatk19->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
            <div class="row">
              <div class="col">
                <h2 class="mb-0">No. Rujukan {{$kewatk19->id}}</h2>
              </div>
            </div>
          </div>

          </br>
          <div class="card-body pt-0"> 

            <label for="">Agensi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="agensi" value="{{$kewatk19->agensi}}">
            </div>

          <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>


    <div class="card mt-4">
      <div class="card-header">
        <div class="row">
          <div class="col">
            <h2 class="mb-0">Info Pelupusan</h2>
          </div>
          <div class="text-end mr-2">
            <button id="tambah" class="align-self-end btn btn-sm btn-primary" href="">Tambah</button>
          </div>
        </div>
      </div>

      <div class="table-responsive py-4">


      <table class="table table-custom-simplified table-flush" id="table">
        <thead class="thead-light">
          <tr>
              <th scope="col">Bil</th>
              <th scope="col">Keadaan Aset</th>
              <th scope="col">Kaedah Pelupusan</th>
              <th scope="col">Justifikasi</th>
              <th scope="col">Catatan</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>

        <tbody>

        @foreach ($info_kewatk19 as $ik19)
          <tr>

            <td scope="col">{{$loop->index + 1}}</td>
            <td scope="col">{{$ik19->keadaan_aset}}</td>
            <td scope="col">{{$ik19->kaedah_pelupusan}}</td>
            <td scope="col">{{$ik19->justifikasi}}</td>
            <td scope="col">{{$ik19->catatan}}</td>

            <td scope="col">
              <a href="#" onclick="updateData({{$ik19}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk19/{{$kewatk19->id}}" onclick="deleteData({{$ik19}})"><i class="fas fa-trash"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/info_kewatk19" enctype="multipart/form-data">
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
            <div class="row">
            <div class="col-4">
            <label for="">Keadaan Aset</label>
            <div class="input-group">
                 <input class="form-control mb-3" type="text" name="keadaan_aset" value="">
               </div>
             </div>
             <div class="col-4">
               <label for="">Kaedah Pelupusan</label>
               <div class="input-group">
                 <select class="form-control mb-3" name="kaedah_pelupusan">
                   <option value="" selected disabled hidden>Pilih Kaedah</option>
                   <option value="Musnah">Musnah</option>
                   <option value="Hapus">Hapus</option>
                 </select>

               </div>
             </div>
             <div class="col-4">
               <label for="">Justifikasi</label>
               <div class="input-group">
                 <input class="form-control mb-3" type="text" name="justifikasi" value="">
               </div>
             </div>
             <div class="col-4">
               <label for="">Catatan</label>
               <div class="input-group">
                 <input class="form-control mb-3" type="text" name="catatan" value="">
               </div>
             </div>
             <div class="col-4">
               <label for="">No Siri Pendaftaran</label>
                 <select class="form-control mb-3" name="no_siri_pendaftaran">
                   <option value="" selected disabled hidden>Pilih No Siri</option>
                   @foreach ($kewatk3a as $kew3)
                   <option value="{{$kew3->no_siri_pendaftaran}}">{{$kew3->no_siri_pendaftaran}}</option>
                   @endforeach
                 </select>
             </div>

             <input class="form-control mb-3" type="hidden" name="kewatk19_id" value="{{$kewatk19->id}}">
             </div>

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

          <div class="row">
            <div class="col-4">
            <label for="">Keadaan Aset</label>
            <div class="input-group">
                 <input class="form-control mb-3" type="text" name="keadaan_aset" value="">
               </div>
             </div>
             <div class="col-4">
               <label for="">Kaedah Pelupusan</label>
               <div class="input-group">
                 <select class="form-control mb-3" name="kaedah_pelupusan">
                   <option value="Musnah">Musnah</option>
                   <option value="Hapus">Hapus</option>
                 </select>

               </div>
             </div>
             <div class="col-4">
               <label for="">Justifikasi</label>
               <div class="input-group">
                 <input class="form-control mb-3" type="text" name="justifikasi" value="">
               </div>
             </div>
             <div class="col-4">
               <label for="">Catatan</label>
               <div class="input-group">
                 <input class="form-control mb-3" type="text" name="catatan" value="">
               </div>
             </div>
             <div class="col-4">
               <label for="">No Siri Pendaftaran</label>
                 <select class="form-control mb-3" name="no_siri_pendaftaran">
                   <option value="" selected disabled hidden>Pilih No Siri</option>
                   @foreach ($kewatk3a as $kew3)
                   <option value="{{$kew3->no_siri_pendaftaran}}">{{$kew3->no_siri_pendaftaran}}</option>
                   @endforeach
                 </select>
             </div>
             <input class="form-control mb-3" type="hidden" name="kewatk19_id" value="{{$kewatk19->id}}">
          </div>
          <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
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

    $("#updateForm select[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);
    $("#updateForm input[name=catatan]").val(obj.catatan);
    $("#updateForm input[name=kaedah_pelupusan]").val(obj.kaedah_pelupusan);
    $("#updateForm input[name=justifikasi]").val(obj.justifikasi);
    $("#updateForm input[name=keadaan_aset]").val(obj.keadaan_aset);

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
        url: "/info_kewatk19/" + id,
        type: "DELETE",
        success: function () {
				}
      })
    } 

    function tambahAsetDilupus() {

    }

</script>




@endsection
