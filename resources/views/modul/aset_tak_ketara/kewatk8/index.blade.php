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
                <li class="breadcrumb-item"><a href="/kewatk8">Kewatk8</a></li>
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
            <h2 class="mb-0">Aduan Kerosakan</h2>
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

            <th scope="col">No Siri Pendaftaran</th>
            <th scope="col">Tajuk</th>
            <th scope="col">Tarikh Kerosakan</th>
            <th scope="col">Status</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kewatk8 as $k8)
          <tr>
            <td scope="col">{{$k8->no_siri_pendaftaran}}</td>
            <td scope="col">{{$k8->tajuk}}</td>
            <td scope="col">{{$k8->tarikh_kerosakan}}</td>

            @if ($k8->status=="DERAF") 
              <td scope="col"><span class="badge bg-warning">{{$k8->status}}</span></th>
            @elseif ($k8->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$k8->status}}</span></th>
            @elseif ($k8->status=="SOKONG") 
              <td scope="col"><span class="badge bg-warning">{{$k8->status}}</span></th>
            @elseif ($k8->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$k8->status}}</span></th>
            @elseif ($k8->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$k8->status}}</span></th>
            @endif
            
            @if ($k8->status=="DERAF") 
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk8" onclick="updateStatus({{$k8}}, 'LULUS')"><i class="fas fa-check-circle"></i></a>
              <a href="/kewatk8" onclick="updateStatus({{$k8}}, 'DITOLAK')"><i class="fas fa-times-circle"></i></a>
              <a onclick="cetakPdf()" href=""><i class="fas fa-print"></i></a>

              @else
              <a href="/kewatk8" onclick="updateStatus({{$k8}}, 'HANTAR')"><i class="fas fa-arrow-up"></i></a>
              <a href="#" onclick="updateData({{$k8}})"><i class="fas fa-pen"></i></a>
              <a onclick="cetakPdf()" href=""><i class="fas fa-print"></i></a>
              <a href="/kewatk8" onclick="deleteData({{$k8}})"><i class="fas fa-trash"></i></a>
              @endif
            </td>

            @elseif ($k8->status=="HANTAR" or $k8->status=="SOKONG") 
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk8" onclick="updateStatus({{$k8}}, 'SOKONG')"><i class="fas fa-arrow-up"></i></a>
              <a onclick="cetakPdf()" href=""><i class="fas fa-print"></i></a>
              <a href="#" onclick="updateData({{$k8}})"><i class="fas fa-pen"></i></a>

              @else
              <a onclick="cetakPdf()" href=""><i class="fas fa-print"></i></a>
              @endif
            </td>
            @endif


          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="create" style="display: none;">
  <form method="POST" action="/kewatk8" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Aduan</h2>
               </div>
             </div>
           </div>
          <div class="card-body pt-0">
            <label for="">No Siri Pendaftaran</label>
            <div class="input-group">
              <select class="form-control mb-3" name="no_siri_pendaftaran">
                <option value=""></option>
                @foreach ($kewatk3a as $k3)
                <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
                @endforeach
              </select>

            </div>

            <label for="">Tarikh Kerosakan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_kerosakan" value="">
            </div>
            <label for="">Perihal Kerosakan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="perihal_kerosakan" value="">
            </div>
            <label for="">Catatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="catatan" value="">
            </div>
            <label for="">Pengguna Terakhir</label>
            <div class="input-group">
              <select class="form-control mb-3" name="pengguna_terakhir">
                <option value=""></option>
                @foreach ($pengguna as $pg)
                <option value="{{$pg->name}}">{{$pg->name}}</option>
                @endforeach
              </select>

            </div>

            <!-- di isi oleh pegawai aset (update) -->
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="jumlah_kos" value="">
            </div>
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="anggaran_kos" value="">
            </div>
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="syor_ulasan" value="">
            </div>
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="tarikh_pegawai" value="">
            </div>
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="pegawai_aset" value="">
            </div>
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="ketua_jabatan" value="">
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
                 <h2 class="mb-0">Sunting Aduan</h2>
               </div>
             </div>
           </div>
          </br>
          <div class="card-body pt-0"> 

            <!-- edit untuk status deraf-->
            <label for="">No Siri Pendaftaran</label>
            <div class="input-group">
              <select class="form-control mb-3" name="no_siri_pendaftaran">
                <option value=""></option>
                @foreach ($kewatk3a as $k3)
                <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
                @endforeach
              </select>

            </div>
            
            <label for="">Tarikh Kerosakan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_kerosakan" value="">
            </div>
            <label for="">Perihal Kerosakan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="perihal_kerosakan" value="">
            </div>

            <label for="">Catatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="catatan" value="">
            </div>

            <label for="">Pengguna Terakhir</label>
            <div class="input-group">
              <select class="form-control mb-3" name="pengguna_terakhir">
                <option value=""></option>
                @foreach ($pengguna as $pg)
                <option value="{{$pg->name}}">{{$pg->name}}</option>
                @endforeach
              </select>

            </div>



            <!-- edit untuk status dihantar1 -->
            <div id="kewatk8_form_pegawai">
              <label for="">Jumlah Kos</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="jumlah_kos" value="">
              </div>
              <label for="">Anggaran Kos</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="anggaran_kos" value="">
              </div>
              <label for="">Syor Ulasan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="syor_ulasan" value="">
              </div>
            </div>
                  

            <!-- form auto fill -->
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="tarikh_aduan" value="">
            </div>

            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="ketua_jabatan" value="">
            </div>

            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="tajuk" value="">
            </div>

            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="tarikh_pegawai" value="">
            </div>

            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="status" value="">
            </div>

            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="pengadu" value="">
            </div>

            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="pegawai_aset" value="">
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
      $("#info_kewatk8_form").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {

      console.log($("#updateForm select[name=no_siri_pendaftaran]"));
      // get no siri pendaftaran
      ubahUpdateFormBerdasarkanStatus(obj);

      $("#show").hide();
      $("#updateForm input[name=tajuk]").val(obj.rajuk);
      $("#updateForm input[name=tarikh_kerosakan]").val(obj.tarikh_kerosakan);
      $("#updateForm input[name=perihal_kerosakan]").val(obj.perihal_kerosakan);
      $("#updateForm input[name=tarikh_aduan]").val(obj.tarikh_aduan);
      $("#updateForm input[name=catatan]").val(obj.catatan);
      $("#updateForm input[name=jumlah_kos]").val(obj.jumlah_kos);
      $("#updateForm input[name=anggaran_kos]").val(obj.anggaran_kos);
      $("#updateForm input[name=syor_ulasan]").val(obj.syor_ulasan);
      $("#updateForm input[name=tarikh_pegawai]").val(obj.tarikh_pegawai);
      $("#updateForm input[name=status]").val(obj.status);
      $("#updateForm input[name=pengadu]").val(obj.pengadu);
      $("#updateForm select[name=pengguna_terakhir]").val(obj.pengguna_terakhir);
      $("#updateForm select[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);
      $("#updateForm input[name=pegawai_aset]").val(obj.pegawai_aset);
      $("#updateForm input[name=ketua_jabatan]").val(obj.ketua_jabatan);
      
      $("#updateForm action").val("/kewatk8/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk8/" + obj.id)
      $("#updateDiv").show();
    }

    function updateStatus(obj, mode) {
      console.log(obj, mode)

      $("#updateForm input[name=status]").val(mode);

      $("#updateForm input[name=tajuk]").val(obj.rajuk);
      $("#updateForm input[name=tarikh_kerosakan]").val(obj.tarikh_kerosakan);
      $("#updateForm input[name=perihal_kerosakan]").val(obj.perihal_kerosakan);
      $("#updateForm input[name=tarikh_aduan]").val(obj.tarikh_aduan);
      $("#updateForm input[name=catatan]").val(obj.catatan);
      $("#updateForm input[name=jumlah_kos]").val(obj.jumlah_kos);
      $("#updateForm input[name=anggaran_kos]").val(obj.anggaran_kos);
      $("#updateForm input[name=syor_ulasan]").val(obj.syor_ulasan);
      $("#updateForm input[name=tarikh_pegawai]").val(obj.tarikh_pegawai);
      $("#updateForm input[name=status]").val(mode);
      $("#updateForm input[name=pengadu]").val(obj.pengadu);
      $("#updateForm select[name=pengguna_terakhir]").val(obj.pengguna_terakhir);
      $("#updateForm select[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);
      $("#updateForm input[name=pegawai_aset]").val(obj.pegawai_aset);
      $("#updateForm input[name=ketua_jabatan]").val(obj.ketua_jabatan);
      
      $("#updateForm action").val("/kewatk8/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk8/" + obj.id)
      
      var values = {};
      $.each($('#updateForm').serializeArray(), function(i, field) {
          values[field.name] = field.value;
      });

      var url = $("#updateForm").attr('action');
      console.log("v", values);

      $.ajax({
        type: "POST",
        url: url,
        data: values, // serializes the form's elements.
        success: function(data)
        {

        }
      });
    }
    function ubahUpdateFormBerdasarkanStatus(obj) {
      if (obj.status == "DERAF") {
        $("#kewatk8_form_pegawai").hide();
      } 
      
      if (obj.status == "HANTAR") {
        $("#kewatk8_form_pegawai").show();
      }


    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk8/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk8";;
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

    function cetakPdf() {
      window.open('http://127.0.0.1:8001/cetak/atk8')
    }

        


</script>

@endsection
