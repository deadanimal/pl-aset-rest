@extends('layouts.base_pa') @section('content') 
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="/kewpa1">Kewpa1</a></li>
                <li class="breadcrumb-item"><a href="/kewpa1/{{$kewpa1->id}}">Info Kewpa1</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="container-fluid mt--6">

  <div id="show">
    <form id="create_form" method="POST" action="/kewpa1/{{$kewpa1->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Kewpa1</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-4">
                <label for="">Nama Pembekal</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="nama_pembekal" value="{{$kewpa1->nama_pembekal}}" required>
                </div>
              </div>
              <div class="col-4">
                <label for="">Alamat Pembekal</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="alamat_pembekal" value="{{$kewpa1->alamat_pembekal}}" required>
                </div>
              </div>
              <div class="col-4">
                <label for="">Jenis Penerimaan</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="jenis_penerimaan" value="{{$kewpa1->jenis_penerimaan}}" required>
                </div>
              </div>
              <div class="col-4">
                <label for="">No Rujukan Pesanan</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="no_rujukan_pesanan" value="{{$kewpa1->no_rujukan_pesanan}}" required>
                </div>
              </div>
              <div class="col-4">
                <label for="">Tarikh Pesanan Kontrak</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="date" name="tarikh_pesanan_kontrak" value="{{$kewpa1->tarikh_pesanan_kontrak}}" required>
                </div>
              </div>
              <div class="col-4">
                <label for="">No Rujukan Hantaran</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="no_rujukan_hantaran" value="{{$kewpa1->no_rujukan_hantaran}}" required>
                </div>
              </div>
              <div class="col-4">
                <label for="">Tarikh Nota Hantaran</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="date" name="tarikh_nota_hantaran" value="{{$kewpa1->tarikh_nota_hantaran}}" required>
                </div>
              </div>
              <div class="col-4">
                <label for="">Maklumat Pengangkutan</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="maklumat_pengangkutan" value="{{$kewpa1->maklumat_pengangkutan}}" required>
                </div>
              </div>
            </div>
          <button id="create_submit" class="btn-sm btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>

      <div id="info_kewpa1_create"></div>
  </form>

    <div class="card mt-4">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h2 class="mb-0">Info Kewpa1</h2>
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
              <th scope="col">No Kod</th>
              <th scope="col">Keterangan Aset</th>
              <th scope="col">Kuantiti Dipesan</th>
              <th scope="col">Kuantiti Do</th>
              <th scope="col">Kuantiti Diterima</th>
              <th scope="col">Catatan</th>
              <th scope="col">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($info_kewpa1 as $info_kewpa1)
            <tr>
  
              <td scope="col">{{$loop->index+1}}</td>
              <td scope="col">{{$info_kewpa1->no_kod}}</td>
              <td scope="col">{{$info_kewpa1->keterangan_aset_alih}}</td>
              <td scope="col">{{$info_kewpa1->kuantiti_dipesan}}</td>
              <td scope="col">{{$info_kewpa1->kuantiti_do}}</td>
              <td scope="col">{{$info_kewpa1->kuantiti_diterima}}</td>
              <td scope="col">{{$info_kewpa1->catatan}}</td>
              <td scope="col">
                <a href="#" onclick="updateData({{$info_kewpa1}})"><i class="fas fa-pen"></i></a>
                <a href="/kewpa1/{{$info_kewpa1->no_rujukan}}" onclick="deleteData({{$info_kewpa1}})"><i class="fas fa-trash"></i></a>
              </td>
  
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

<div id="create" style="display: none;">
  <form method="POST" action="/info_kewpa1" enctype="multipart/form-data">
      @csrf
        <div class="card mt-4" id="basic-info">

            <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Info Penerimaan Aset Alih</h2>
               </div>
               <div class="text-end mr-2">
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
          <div class="row">
            <div class="col-4">
              <label for="">Keterangan Aset</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="keterangan_aset_alih" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Dipesan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_dipesan" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Do</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_do" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Diterima</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_diterima" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">No Kod</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="no_kod" value="" required>
              </div>
              <input class="form-control mb-3" type="hidden" name="rujukan_kewpa1_id" value="{{$kewpa1->id}}" required>
            </div>    
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
                 <h2 class="mb-0">Info Penerimaan Aset</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
          <div class="row">
            <div class="col-4">
              <label for="">Keterangan Aset</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="keterangan_aset_alih" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Dipesan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_dipesan" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Do</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_do" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Diterima</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_diterima" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">No Kod</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="no_kod" value="" required>
              </div>
            </div>    
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

      $("#show").hide();

      $("#updateForm input[name=no_kod]").val(obj.no_kod);
      $("#updateForm input[name=keterangan_aset_alih]").val(obj.keterangan_aset_alih);
      $("#updateForm input[name=kuantiti_dipesan]").val(obj.kuantiti_dipesan);
      $("#updateForm input[name=kuantiti_do]").val(obj.kuantiti_do);
      $("#updateForm input[name=kuantiti_diterima]").val(obj.kuantiti_diterima);
      $("#updateForm input[name=catatan]").val(obj.catatan);
      $("#updateForm action").val("/info_kewpa1/" + obj.id);      
      $("#updateForm").attr('action', "/info_kewpa1/" + obj.id);

      $("#updateDiv").show();

    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewpa1/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/info_kewpa1";
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
