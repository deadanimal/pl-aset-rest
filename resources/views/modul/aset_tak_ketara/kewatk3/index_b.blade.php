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
                <li class="breadcrumb-item"><a href="">Kewatk3b</a></li>
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
            <h2 class="mb-0">Naik Taraf Aset</h2>
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
            <th scope="col">Kos</th>
            <th scope="col">Nilai Semasa</th>
            <th scope="col">Tempoh Jaminan</th>
            <th scope="col">No Siri Pendaftaran</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kewatk3b as $kewatk3b)
          <tr>

            <td scope="col">{{$loop->index + 1}}</td>
            <td scope="col">{{$kewatk3b->kos}}</td>
            <td scope="col">{{$kewatk3b->nilai_semasa}}</td>
            <td scope="col">{{$kewatk3b->tempoh_jaminan}}</td>
            <td scope="col">{{$kewatk3b->no_siri_pendaftaran}}</td>



            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk3b" onclick="updateStatus({{$kewatk3b}}, 'LULUS')"><i class="fas fa-check-circle"></i></a>
              <a href="/kewatk3b" onclick="updateStatus({{$kewatk3b}}, 'DITOLAK')"><i class="fas fa-times-circle"></i></a>
              <a href="/kewatk3bpdf/"><i class="fas fa-print"></i></a>
              @else
              
              <!-- disable edit after submit -->              
              @if($kewatk3b->status=="HANTAR")
              @else
              <a href="#" onclick="updateData({{$kewatk3b}})"><i class="fas fa-pen"></i></a>
              @endif

              <a href="/kewatk3bpdf/{{$kewatk3b->id}}"><i class="fas fa-print"></i></a>
              <a href="/kewatk3b" onclick="deleteData({{$kewatk3b}})"><i class="fas fa-trash"></i></a>
              @endif
              </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk3b" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Naik Taraf Aset</h2>
               </div>
             </div>
           </div>

          <br>
          <div class="card-body pt-0">
            <div class="row">
            <div class="col-4">
            <label for="">Kos</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kos" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Nilai Semasa</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nilai_semasa" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Tempoh Jaminan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tempoh_jaminan" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Dipasang</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_dipasang" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Dikeluarkan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_dikeluarkan" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Dilupus Hapus</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_dilupus_hapus" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Catatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="catatan" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Status</label>
            <div class="input-group">
              <select class="form-control mb-3" name="status" required>

                <option value="" selected disabled hidden>Pilih Status</option>
                <option value="Asal">Asal</option>
                <option value="Tambah">Tambah</option>
                <option value="Naik Taraf">Naik Taraf</option>
                <option value="Ganti">Ganti</option>
              </select>

            </div>
            </div>


            <div class="col-4">
            <div class="input-group">
              <label for="">No Siri Pendaftaran</label>
              <div class="input-group">
                <select class="form-control mb-3" name="no_siri_pendaftaran" required>
                  <option value="" selected disabled hidden>Pilih No Siri</option>
                  @foreach ($kewatk3a as $kew3)
                  <option value="{{$kew3->no_siri_pendaftaran}}">{{$kew3->no_siri_pendaftaran}}</option>
                  @endforeach
                </select>
              </div>


            </div>

            </div>
            </div>
            
            <div id="info_kewatk3b_create"></div>

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
                 <h2 class="mb-0">Sunting Naik Taraf Aset</h2>
               </div>
             </div>
           </div>
          </br>
          <div class="card-body pt-0"> 
            <div class="row">
            <div class="col-4">
            <label for="">Kos</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kos" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Nilai Semasa</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nilai_semasa" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Tempoh Jaminan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tempoh_jaminan" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Dipasang</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_dipasang" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Dikeluarkan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_dikeluarkan" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Dilupus Hapus</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_dilupus_hapus" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Catatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="catatan" value="" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Status</label>
            <div class="input-group">
              <select class="form-control mb-3" name="status" required>

                <option value="" selected disabled hidden>Pilih Status</option>
                <option value="Asal">Asal</option>
                <option value="Tambah">Tambah</option>
                <option value="Naik Taraf">Naik Taraf</option>
                <option value="Ganti">Ganti</option>
              </select>

            </div>
            </div>


            <div class="col-4">
            <label for="">No Siri Pendaftaran</label>
            <div class="input-group">
              <select class="form-control mb-3" name="no_siri_pendaftaran" required>

                <option value="" selected disabled hidden>Pilih No Siri</option>
                @foreach ($kewatk3a as $kew3)
                <option value="{{$kew3->no_siri_pendaftaran}}">{{$kew3->no_siri_pendaftaran}}</option>
                @endforeach
              </select>
            </div>

          </div>

      </div>

          <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
  </form>
</div>
</div>


<script type="text/javascript">
    
    var no_kod = [];

    $(document).ready(function () {
      initiateDatatable();
      $("#info_kewatk3b_form").hide();
      $("#button_tambah").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {

      $("#show").hide();

      $("#updateForm input[name=kos]").val(obj.kos);
      $("#updateForm input[name=nilai_semasa]").val(obj.nilai_semasa);
      $("#updateForm input[name=tempoh_jaminan]").val(obj.tempoh_jaminan);
      $("#updateForm input[name=tarikh_dipasang]").val(obj.tarikh_dipasang);
      $("#updateForm input[name=tarikh_dikeluarkan]").val(obj.tarikh_dikeluarkan);
      $("#updateForm input[name=tarikh_dilupus_hapus]").val(obj.tarikh_dilupus_hapus);
      $("#updateForm input[name=catatan]").val(obj.catatan);
      $("#updateForm input[name=staff_id]").val(obj.staff_id);
      $("#updateForm select[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);      
      $("#updateForm select[name=status]").val(obj.status);      

      $("#updateForm action").val("/kewatk3b/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk3b/" + obj.id)
      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      $("#updateForm input[name=kos]").val(obj.kos);
      $("#updateForm input[name=nilai_semasa]").val(obj.nilai_semasa);
      $("#updateForm input[name=tempoh_jaminan]").val(obj.tempoh_jaminan);
      $("#updateForm input[name=tarikh_dipasang]").val(obj.tarikh_dipasang);
      $("#updateForm input[name=tarikh_dikeluarkan]").val(obj.tarikh_dikeluarkan);
      $("#updateForm input[name=tarikh_dilupus_hapus]").val(obj.tarikh_dilupus_hapus);
      $("#updateForm input[name=catatan]").val(obj.catatan);
      $("#updateForm select[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);      

      $("#updateForm action").val("/kewatk3b/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk3b/" + obj.id)
      
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
        url: "/kewatk3b/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk3b";;
				}
      })

    } 

    function tambahAsetUntukDitolak() {
      var option_data = ""
      for (let i=0; i < no_kod.length; i++) {
        option_data = option_data + `<option value=${no_kod[i].no_kod}>${no_kod[i].no_kod}</option>`
      }


     $("#info_kewatk3b_create").append(
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
                <input class="form-control mb-3" type="text" name="kuantiti_ditolak[]" value="" required>
              </div>
            </div>

            <div class="col">
              <label for="">Kuantiti Kurang Lebih</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih[]" value="" required>
              </div>
            </div>

            <div class="col">
              <label for="">Sebab Penolakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="sebab_penolakan[]" value="" required>
              </div>
            </div>

            <div class="col">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan[]" value="" required>
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
        url: "/info_kewatk3b/" + obj.value,
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
