@extends('layouts.base') @section('content')
<div id="show">

  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">Pengguna</h6>
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
            <th scope="col">Name</th>
            <th scope="col">Email </th>
            <th scope="col">Prima Facie</th>
            <th scope="col">Ditahan Kerja</th>
            <th scope="col">Jawatan</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Jawatan</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($penggunas as $pengguna)
          <tr>
            <td scope="col">{{$pengguna->name}}</td>
            <td scope="col">{{$pengguna->email }}</td>
            <td scope="col">{{$pengguna->prima_facie}}</td>
            <td scope="col">{{$pengguna->ditahan_kerja}}</td>
            <td scope="col">{{$pengguna->jawatan}}</td>
            <td scope="col">{{$pengguna->role}}</td>
            <td scope="col">{{$pengguna->status}}</td>


            <td scope="col">
              <a href="#" onclick="updateData({{$pengguna}})"><i class="fas fa-pen"></i></a>
              <a href="/pengguna" onclick="deleteData({{$pengguna}})"><i class="fas fa-trash"></i></a>
              </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/pengguna" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
              <h6 class="text-white">Pengguna</h6>
          </div>
          </br>
          <div class="card-body pt-0">
            <label for="">Name</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="name" value="">
            </div>
            <label for="">Email </label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="email" value="">
            </div>
            <label for="">Prima Facie</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="prima_facie" value="">
            </div>

            <label for="">Jawatan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="jawatan">
                <option value=""></option>
                <option value="user">Operator</option>
                <option value="superadmin">High Management</option>
              </select>


            </div>

            <label for="">Ditahan Kerja</label>
            <div class="input-group">
              <select class="form-control mb-3" name="ditahan_kerja">
                <option value=""></option>
                <option value="ya">Ya</option>
                <option value="tidak">Tidak</option>
              </select>

            </div>
            <label for="">Role</label>
            <div class="input-group">
              <select class="form-control mb-3" name="role">
                <option value=""></option>
                <option value="superadmin">Superadmin</option>
                <option value="pengguna">Pengguna</option>
              </select>

            </div>
            <label for="">Status </label>
            <div class="input-group">
              <select class="form-control mb-3" name="ditahan_kerja">
                <option value=""></option>
                <option value="ya">Aktif</option>
                <option value="tidak">Tidak aktif</option>
              </select>
            </div>
          

            <div id="info_pengguna_create"></div>

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
              <h6 class="text-white">Pengguna</h6>
          </div>
          </br>
          <div class="card-body pt-0">
            
            <label for="">Name</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="name" value="">
            </div>
            <label for="">Email </label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="email" value="">
            </div>
            <label for="">Prima Facie</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="prima_facie" value="">
            </div>

            <label for="">Jawatan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="jawatan">
                <option value=""></option>
                <option value="operator">Operator</option>
                <option value="high_management">High Management</option>
              </select>
            </div>

            <label for="">Ditahan Kerja</label>
            <div class="input-group">
              <select class="form-control mb-3" name="ditahan_kerja">
                <option value=""></option>
                <option value="ya">Ya</option>
                <option value="tidak">Tidak</option>
              </select>

            </div>
            <label for="">Role</label>
            <div class="input-group">
              <select class="form-control mb-3" name="role">
                <option value=""></option>
                <option value="superadmin">Superadmin</option>
                <option value="pengguna">Pengguna</option>
              </select>

            </div>
            <label for="">Status </label>
            <div class="input-group">
              <select class="form-control mb-3" name="ditahan_kerja">
                <option value=""></option>
                <option value="ya">Aktif</option>
                <option value="tidak">Tidak aktif</option>
              </select>
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
      $("#info_pengguna_form").hide();
      $("#button_tambah").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {

      $("#show").hide();

      $("#updateForm select[name=jawatan]").val(obj.jawatan);
      $("#updateForm input[name=name]").val(obj.name);
      $("#updateForm input[name=email]").val(obj.email );
      $("#updateForm input[name=prima_facie]").val(obj.prima_facie);
      $("#updateForm select[name=ditahan_kerja]").val(obj.ditahan_kerja);
      $("#updateForm select[name=role]").val(obj.role);
      $("#updateForm select[name=status ]").val(obj.status );

      $("#updateForm action").val("/pengguna/" + obj.id);      
      $("#updateForm").attr('action', "/pengguna/" + obj.id)

      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      $("#updateForm input[name=tindakan_diterima]").val(obj.tindakan_diterima);
      $("#updateForm input[name=pegawai_penerima]").val(obj.pegawai_penerima);
      $("#updateForm input[name=pembekal]").val(obj.pembekal);
      $("#updateForm input[name=status]").val(mode);
      $("#updateForm select[name=jenis_penolakan]").val(obj.jenis_penolakan);
      $("#updateForm select[name=no_rujukan_atk1]").val(obj.no_rujukan_atk1);


      $("#updateForm action").val("/pengguna/" + obj.id);      
      $("#updateForm").attr('action', "/pengguna/" + obj.id)
      
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
        url: "/pengguna/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/pengguna";;
				}
      })

    } 

    function tambahAsetUntukDitolak() {
      var option_data = ""
      for (let i=0; i < no_kod.length; i++) {
        option_data = option_data + `<option value=${no_kod[i].no_kod}>${no_kod[i].no_kod}</option>`
      }


     $("#info_pengguna_create").append(
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
