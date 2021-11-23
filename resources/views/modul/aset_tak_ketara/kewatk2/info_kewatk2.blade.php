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
                <li class="breadcrumb-item"><a href="/kewatk2">Kewatk2</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="container-fluid mt--6">
<div id="show">
    <form method="POST" action="/kewatk2/{{$kewatk2->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Info Penolakan Aset</h2>
               </div>
             </div>
           </div>
          </br>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-4">
                <label for="">Tindakan Diterima</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="tindakan_diterima" value="{{$kewatk2->tindakan_diterima}}" required>
                </div>
              </div>
                  


              <div class="col-4">
                <label for="">Pembekal</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="pembekal" value="{{$kewatk2->pembekal}}" required>
                </div>
              </div>

              <div class="col-4">
                <label for="">Jenis Penolakan</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="jenis_penolakan">
                    <option value="{{$kewatk2->jenis_penolakan}}" required>{{$kewatk2->jenis_penolakan}}</option>
                    <option value="ditolak">ditolak</option>
                    <option value="kurang">kurang</option>
                    <option value="lebih">lebih</option>
                  </select>
                </div>
              </div>

              <div class="col-4">
              <label for="">No Rujukan Kewatk1</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="no_rujukan_atk1">
                    <option value="{{$kewatk2->no_rujukan_atk1}}" required>Kewatk1 - No Rujukan: {{$kewatk2->no_rujukan_atk1}}</option>
                    @foreach ($kewatk1 as $kew1)
                    <option value="{{$kew1->id}}">Kewatk1 - No Rujukan: {{$kew1->id}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          


          <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>

     <div id="info_kewatk2_create"></div>
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
            <th scope="col">Kuantiti Ditolak</th>
            <th scope="col">Kuantiti Kurang Lebih</th>
            <th scope="col">Sebab Penolakan</th>
            <th scope="col">Catatan</th>
            <th scope="col">Tindakan</th> </tr>
        </thead>
        <tbody>
          @foreach ($info_kewatk2 as $info_kewatk2)
          <tr>

            <td scope="col">{{$info_kewatk2->kuantiti_ditolak}}</td>
            <td scope="col">{{$info_kewatk2->kuantiti_kurang_lebih}}</td>
            <td scope="col">{{$info_kewatk2->sebab_penolakan}}</td>
            <td scope="col">{{$info_kewatk2->catatan}}</td>

            <td scope="col">
              <a href="#" onclick="updateData({{$info_kewatk2}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk2/{{$info_kewatk2->no_rujukan_atk2}}" onclick="deleteData({{$info_kewatk2}})"><i class="fas fa-trash"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/info_kewatk2" enctype="multipart/form-data">
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
                <label for="">No Kod</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="no_kod" required>
                    <option value="" required selected disabled hidden>Pilih Aset</option>
                    @foreach ($info_kewatk1 as $ik1)
                    <option value="{{$ik1->id}}">{{$ik1->no_kod}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

            <div class="col-4">
              <label for="">Kuantiti Ditolak</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_ditolak" value="">
              </div>
            </div>

            <div class="col-4">
              <label for="">Kuantiti Kurang Lebih</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih" value="">
              </div>
            </div>

            <div class="col-4">
              <label for="">Sebab Penolakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="sebab_penolakan" value="">
              </div>
            </div>

            <div class="col-4">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan" value="">
              </div>
            </div>

            <input class="form-control mb-3" type="hidden" name="no_rujukan_atk2" value="{{$kewatk2->id}}">

          </div>

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
                 <h2 class="mb-0">Tambah Info Penolakan Aset</h2>
               </div>
             </div>
           </div>
          <br>
          <div class="card-body pt-0">
          <div class="row">
              <div class="col-4">
                <label for="">No Kod</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="no_kod" required>
                    @foreach ($info_kewatk1 as $ik1)
                    <option value="{{$ik1->id}}">{{$ik1->no_kod}}</option>
                    @endforeach
                  </select>
                </div>
              </div>


            <div class="col-4">
              <label for="">Kuantiti Ditolak</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_ditolak" value="">
              </div>
            </div>

            <div class="col-4">
              <label for="">Kuantiti Kurang Lebih</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih" value="">
              </div>
            </div>

            <div class="col-4">
              <label for="">Sebab Penolakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="sebab_penolakan" value="">
              </div>
            </div>

            <div class="col-4">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan" value="">
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
      $("#updateForm select[name=no_kod]").val(obj.no_kod);

      $("#updateForm action").val("/info_kewatk2/" + obj.id);      
      $("#updateForm").attr('action', "/info_kewatk2/" + obj.id);

      $("#updateDiv").show();

    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk2/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/info_kewatk2";
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
