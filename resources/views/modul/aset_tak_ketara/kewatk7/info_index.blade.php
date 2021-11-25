@extends('layouts.base_atk') @section('content') 
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="/kewatk7">Kewatk7</a></li>
                <li class="breadcrumb-item"><a href="/kewatk7/{{$kewatk7->id}}">Info Kewatk7</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="container-fluid mt--6">

  <div id="show">
    <form id="create_form" method="POST" action="/kewatk7/{{$kewatk7->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Pemeriksaan</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
            <div class="row">
            <div class="col-4">
            <label for="">Tujuan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tujuan" value="{{$kewatk7->tujuan}}" required>
            </div>
            </div>

            <div class="col-4">
            <label for="">Pengeluar</label>
            <div class="input-group">
              <select class="form-control mb-3" name="pengeluar" required>
                <option value="{{$kewatk7->pengeluar}}">{{$kewatk7->pengeluar}}</option>
                @foreach ($pengeluars as $pengeluar)
                <option value="{{$pengeluar->name}}">{{$pengeluar->name}}</option>
                @endforeach
              </select>

            </div>
            </div>

            <div class="col-4">
            <label for="">Tempat Digunakan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="kod_lokasi" required>
                <option value="{{$kewatk7->kod_lokasi}}">{{$kewatk7->nama_lokasi->nama_lokasi}}</option>
                @foreach ($kod_lokasis as $kod_lokasi)
                <option value="{{$kod_lokasi->id}}">{{$kod_lokasi->nama_lokasi}}</option>
                @endforeach
              </select>
            </div>
            </div>
            </div>
            

          <button id="create_submit" class="btn-sm btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>

      <div id="info_kewatk1_create"></div>
  </form>

    <div class="card mt-4">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h2 class="mb-0">Info Pemeriksaan</h2>
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
              <th scope="col">No Siri Pendaftaran</th>
              <th scope="col">Tarikh Dipinjam</th>
              <th scope="col">Tarikh Pulang</th>
              <th scope="col">Catatan</th>
              <th scope="col">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kewatk7->info_kewatk7 as $ik7)
            <tr>
  


              <td scope="col">{{$loop->index + 1}}</td>
              <td scope="col">{{$ik7->no_siri_pendaftaran}}</td>
              <td scope="col">{{$ik7->tarikh_dipinjam}}</td>
              <td scope="col">{{$ik7->tarikh_pulang}}</td>
              <td scope="col">{{$ik7->catatan}}</td>
              <td scope="col">
                <a href="#" onclick="updateData({{$ik7}})"><i class="fas fa-pen"></i></a>
                <a href="/kewatk7/{{$ik7->no_permohonan_atk7}}" onclick="deleteData({{$ik7}})"><i class="fas fa-trash"></i></a>
              </td>
  
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

<div id="create" style="display: none;">
  <form method="POST" action="/info_kewatk7" enctype="multipart/form-data">
      @csrf
        <div class="card mt-4" id="basic-info">

            <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Info Pemeriksaan</h2>
               </div>
               <div class="text-end mr-2">
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
          <div class="row">
            <div class="col">
              <label for="">No Siri Pendaftaran</label>
              <select class="form-control mb-3" name="no_siri_pendaftaran" required>
                <option value="" required required selected disabled hidden>Pilih No Siri</option>
                @foreach ($kewatk3a as $k3)
                <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
                @endforeach
              </select>
            </div>



            <div class="col">
              <label for="">Tarikh Dipinjam</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_dipinjam" value="" required>
              </div>
            </div>
            <div class="col">
              <label for="">Tarikh Pulang</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_pulang" value="" required>
              </div>
            </div>

            <div class="col-4">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan" value="" required>
              </div>
            </div>

            <input class="form-control mb-3" type="hidden" name="no_permohonan_atk7" value="{{$kewatk7->id}}" required>

           </div>
          <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
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
                 <h2 class="mb-0">Sunting Info Pemeriksaan</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
          <div class="row">
              <div class="col">
                <label for="">No Siri Pendaftaran</label>
                <select class="form-control mb-3" name="no_siri_pendaftaran" required>
                  <option value="" required required selected disabled hidden>Pilih No Siri</option>
                  @foreach ($kewatk3a as $k3)
                  <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
                  @endforeach
                </select>
              </div>



              <div class="col">
                <label for="">Tarikh Dipinjam</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="date" name="tarikh_dipinjam" value="" required>
                </div>
              </div>
              <div class="col">
                <label for="">Tarikh Pulang</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="date" name="tarikh_pulang" value="" required>
                </div>
              </div>

              <div class="col-4">
                <label for="">Catatan</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="catatan" value="" required>
                </div>
              </div>

              <input class="form-control mb-3" type="hidden" name="no_permohonan_atk7" value="{{$kewatk7->id}}" required>

             </div>
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
      </div>  </form>
</div>
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
      console.log(obj);

      $("#show").hide();


      $("#updateForm input[name=catatan]").val(obj.catatan);
      $("#updateForm select[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);
      $("#updateForm input[name=tarikh_dipinjam]").val(obj.tarikh_dipinjam);
      $("#updateForm input[name=tarikh_pulang]").val(obj.tarikh_pulang);
      $("#updateForm action").val("/info_kewatk7/" + obj.id);      
      $("#updateForm").attr('action', "/info_kewatk7/" + obj.id);

      $("#updateDiv").show();

    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk7/" + id,
        type: "DELETE",
        success: function () {
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
