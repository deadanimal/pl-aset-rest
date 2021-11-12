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
                <li class="breadcrumb-item"><a href="">Info Kewatk1</a></li>
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
              <h2 class="mb-0">Info Penerimaan Aset</h2>
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
              <th scope="col">No Kod</th>
              <th scope="col">Keterangan Aset</th>
              <th scope="col">Medium</th>
              <th scope="col">Kuantiti Dipesan</th>
              <th scope="col">Kuantiti Do</th>
              <th scope="col">Kuantiti Diterima</th>
              <th scope="col">Catatan</th>
              <th scope="col">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($info_kewatk1 as $info_kewatk1)
            <tr>
  
              <td scope="col">{{$info_kewatk1->no_kod}}</td>
              <td scope="col">{{$info_kewatk1->keterangan_aset}}</td>
              <td scope="col">{{$info_kewatk1->medium}}</td>
              <td scope="col">{{$info_kewatk1->kuantiti_dipesan}}</td>
              <td scope="col">{{$info_kewatk1->kuantiti_do}}</td>
              <td scope="col">{{$info_kewatk1->kuantiti_diterima}}</td>
              <td scope="col">{{$info_kewatk1->catatan}}</td>
              <td scope="col">
                <a href="#" onclick="updateData({{$info_kewatk1}})"><i class="fas fa-pen"></i></a>
                <a href="/kewatk1/{{$info_kewatk1->no_rujukan}}" onclick="deleteData({{$info_kewatk1}})"><i class="fas fa-trash"></i></a>
              </td>
  
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/info_kewatk1" enctype="multipart/form-data">
      @csrf
        <div class="card mt-4" id="basic-info">

            <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Info Penerimaan Aset</h2>
               </div>
               <div class="text-end mr-2">
                 <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
          <label for="">No Kod</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="no_kod" value="">
          </div>
          <label for="">Keterangan Aset</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="keterangan_aset" value="">
          </div>

          <label for="">Medium</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="medium" value="">
          </div>
          <label for="">Kuantiti Dipesan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_dipesan" value="">
          </div>
          <label for="">Kuantiti Do</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_do" value="">
          </div>
          <label for="">Kuantiti Diterima</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_diterima" value="">
          </div>
          <label for="">Catatan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="catatan" value="">
          </div>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="rujukan_no" value="{{$rujukan_kewatk1}}" hidden>
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
          <div class="card-header" style="          
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
              <h6 class="text-white">KEWATK 1</h6>
          </div>
          </br>
          <div class="card-body pt-0">
          <label for="">No Kod</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="no_kod" value="">
          </div>

          <label for="">Keterangan Aset</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="keterangan_aset" value="">
          </div>
          <label for="">Medium</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="medium" value="">
          </div>
          <label for="">Kuantiti Dipesan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_dipesan" value="">
          </div>
          <label for="">Kuantiti Do</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_do" value="">
          </div>
          <label for="">Kuantiti Diterima</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_diterima" value="">
          </div>
          <label for="">Catatan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="catatan" value="">
          </div>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="rujukan_no" value="{{$rujukan_kewatk1}}" hidden>
          </div>  

          <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div> 
  </form>
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

      $("#updateForm input[name=no_kod]").val(obj.no_kod);
      $("#updateForm input[name=keterangan_aset]").val(obj.keterangan_aset);
      $("#updateForm input[name=medium]").val(obj.medium);
      $("#updateForm input[name=kuantiti_dipesan]").val(obj.kuantiti_dipesan);
      $("#updateForm input[name=kuantiti_do]").val(obj.kuantiti_do);
      $("#updateForm input[name=kuantiti_diterima]").val(obj.kuantiti_diterima);
      $("#updateForm input[name=catatan]").val(obj.catatan);
      $("#updateForm input[name=no_rujukan]").val(obj.no_rujukan);      
      $("#updateForm action").val("/info_kewatk1/" + obj.id);      
      $("#updateForm").attr('action', "/info_kewatk1/" + obj.id);

      $("#updateDiv").show();

    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk1/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/info_kewatk1";
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
