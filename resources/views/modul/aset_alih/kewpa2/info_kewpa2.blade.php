@extends('layouts.base_pa') @section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                <li class="breadcrumb-item"><a href="/kewpa2">Kewpa2</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="container-fluid mt--6">
<div id="show">
    <form id="create_form" method="POST" action="/kewpa2" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Penolakan Aset</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-4">
              <label for="">Tindakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="tindakan" value="{{$kewpa2->tindakan}}" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">No Rujukan KEWPA 1</label>
              <div class="input-group">
              <select id="selected_kewpa1" class="form-control mb-3" name="rujukan_kewpa1_id" required disabled>
                  <option value="{{$kewpa2->rujukan_kewpa1_id}}" selected>Kewpa1 - No Rujukan: {{$kewpa2->rujukan_kewpa1_id}}</option>
                  @foreach ($kewpa1 as $kp1)
                  <option value="{{$kp1->id}}">Kewpa1 - No Rujukan: {{$kp1->id}}</option>
                  @endforeach
              </select>
              </div>
            </div>
          </div>

          <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetPenerimaan()" >Tambah Aset</a>
          <button id="create_submit" class="btn-sm btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>

      <div id="info_kewpa2_create"></div>
  </form>
  <div class="card mt-4">
    <div class="card-header">
        <div class="row">
          <div class="col">
            <h2 class="mb-0">Info Penolakan Aset</h2>
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

            <th scope="col">No Rujukan Info Kewpa 1</th>
            <th scope="col">Kuantiti Ditolak</th>
            <th scope="col">Kuantiti Kurang Lebih</th>
            <th scope="col">Sebab Penolakan</th>
            <th scope="col">Catatan</th>
            <th scope="col">Tindakan</th> </tr>
        </thead>
        <tbody>
          @foreach ($kewpa2->info_kewpa2 as $info_kewpa2)
          <tr>


            <td scope="col">No Rujukan: {{$info_kewpa2->info_kewpa1_id}}</td>
            <td scope="col">{{$info_kewpa2->kuantiti_ditolak}}</td>
            <td scope="col">{{$info_kewpa2->kuantiti_kurang_lebih}}</td>
            <td scope="col">{{$info_kewpa2->sebab_penolakan}}</td>
            <td scope="col">{{$info_kewpa2->catatan}}</td>

            <td scope="col">
              <a href="#" onclick="updateData({{$info_kewpa2}})"><i class="fas fa-pen"></i></a>
              <a href="/kewpa2/{{$info_kewpa2->rujukan_kewpa2}}" onclick="deleteData({{$info_kewpa2}})"><i class="fas fa-trash"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/info_kewpa2" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Info Penolakan Aset</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">

          <div class="row">
            <div class="col-4">
              <label for="">Info Kewpa 1</label>
              <div class="input-group">
                <select id="info_kewpa1_select" class="form-control mb-3" name="info_kewpa1_id" required>
                  <option value="" selected disabled hidden>sila pilih</option>
                  
                  @foreach ($kewpa2->kewpa1->info_kewpa1 as $kp1)
                  <option value="{{$kp1->id}}">Kewpa1 - No Rujukan: {{$kp1->id}}</option>
                  @endforeach

                </select>

              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Ditolak</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_ditolak" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Kurang Lebih</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Sebab Penolakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="sebab_penolakan" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan" value="" required>
              </div>
            </div>

            <input class="form-control mb-3" type="hidden" name="rujukan_kewpa2" value="{{$kewpa2->id}}">
            <input class="form-control mb-3" type="hidden" name="rujukan_kewpa1_id" value="{{$kewpa2->rujukan_kewpa1_id}}">

          </div>

          <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" action="/info_kewpa2" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Info Penolakan Aset</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">

          <div class="row">
            <div class="col-4">
              <label for="">Info Kewpa 1</label>
              <div class="input-group">
                <select id="info_kewpa1_select" class="form-control mb-3" name="info_kewpa1_id" required>
                  <option value="" selected disabled hidden>sila pilih</option>
                  @foreach ($kewpa2->kewpa1->info_kewpa1 as $kp1)
                  <option value="{{$kp1->id}}">Kewpa1 - No Rujukan: {{$kp1->id}}</option>
                  @endforeach
                </select>

              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Ditolak</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_ditolak" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Kurang Lebih</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Sebab Penolakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="sebab_penolakan" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan" value="" required>
              </div>
            </div>

            <input class="form-control mb-3" type="hidden" name="rujukan_kewpa2" value="{{$kewpa2->id}}">

          </div>

          <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
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

      $("#show").hide();

      $("#updateForm input[name=kuantiti_ditolak]").val(obj.kuantiti_ditolak);
      $("#updateForm input[name=kuantiti_kurang_lebih]").val(obj.kuantiti_kurang_lebih);
      $("#updateForm input[name=sebab_penolakan]").val(obj.sebab_penolakan);
      $("#updateForm input[name=catatan]").val(obj.catatan);
      $("#updateForm select[name=info_kewpa1_id]").val(obj.info_kewpa1_id);

      $("#updateForm action").val("/info_kewpa2/" + obj.id);      
      $("#updateForm").attr('action', "/info_kewpa2/" + obj.id);

      $("#updateDiv").show();

    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewpa2/" + id,
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
