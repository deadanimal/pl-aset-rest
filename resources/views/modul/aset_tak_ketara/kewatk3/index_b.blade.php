@extends('layouts.base') @section('content')
<div id="show">

  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">KEWATK 3B</h6>
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
            <th scope="col">Kos</th>
            <th scope="col">Nilai Semasa</th>
            <th scope="col">Tempoh Jaminan</th>
            <th scope="col">Status</th>
            <th scope="col">Tarikh Dipasang</th>
            <th scope="col">Tarikh Dikeluarkan</th>
            <th scope="col">Tarikh Dilupus Hapus</th>
            <th scope="col">Catatan</th>
            <th scope="col">Staff Id</th>
            <th scope="col">No Siri Pendaftaran</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kewatk3b as $kewatk3b)
          <tr>
            <td scope="col">{{$kewatk3b->kos}}</td>
            <td scope="col">{{$kewatk3b->nilai_semasa}}</td>
            <td scope="col">{{$kewatk3b->tempoh_jaminan}}</td>
            <td scope="col">{{$kewatk3b->status}}</td>
            <td scope="col">{{$kewatk3b->tarikh_dipasang}}</td>
            <td scope="col">{{$kewatk3b->tarikh_dikeluarkan}}</td>
            <td scope="col">{{$kewatk3b->tarikh_dilupus_hapus}}</td>
            <td scope="col">{{$kewatk3b->catatan}}</td>
            <td scope="col">{{$kewatk3b->staff_id}}</td>
            <td scope="col">{{$kewatk3b->no_siri_pendaftaran}}</td>



            @if ($kewatk3b->status=="DRAFT") 
              <td scope="col"><span class="badge bg-warning">{{$kewatk3b->status}}</span></th>
            @elseif ($kewatk3b->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$kewatk3b->status}}</span></th>
            @elseif ($kewatk3b->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$kewatk3b->status}}</span></th>
            @elseif ($kewatk3b->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$kewatk3b->status}}</span></th>
            @endif
            
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk3b" onclick="updateStatus({{$kewatk3b}}, 'LULUS')"><i class="fas fa-check-circle"></i></a>
              <a href="/kewatk3b" onclick="updateStatus({{$kewatk3b}}, 'DITOLAK')"><i class="fas fa-times-circle"></i></a>
              <a href="/kewatk3bpdf/"><i class="fas fa-print"></i></a>
              @else
              <a href="/kewatk3b" onclick="updateStatus({{$kewatk3b}}, 'HANTAR')"><i class="fas fa-arrow-up"></i></a>
              
              <!-- disable edit after submit -->              
              @if($kewatk3b->status=="HANTAR")
              @else
              <a href="/kewatk3b/{{$kewatk3b->id}}"><i class="fas fa-file"></i></a>
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
          <div class="card-header" style="
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
              <h6 class="text-white">KEWATK 3B</h6>
          </div>
          </br>
          <div class="card-body pt-0">
            <label for="">Kos</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kos" value="">
            </div>
            <label for="">Nilai Semasa</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nilai_semasa" value="">
            </div>
            <label for="">Tempoh Jaminan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tempoh_jaminan" value="">
            </div>
            <label for="">Status</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="status" value="">
            </div>
            <label for="">Tarikh Dipasang</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tarikh_dipasang" value="">
            </div>
            <label for="">Tarikh Dikeluarkan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tarikh_dikeluarkan" value="">
            </div>
            <label for="">Tarikh Dilupus Hapus</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tarikh_dilupus_hapus" value="">
            </div>
            <label for="">Catatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="catatan" value="">
            </div>
            <label for="">Staff Id</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="staff_id" value="">
            </div>
            <label for="">No Siri Pendaftaran</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="no_siri_pendaftaran" value="">
            </div>
            
            <div id="info_kewatk3b_create"></div>

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
              <h6 class="text-white">KEWATK 3B</h6>
          </div>
          </br>
          <div class="card-body pt-0"> <label for="">Tindakan Diterima</label>
            <label for="">Kos</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kos" value="">
            </div>
            <label for="">Nilai Semasa</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nilai_semasa" value="">
            </div>
            <label for="">Tempoh Jaminan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tempoh_jaminan" value="">
            </div>
            <label for="">Status</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="status" value="">
            </div>
            <label for="">Tarikh Dipasang</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tarikh_dipasang" value="">
            </div>
            <label for="">Tarikh Dikeluarkan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tarikh_dikeluarkan" value="">
            </div>
            <label for="">Tarikh Dilupus Hapus</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tarikh_dilupus_hapus" value="">
            </div>
            <label for="">Catatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="catatan" value="">
            </div>
            <label for="">Staff Id</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="staff_id" value="">
            </div>
            <label for="">No Siri Pendaftaran</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="no_siri_pendaftaran" value="">
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
      $("#info_kewatk3b_form").hide();
      $("#button_tambah").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {

      $("#show").hide();

      $("#updateForm input[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);
      $("#updateForm input[name=agensi]").val(obj.agensi);
      $("#updateForm input[name=bahagian]").val(obj.bahagian);
      $("#updateForm input[name=kod_nasional]").val(obj.kod_nasional);
      $("#updateForm input[name=kategori]").val(obj.kategori);
      $("#updateForm input[name=sub_kategori]").val(obj.sub_kategori);
      $("#updateForm input[name=jenis]").val(obj.jenis);
      $("#updateForm input[name=rajuk]").val(obj.rajuk);
      $("#updateForm input[name=nombor_dalam_negara]").val(obj.nombor_dalam_negara);
      $("#updateForm input[name=nombor_luar_negara]").val(obj.nombor_luar_negara);
      $("#updateForm input[name=tarikh_lulus_luput_dalam]").val(obj.tarikh_lulus_luput_dalam);
      $("#updateForm input[name=tarikh_lulus_luput_luar]").val(obj.tarikh_lulus_luput_luar);
      $("#updateForm input[name=tarikh_permohonan_dalam]").val(obj.tarikh_permohonan_dalam);
      $("#updateForm input[name=tarikh_permohonan_luar]").val(obj.tarikh_permohonan_luar);
      $("#updateForm input[name=tarikh_cipta_dalam]").val(obj.tarikh_cipta_dalam);
      $("#updateForm input[name=usia_guna]").val(obj.usia_guna);
      $("#updateForm input[name=spesifikasi]").val(obj.spesifikasi);
      $("#updateForm input[name=harga_perolehan_asal]").val(obj.harga_perolehan_asal);
      $("#updateForm input[name=tarikh_dibeli]").val(obj.tarikh_dibeli);
      $("#updateForm input[name=no_pesanan]").val(obj.no_pesanan);
      $("#updateForm input[name=tempoh_jaminan]").val(obj.tempoh_jaminan);
      $("#updateForm input[name=nama_pembekal]").val(obj.nama_pembekal);
      $("#updateForm input[name=alamat_pembekal]").val(obj.alamat_pembekal);
      $("#updateForm input[name=staff_id]").val(obj.staff_id);
      $("#updateForm input[name=ketua_jabatan]").val(obj.ketua_jabatan);      

      $("#updateForm action").val("/kewatk3b/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk3b/" + obj.id)
      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      $("#updateForm input[name=kos]").val(obj.kos);
      $("#updateForm input[name=nilai_semasa]").val(obj.nilai_semasa);
      $("#updateForm input[name=tempoh_jaminan]").val(obj.tempoh_jaminan);
      $("#updateForm input[name=status]").val(obj.status);
      $("#updateForm input[name=tarikh_dipasang]").val(obj.tarikh_dipasang);
      $("#updateForm input[name=tarikh_dikeluarkan]").val(obj.tarikh_dikeluarkan);
      $("#updateForm input[name=tarikh_dilupus_hapus]").val(obj.tarikh_dilupus_hapus);
      $("#updateForm input[name=catatan]").val(obj.catatan);
      $("#updateForm input[name=staff_id]").val(obj.staff_id);
      $("#updateForm input[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);      

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
