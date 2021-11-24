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
                <li class="breadcrumb-item"><a href="">Info Kewatk4</a></li>
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
            <h2 class="mb-0">Info Pendaftaran Harta Bukan Intelek</h2>
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
            <th scope="col">Jenis</th>
            <th scope="col">Tajuk</th>
            <th scope="col">No Pesanan</th>
            <th scope="col">Tarikh Terima</th>
            <th scope="col">Kuantiti</th>
            <th scope="col">Harga</th>
            <th scope="col">Tempoh Dari</th>
            <th scope="col">Tempoh Hingga</th>
            <th scope="col">Catatan</th>
            <th scope="col">Pegawai Penempatan</th>
            <th scope="col">Tindakan</th>
        </thead>
        <tbody>
          @foreach ($info_kewatk4 as $info_kewatk4)
          <tr>

            <td scope="col">{{$info_kewatk4->jenis}}</td>
            <td scope="col">{{$info_kewatk4->tajuk}}</td>
            <td scope="col">{{$info_kewatk4->no_pesanan}}</td>
            <td scope="col">{{$info_kewatk4->tarikh_terima}}</td>
            <td scope="col">{{$info_kewatk4->kuantiti}}</td>
            <td scope="col">{{$info_kewatk4->harga}}</td>
            <td scope="col">{{$info_kewatk4->tempoh_dari}}</td>
            <td scope="col">{{$info_kewatk4->tempoh_hingga}}</td>
            <td scope="col">{{$info_kewatk4->catatan}}</td>
            <td scope="col">{{$info_kewatk4->pegawai_penempatan}}</td>

            <td scope="col">
              <a href="#" onclick="updateData({{$info_kewatk4}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk4/{{$kewatk4_id}}" onclick="deleteData({{$info_kewatk4}})"><i class="fas fa-trash"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/info_kewatk4" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Info</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
          <label for="">Jenis</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="jenis" value="">
          </div>
          <label for="">Tajuk</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="tajuk" value="">
          </div>
          <label for="">No Pesanan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="no_pesanan" value="">
          </div>
          <label for="">Tarikh Terima</label>
          <div class="input-group">
            <input class="form-control mb-3" type="date" name="tarikh_terima" value="">
          </div>
          <label for="">Kuantiti</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti" value="">
          </div>
          <label for="">Harga</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="harga" value="">
          </div>
          <label for="">Tempoh Dari</label>
          <div class="input-group">
            <input class="form-control mb-3" type="date" name="tempoh_dari" value="">
          </div>
          <label for="">Tempoh Hingga</label>
          <div class="input-group">
            <input class="form-control mb-3" type="date" name="tempoh_hingga" value="">
          </div>
          <label for="">Catatan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="catatan" value="">
          </div>
          <label for="">Pegawai Penempatan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="pegawai_penempatan" value="">
          </div>
          <div class="input-group">
            <input class="form-control mb-3" type="hidden" name="kewatk4_id" value="{{$kewatk4_id}}">
          </div>

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
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Sunting Info</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
          <label for="">Jenis</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="jenis" value="">
          </div>
          <label for="">Tajuk</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="tajuk" value="">
          </div>
          <label for="">No Pesanan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="no_pesanan" value="">
          </div>
          <label for="">Tarikh Terima</label>
          <div class="input-group">
            <input class="form-control mb-3" type="date" name="tarikh_terima" value="">
          </div>
          <label for="">Kuantiti</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti" value="">
          </div>
          <label for="">Harga</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="harga" value="">
          </div>
          <label for="">Tempoh Dari</label>
          <div class="input-group">
            <input class="form-control mb-3" type="date" name="tempoh_dari" value="">
          </div>
          <label for="">Tempoh Hingga</label>
          <div class="input-group">
            <input class="form-control mb-3" type="date" name="tempoh_hingga" value="">
          </div>
          <label for="">Catatan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="catatan" value="">
          </div>
          <label for="">Pegawai Penempatan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="pegawai_penempatan" value="">
          </div>
          <div class="input-group">
            <input class="form-control mb-3" type="hidden" name="kewatk4_id" value="{{$kewatk4_id}}">
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
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {

      $("#show").hide();

      $("#updateForm input[name=jenis]").val(obj.jenis);
      $("#updateForm input[name=tajuk]").val(obj.tajuk);
      $("#updateForm input[name=no_pesanan]").val(obj.no_pesanan);
      $("#updateForm input[name=tarikh_terima]").val(obj.tarikh_terima);
      $("#updateForm input[name=kuantiti]").val(obj.kuantiti);
      $("#updateForm input[name=harga]").val(obj.harga);
      $("#updateForm input[name=tempoh_dari]").val(obj.tempoh_dari);
      $("#updateForm input[name=tempoh_hingga]").val(obj.tempoh_hingga);
      $("#updateForm input[name=catatan]").val(obj.catatan);
      $("#updateForm input[name=pegawai_penempatan]").val(obj.pegawai_penempatan);

      $("#updateForm action").val("/info_kewatk4/" + obj.id);      
      $("#updateForm").attr('action', "/info_kewatk4/" + obj.id);

      $("#updateDiv").show();

    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk4/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/info_kewatk4";
				}
      })

    } 


    function initiateDatatable() {
      const dataTableBasic = new simpleDatatables.DataTable("#table", {
          searchable: true,
          ddfixedHeight: true,
          sortable: false
      });
    }

    


</script>

@endsection
