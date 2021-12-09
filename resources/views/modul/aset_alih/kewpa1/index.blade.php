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
                <li class="breadcrumb-item"><a href="/kewpa1">Kewpa1</a></li>
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

              <th scope="col">Bil</th>
              <th scope="col">Nama Pembekal</th>
              <th scope="col">Alamat Pembekal</th>
              <th scope="col">Jenis Penerimaan</th>
              <th scope="col">No Rujukan Pesanan</th>
              <th scope="col">Tarikh Pesanan Kontrak</th>
              <th scope="col">Status</th>
              <th scope="col">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kewpa1 as $kewpa1)
            <tr>

              <td scope="col">{{$loop->index + 1}}</td>
              <td scope="col">{{$kewpa1->nama_pembekal}}</td>
              <td scope="col">{{$kewpa1->alamat_pembekal}}</td>
              <td scope="col">{{$kewpa1->jenis_penerimaan}}</td>
              <td scope="col">{{$kewpa1->no_rujukan_pesanan}}</td>
              <td scope="col">{{$kewpa1->tarikh_pesanan_kontrak}}</td>

              @if ($kewpa1->status=="DERAF") 
                <td scope="col"><span class="badge bg-warning">{{$kewpa1->status}}</span></th>
              @elseif ($kewpa1->status=="HANTAR") 
                <td scope="col"><span class="badge bg-primary">{{$kewpa1->status}}</span></th>
              @elseif ($kewpa1->status=="LULUS") 
                <td scope="col"><span class="badge bg-success">{{$kewpa1->status}}</span></th>
              @elseif ($kewpa1->status=="DITOLAK") 
                <td scope="col"><span class="badge bg-danger">{{$kewpa1->status}}</span></th>
              @endif
              
              <td scope="col">
                <a href="/kewpa1/{{$kewpa1->id}}" ><i class="fas fa-pen"></i></a>
                <a href="/kewpa1pdf/{{$kewpa1->id}}"><i class="fas fa-print"></i></a>
                <a href="/kewpa1" onclick="deleteData({{$kewpa1}})"><i class="fas fa-trash"></i></a>
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
  <form id="create_form" method="POST" action="/kewpa1" enctype="multipart/form-data">
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
              <label for="">Nama Pembekal</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="nama_pembekal" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Alamat Pembekal</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="alamat_pembekal" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Jenis Penerimaan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="jenis_penerimaan" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">No Rujukan Pesanan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="no_rujukan_pesanan" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Tarikh Pesanan Kontrak</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_pesanan_kontrak" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">No Rujukan Hantaran</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="no_rujukan_hantaran" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Tarikh Nota Hantaran</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_nota_hantaran" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Maklumat Pengangkutan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="maklumat_pengangkutan" value="" required>
              </div>
            </div>
            </div>

          <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetPenerimaan()" >Tambah Aset</a>
          <button id="create_submit" class="btn-sm btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>

      <div id="info_kewpa1_create"></div>
  </form>
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

    function tambahAsetPenerimaan() {

      $("#info_kewpa1_create").append(

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
                <input class="form-control mb-3" type="text" name="keterangan_aset_alih[]" value="" required>
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
        url: "/kewpa1/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewpa1";;
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
