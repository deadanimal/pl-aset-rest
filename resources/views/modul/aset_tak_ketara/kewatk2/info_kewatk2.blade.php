@extends('layouts.base') @section('content')
<div id="show">
  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">INFO KEWATK 2</h6>
        </div>
        <!--<div class="col text-end">
          <button class="btn btn-sm btn-primary" id="tambah"><i class="fas fa-plus"></i></button>

        </div>-->
      </div>
    </div>
    </br>
    <div class="card-body pt-0">

      <table class="table" id="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Kuantiti Ditolak</th>
            <th scope="col">Kuantiti Kurang Lebih</th>
            <th scope="col">Sebab Penolakan</th>
            <th scope="col">Catatan</th>
            <th scope="col">Tindakan</th> </tr>
        </thead>
        <tbody>
          @foreach ($info_kewatk2 as $info_kewatk2)
          <tr>

            <td scope="col">{{$info_kewatk2->kuantiti_ditolak}}</td>
            <td scope="col">{{$info_kewatk2->kuantiti_kurang_lebih}}</td>
            <td scope="col">{{$info_kewatk2->sebab_penolakan}}</td>
            <td scope="col">{{$info_kewatk2->catatan}}</td>

            <td scope="col">
              <a href="#" onclick="updateData({{$info_kewatk2}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk2/{{$info_kewatk2->no_rujukan_atk2}}" onclick="deleteData({{$info_kewatk2}})"><i class="fas fa-trash"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/info_kewatk2" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
            <h6 class="text-white">INFO KEWATK 2</h6>
          </div>
          </br>
          <div class="card-body pt-0">
          <label for="">Kuantiti Ditolak</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_ditolak" value="">
          </div>
          <label for="">Kuantiti Kurang Lebih</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih" value="">
          </div>
          <label for="">Sebab Penolakan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="sebab_penolakan" value="">
          </div>
          <label for="">Catatan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="catatan" value="">
          </div>
          <div class="input-group">
            <input class="form-control mb-3" type="hidden" name="no_rujukan_atk2" value="{{$rujukan_kewatk2}}">
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
              <h6 class="text-white">KEWATK 2</h6>
          </div>
          </br>
          <div class="card-body pt-0">
          <label for="">Kuantiti Ditolak</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_ditolak" value="">
          </div>
          <label for="">Kuantiti Kurang Lebih</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih" value="">
          </div>
          <label for="">Sebab Penolakan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="sebab_penolakan" value="">
          </div>
          <label for="">Catatan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="catatan" value="">
          </div>
          <div class="input-group">
            <input class="form-control mb-3" type="hidden" name="no_rujukan_atk2" value="{{$rujukan_kewatk2}}">
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

      $("#updateForm input[name=kuantiti_ditolak]").val(obj.kuantiti_ditolak);
      $("#updateForm input[name=kuantiti_kurang_lebih]").val(obj.kuantiti_kurang_lebih);
      $("#updateForm input[name=sebab_penolakan]").val(obj.sebab_penolakan);
      $("#updateForm input[name=catatan]").val(obj.catatan);

      $("#updateForm action").val("/info_kewatk2/" + obj.id);      
      $("#updateForm").attr('action', "/info_kewatk2/" + obj.id);

      $("#updateDiv").show();

    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk2/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/info_kewatk2";
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
