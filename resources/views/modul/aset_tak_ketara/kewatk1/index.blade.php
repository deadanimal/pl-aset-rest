@extends('layouts.base') @section('content')

<div id="show">
  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">KEWATK 1</h6>
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
            <th scope="col">Nama Pembekal</th>
            <th scope="col">Maklumat Pengangkutan</th>
            <th scope="col">Pegawai Penerima</th>
            <th scope="col">Pegawai Pakar</th>
            <th scope="col">Status</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kewatk1 as $kewatk1)
          <tr>
            <td scope="col">{{$kewatk1->nama_pembekal}}</th>
            <td scope="col">{{$kewatk1->maklumat_pengangkutan}}</th>
            <td scope="col">{{$kewatk1->pegawai_penerima}}</th>
            <td scope="col">{{$kewatk1->pegawai_pakar}}</th>

            @if ($kewatk1->status=="DRAFT") 
              <td scope="col"><span class="badge bg-warning">{{$kewatk1->status}}</span></th>
            @elseif ($kewatk1->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$kewatk1->status}}</span></th>
            @elseif ($kewatk1->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$kewatk1->status}}</span></th>
            @elseif ($kewatk1->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$kewatk1->status}}</span></th>
            @endif
            
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk1" onclick="updateStatus({{$kewatk1}}, 'LULUS')"><i class="fas fa-check-circle"></i></a>
              <a href="/kewatk1" onclick="updateStatus({{$kewatk1}}, 'DITOLAK')"><i class="fas fa-times-circle"></i></a>
              <a href="/kewatk1pdf/"><i class="fas fa-print"></i></a>
              @else
              <a href="/kewatk1" onclick="updateStatus({{$kewatk1}}, 'HANTAR')"><i class="fas fa-arrow-up"></i></a>
              
              <!-- disable edit after submit -->              
              @if($kewatk1->status=="HANTAR")
              @else
              <a href="/kewatk1/{{$kewatk1->id}}"><i class="fas fa-file"></i></a>
              <a href="#" onclick="updateData({{$kewatk1}})"><i class="fas fa-pen"></i></a>
              @endif

              <a href="/kewatk1pdf/{{$kewatk1->id}}"><i class="fas fa-print"></i></a>
              <a href="/kewatk1" onclick="deleteData({{$kewatk1}})"><i class="fas fa-trash"></i></a>
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
  <form method="POST" action="/kewatk1" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
              <h6 class="text-white">KEWATK 1</h6>
          </div>
          </br>
          <div class="card-body pt-0">
            <label for="">Nama Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nama_pembekal" value="">
            </div>
            <label for="">Alamat Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="alamat_pembekal" value="">
            </div>
            <label for="">Jenis Penerimaan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="jenis_penerimaan" value="">
            </div>
            <label for="">No Pk</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="no_pk" value="">
            </div>
            <label for="">Tarikh Pk</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_pk" value="">
            </div>
            <label for="">No Do</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="no_do" value="">
            </div>
            <label for="">Tarikh Do</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_do" value="">
            </div>
            <label for="">Maklumat Pengangkutan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="maklumat_pengangkutan" value="">
            </div>
            <label for="">Pegawai Pakar</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="pegawai_pakar" value="">
            </div>
            <hr> 
            <h6>Info Kewatk 1</h6>
            <hr> 
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
            <label for="">Nama Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nama_pembekal" value="">
            </div>
            <label for="">Alamat Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="alamat_pembekal" value="">
            </div>
            <label for="">Jenis Penerimaan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="jenis_penerimaan" value="">
            </div>
            <label for="">No Pk</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="no_pk" value="">
            </div>
            <label for="">Tarikh Pk</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_pk" value="">
            </div>
            <label for="">No Do</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="no_do" value="">
            </div>
            <label for="">Tarikh Do</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_do" value="">
            </div>
            <label for="">Maklumat Pengangkutan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="maklumat_pengangkutan" value=""> 
              </div>
             <label for="">Pegawai Penerima</label> <div class="input-group">
              <input class="form-control mb-3" type="text" name="pegawai_penerima" value="" disabled>
            </div>
            <label for="">Pegawai Pakar</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="pegawai_pakar" value="">
            </div>
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="status" value="">
            </div>

          <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div> </form>
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

      $("#updateForm input[name=no_rujukan_atk1]").val(obj.no_rujukan_atk1);
      $("#updateForm input[name=nama_pembekal]").val(obj.nama_pembekal);
      $("#updateForm input[name=alamat_pembekal]").val(obj.alamat_pembekal);
      $("#updateForm input[name=jenis_penerimaan]").val(obj.jenis_penerimaan);
      $("#updateForm input[name=no_pk]").val(obj.no_pk);
      $("#updateForm input[name=tarikh_pk]").val(obj.tarikh_pk);
      $("#updateForm input[name=no_do]").val(obj.no_do);
      $("#updateForm input[name=tarikh_do]").val(obj.tarikh_do);
      $("#updateForm input[name=maklumat_pengangkutan]").val(obj.maklumat_pengangkutan);
      $("#updateForm input[name=pegawai_penerima]").val(obj.pegawai_penerima);
      $("#updateForm input[name=pegawai_pakar]").val(obj.pegawai_pakar);
      $("#updateForm input[name=status]").val(obj.status);

      $("#updateForm action").val("/kewatk1/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk1/" + obj.id)

      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      $("#updateForm input[name=no_rujukan_atk1]").val(obj.no_rujukan_atk1);
      $("#updateForm input[name=nama_pembekal]").val(obj.nama_pembekal);
      $("#updateForm input[name=alamat_pembekal]").val(obj.alamat_pembekal);
      $("#updateForm input[name=jenis_penerimaan]").val(obj.jenis_penerimaan);
      $("#updateForm input[name=no_pk]").val(obj.no_pk);
      $("#updateForm input[name=tarikh_pk]").val(obj.tarikh_pk);
      $("#updateForm input[name=no_do]").val(obj.no_do);
      $("#updateForm input[name=tarikh_do]").val(obj.tarikh_do);
      $("#updateForm input[name=maklumat_pengangkutan]").val(obj.maklumat_pengangkutan);
      $("#updateForm input[name=pegawai_penerima]").val(obj.pegawai_penerima);
      $("#updateForm input[name=pegawai_pakar]").val(obj.pegawai_pakar);
      $("#updateForm input[name=status]").val(mode);

      $("#updateForm action").val("/kewatk1/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk1/" + obj.id)
      
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
          console.log(data);
        }
      });
    
    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk1/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk1";;
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
