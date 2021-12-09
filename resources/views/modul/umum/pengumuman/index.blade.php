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
                <li class="breadcrumb-item"><a href="/pengumuman">Pengumuman</a></li>
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
          <h2 class="mb-0">Pengumuman</h2>
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
            <th scope="col">Tajuk</th>
            <th scope="col">Info</th>
            <th scope="col">Gambar</th>
            <th scope="col">Status</th>
            <th scope="col">Tindakan</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($pengumumans as $pengumuman)
          <tr>

            <td scope="col">{{$loop->index + 1}}</td>
            <td scope="col">{{$pengumuman->tajuk}}</td>
            <td scope="col">{{$pengumuman->info_pengumuman}}</td>
            <td scope="col"><a class="btn btn-sm btn-primary" href="/storage/{{$pengumuman->gambar_pengumuman}}" target="_blank">Lihat</a></td>
            @if ($pengumuman->status=="Aktif") 
              <td scope="col"><span class="badge bg-success">Aktif</span></th>
            @elseif ($pengumuman->status=="Tidak Aktif") 
              <td scope="col"><span class="badge bg-warning">Tidak Aktif</span></th>
            @endif

            <td scope="col">
              <a href="#" onclick="updateData({{$pengumuman}})"><i class="fas fa-pen"></i></a>
              <a href="/pengumuman" onclick="deleteData({{$pengumuman}})"><i class="fas fa-trash"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/pengumuman" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Pengumuman</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
            <div class="row">

            <div class="col-4">
            <label for="">Tajuk</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tajuk" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Info</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="info_pengumuman" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Gambar</label>
            <div class="input-group">
              <input class="form-control mb-3" type="file" name="gambar_pengumuman" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Status </label>
            <div class="input-group">
              <select class="form-control mb-3" name="status" required>
                <option value="" selected disabled hidden>Pilih Status</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>
            </div>
            </div>
          

            <div id="info_pengumuman_create"></div>

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
                 <h2 class="mb-0">Sunting Pengguna</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
            
            <div class="row">

            <div class="col-4">
            <label for="">Tajuk</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tajuk" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Info</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="info_pengumuman" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Gambar</label>
            <div class="input-group">
              <input class="form-control mb-3" type="file" name="gambar_pengumuman">
            </div>
            </div>

            <div class="col-4">
            <label for="">Status </label>
            <div class="input-group">
              <select class="form-control mb-3" name="status" required>
                <option value="" selected disabled hidden>Pilih Status</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>
            </div>
            </div>
          
          
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
      $("#info_pengumuman_form").hide();
      $("#button_tambah").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {

      $("#show").hide();

      $("#updateForm input[name=tajuk]").val(obj.tajuk);
      $("#updateForm input[name=info_pengumuman]").val(obj.info_pengumuman);
      $("#updateForm select[name=status ]").val(obj.status );

      $("#updateForm action").val("/pengumuman/" + obj.id);      
      $("#updateForm").attr('action', "/pengumuman/" + obj.id)

      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      $("#updateForm input[name=tindakan_diterima]").val(obj.tindakan_diterima);
      $("#updateForm input[name=pegawai_penerima]").val(obj.pegawai_penerima);
      $("#updateForm input[name=pembekal]").val(obj.pembekal);
      $("#updateForm input[name=status]").val(mode);
      $("#updateForm select[name=jenis_penolakan]").val(obj.jenis_penolakan);
      $("#updateForm select[name=no_rujukan_atk1]").val(obj.no_rujukan_atk1);


      $("#updateForm action").val("/pengumuman/" + obj.id);      
      $("#updateForm").attr('action', "/pengumuman/" + obj.id)
      
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
        url: "/pengumuman/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/pengumuman";;
				}
      })

    } 

    function tambahAsetUntukDitolak() {
      var option_data = ""
      for (let i=0; i < no_kod.length; i++) {
        option_data = option_data + `<option value=${no_kod[i].no_kod}>${no_kod[i].no_kod}</option>`
      }


     $("#info_pengumuman_create").append(
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
