@extends('layouts.base_umum') @section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                <li class="breadcrumb-item"><a href="/lokasi">Kod Lokasi</a></li>
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
          <h2 class="mb-0">Kod Lokasi</h2>
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
            <th scope="col">Singkatan</th>
            <th scope="col">Nama Jabatan</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jabatans as $jabatan)
          <tr>
            
            <td scope="col">{{$loop->index + 1}}</td>
            <td scope="col">{{$jabatan->singkatan}}</td>
            <td scope="col">{{$jabatan->nama_jabatan}}</td>

            <td scope="col">
              <a href="#" onclick="updateData({{$jabatan}})"><i class="fas fa-pen"></i></a>
              <a href="/jabatan" onclick="deleteData({{$jabatan}})"><i class="fas fa-trash"></i></a>
              </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/jabatan" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Kod Jabatan</h2>
               </div>
             </div>
           </div>
          </br>
          <div class="card-body pt-0">
            

            <div class="row">
            <div class="col-6">
            <label for="">Singkatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="singkatan" value="">
            </div>
            </div>

            <div class="col-6">
            <label for="">Nama Jabatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nama_jabatan" value="">
            </div>
            </div>
            </div>
            <div id="info_jabatan_create"></div>

          <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
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
                 <h2 class="mb-0">Tambah Kod Jabatan</h2>
               </div>
             </div>
           </div>
          </br>
          <div class="card-body pt-0">
            

            <div class="row">
            <div class="col-6">
            <label for="">Singkatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="singkatan" value="">
            </div>
            </div>

            <div class="col-6">
            <label for="">Nama Jabatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nama_jabatan" value="">
            </div>
            </div>
            </div>
            <div id="info_jabatan_create"></div>

          <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>
</div>


<script type="text/javascript">
    
    var no_kod = [];

    $(document).ready(function () {
      initiateDatatable();
      $("#info_jabatan_form").hide();
      $("#button_tambah").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {

      $("#show").hide();

      $("#updateForm input[name=singkatan]").val(obj.singkatan);
      $("#updateForm input[name=nama_jabatan]").val(obj.nama_jabatan);
      $("#updateForm action").val("/jabatan/" + obj.id);      
      $("#updateForm").attr('action', "/jabatan/" + obj.id)

      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      $("#updateForm input[name=singkatan]").val(obj.singkatan);
      $("#updateForm input[name=nama_jabatan]").val(obj.nama_jabatan);
      $("#updateForm action").val("/jabatan/" + obj.id);      
      $("#updateForm").attr('action', "/jabatan/" + obj.id)
      
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
        url: "/jabatan/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/jabatan";;
				}
      })

    } 

    function tambahAsetUntukDitolak() {
      var option_data = ""
      for (let i=0; i < no_kod.length; i++) {
        option_data = option_data + `<option value=${no_kod[i].no_kod}>${no_kod[i].no_kod}</option>`
      }


     $("#info_jabatan_create").append(
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
