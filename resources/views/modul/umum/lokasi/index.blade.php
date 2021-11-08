@extends('layouts.base') @section('content')
<div id="show">

  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">Lokasi</h6>
        </div>
        <div class="col text-end">
          <button class="btn btn-sm btn-primary" id="tambah"><i class="fas fa-plus"></i></button>

        </div>
      </div>
    </div>
    </br>
    <div class="card-body pt-0">

      <table class="table" id="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Kod Lokasi</th>
            <th scope="col">Nama Lokasi</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($lokasis as $lokasi)
          <tr>
            
            <td scope="col">{{$lokasi->kod_lokasi}}</td>
            <td scope="col">{{$lokasi->nama_lokasi}}</td>

            <td scope="col">
              <a href="#" onclick="updateData({{$lokasi}})"><i class="fas fa-pen"></i></a>
              <a href="/lokasi" onclick="deleteData({{$lokasi}})"><i class="fas fa-trash"></i></a>
              </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/lokasi" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
              <h6 class="text-white">Lokasi</h6>
          </div>
          </br>
          <div class="card-body pt-0">
            
            <label for="">Kod Lokasi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kod_lokasi" value="">
            </div>
            <label for="">Nama Lokasi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nama_lokasi" value="">
            </div>
            <div id="info_lokasi_create"></div>

          <a id="button_tambah" class="btn btn-primary text-white" onclick="tambahAsetUntukDitolak()">Tambah Aset Untuk Ditolak</a>
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
              <h6 class="text-white">lokasi</h6>
          </div>
          </br>
          <div class="card-body pt-0">
            
            <label for="">Kod Lokasi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kod_lokasi" value="">
            </div>
            <label for="">Nama Lokasi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nama_lokasi" value="">
            </div>
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="staff_id" value="">
            </div>
          
          <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>


<script type="text/javascript">
    
    var no_kod = [];

    $(document).ready(function () {
      initiateDatatable();
      $("#info_lokasi_form").hide();
      $("#button_tambah").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {

      $("#show").hide();

      $("#updateForm input[name=kod_lokasi]").val(obj.kod_lokasi);
      $("#updateForm input[name=nama_lokasi]").val(obj.nama_lokasi);
      $("#updateForm action").val("/lokasi/" + obj.id);      
      $("#updateForm").attr('action', "/lokasi/" + obj.id)

      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      $("#updateForm input[name=kod_lokasi]").val(obj.kod_lokasi);
      $("#updateForm input[name=nama_lokasi]").val(obj.nama_lokasi);
      $("#updateForm action").val("/lokasi/" + obj.id);      
      $("#updateForm").attr('action', "/lokasi/" + obj.id)
      
      var values = {};
      $.each($('#updateForm').serializeArray(), function(i, field) {
          values[field.name] = field.value;
      });
      console.log(values);

      var url = $("#updateForm").attr('action');

      $.ajax({
        type: "POST",
        url: url,
        data: values, // serializes the form's elements.
        success: function(data)
        {
        }
      });
    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/lokasi/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/lokasi";;
				}
      })

    } 

    function tambahAsetUntukDitolak() {
      var option_data = ""
      for (let i=0; i < no_kod.length; i++) {
        option_data = option_data + `<option value=${no_kod[i].no_kod}>${no_kod[i].no_kod}</option>`
      }


     $("#info_lokasi_create").append(
          `<div class="row">
              
            <div class="col">
              <label for="">No Kod</label>
              <div class="input-group">
                <select id="no_kod_select" class="form-control mb-3" name="no_kod[]">
                ${option_data}
                </select>
              </div>
            </div>

            <div class="col">
              <label for="">Kuantiti Ditolak</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_ditolak[]" value="">
              </div>
            </div>

            <div class="col">
              <label for="">Kuantiti Kurang Lebih</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih[]" value="">
              </div>
            </div>

            <div class="col">
              <label for="">Sebab Penolakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="sebab_penolakan[]" value="">
              </div>
            </div>

            <div class="col">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan[]" value="">
              </div>
            </div>

         </div>`

     )

    }

    function getInfoKewatk1(obj) {
      $("#button_tambah").show();

      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk1/" + obj.value,
        type: "GET",
        success: function (data) {
          no_kod = data;
				}
      })

    }


    function initiateDatatable() {
      const dataTableBasic = new simpleDatatables.DataTable("#table", {
          searchable: true,
          fixedHeight: true,
          sortable: false
      });
    }

        


</script>

@endsection
