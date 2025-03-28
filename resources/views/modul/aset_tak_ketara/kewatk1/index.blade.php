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
                <li class="breadcrumb-item"><a href="/kewakt1">Kewatk1</a></li>
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
            <h2 class="mb-0">Penerimaan Aset</h2>
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
              <td scope="col">{{$kewatk1->pg_penerima->name}}</th>
              <td scope="col">{{$kewatk1->pg_pakar->name}}</th>
  
              @if ($kewatk1->status=="DERAF") 
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
                <a href="/kewatk1pdf/{{$kewatk1->id}}"><i class="fas fa-print"></i></a>
                @else
                <a href="/kewatk1" onclick="updateStatus({{$kewatk1}}, 'HANTAR')"><i class="fas fa-arrow-up"></i></a>
                
                <!-- disable edit after submit -->              
                @if($kewatk1->status=="HANTAR")
                @else
                <a href="/kewatk1/{{$kewatk1->id}}" ><i class="fas fa-pen"></i></a>
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
<div>


<div id="create" style="display: none;">
  <form id="create_form" method="POST" action="/kewatk1" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Penerimaan Aset</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-4">
                <label for="">Nama Pembekal<span></span></label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="nama_pembekal" value="" required>
                </div>
              </div>

              <div class="col-4">
                <label for="">Alamat Pembekal</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="alamat_pembekal" value="" required required>
                </div>
              </div>

              <div class="col-4">
                <label for="">Jenis Penerimaan</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="jenis_penerimaan" value="" required>
                </div>
              </div>

              <div class="col-4">
                <label for="">No Pk</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="no_pk" value="" required>
                </div>
              </div>

              <div class="col-4">
                <label for="">Tarikh Pk</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="date" name="tarikh_pk" value="" required>
                </div>
              </div>

              <div class="col-4">
                <label for="">No Do</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="no_do" value="" required>
                </div>
              </div>

              <div class="col-4">
                <label for="">Tarikh Do</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="date" name="tarikh_do" value="" required>
                </div>
              </div>

              <div class="col-4">
                <label for="">Maklumat Pengangkutan</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="maklumat_pengangkutan" value="" required>
                </div>
              </div>

              <div class="col-4">
                <label for="">Pegawai Pakar</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="pegawai_pakar" required>
                    <option value="" required selected disabled hidden>Pilih Pegawai</option>
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

          <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetPenerimaan()" >Tambah Aset</a>
          <button id="create_submit" class="btn-sm btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>

      <div id="info_kewatk1_create"></div>
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
                 <h2 class="mb-0">Sunting Info Penerimaan Aset</h2>
               </div>
             </div>
           </div>
          </br>
          <div class="card-body pt-0">
            <label for="">Nama Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nama_pembekal" value="" required>
            </div>
            <label for="">Alamat Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="alamat_pembekal" value="" required>
            </div>
            <label for="">Jenis Penerimaan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="jenis_penerimaan" value="" required>
            </div>
            <label for="">No Pk</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="no_pk" value="" required>
            </div>
            <label for="">Tarikh Pk</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_pk" value="" required>
            </div>
            <label for="">No Do</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="no_do" value="" required>
            </div>
            <label for="">Tarikh Do</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_do" value="" required>
            </div>
            <label for="">Maklumat Pengangkutan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="maklumat_pengangkutan" value="" required> 
              </div>
             <label for="">Pegawai Penerima</label> <div class="input-group">
              <select class="form-control mb-3" name="pegawai_penerima" required>
                <option value="" required selected disabled hidden>Pilih Pegawai</option>
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->nama}}</option>
                @endforeach
              </select>

            </div>
            <label for="">Pegawai Pakar</label>
            <div class="input-group">
              <select class="form-control mb-3" name="pegawai_pakar">
                <option value="" required selected disabled hidden>Pilih Pegawai</option>
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->nama}}</option>
                @endforeach
              </select>

            </div>
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="status" value="" required>
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
      tambahAsetPenerimaan();
    });


    $(document).ready(function() {
      $("#create_form").validate();
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

    function tambahAsetPenerimaan() {

      $("#info_kewatk1_create").append(

        `
          <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Info Penerimaan</h2>
               </div>
              <div class="text-end mr-2">
                <a class="align-self-end btn btn-sm btn-primary text-white" onclick="$(this).closest('.card').remove()">Buang</a>
              </div>

             </div>
           </div>

          <div class="card-body pt-0">

          <br>
          <div class="row">
            <div class="col-4">
              <label for="">Keterangan Aset</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="keterangan_aset[]" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Medium</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="medium[]" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Dipesan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_dipesan[]" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Do</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_do[]" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Diterima</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_diterima[]" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan[]" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">No Kod</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="no_kod[]" value="" required>
              </div>
            </div>    
           </div>
         </div>

         </div>
         </div>

      `
      );

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
