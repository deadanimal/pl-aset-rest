@extends('layouts.base') @section('content')


<button class="btn btn-sm btn-success" id="tambah">Tambah</button>
<div id="show">
  <div class="card mt-4">
    <div class="card-header" style="background-color:#198754;">
      <h5 class="text-white">KEWPA 1</h5>
    </div>
    </br>
    <div class="card-body pt-0">

      <table class="table" id="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nama Pembekal</th>
            <th scope="col">Alamat Pembekal</th>
            <th scope="col">Jenis Penerimaan</th>
            <th scope="col">No Rujukan Pesanan</th>
            <th scope="col">Tarikh Pesanan Kontrak</th>
            <th scope="col">No Rujukan Hantaran</th>
            <th scope="col">Tarikh Nota Hantaran</th>
            <th scope="col">Maklumat Pengangkutan</th>
            <th scope="col">Pegawai Penerima</th>
            <th scope="col">Pegawai Teknikal</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kewpa1 as $kewpa1)
          <tr>
            <td scope="col">{{$kewpa1->nama_pembekal}}</th>
            <td scope="col">{{$kewpa1->alamat_pembekal}}</th>
            <td scope="col">{{$kewpa1->jenis_penerimaan}}</th>
            <td scope="col">{{$kewpa1->no_rujukan_pesanan}}</th>
            <td scope="col">{{$kewpa1->tarikh_pesanan_kontrak}}</th>
            <td scope="col">{{$kewpa1->no_rujukan_hantaran}}</th>
            <td scope="col">{{$kewpa1->tarikh_nota_hantaran}}</th>
            <td scope="col">{{$kewpa1->maklumat_pengangkutan}}</th>
            <td scope="col">{{$kewpa1->pegawai_penerima}}</th>
            <td scope="col">{{$kewpa1->pegawai_teknikal}}</th>
            <td scope="col">
              <a class="btn-sm btn-warning" href="/kewpa1/{{$kewpa1->id}}">Info</a>
              <a class="btn-sm btn-primary" onclick="updateData({{$kewpa1}})">Kemaskini</a>
              <form method="POST" action="/kewpa1/{{$kewpa1->id}}" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <input type=submit value="Buang" class="btn-sm btn-danger"></button>
              </form>
              <a class="btn-sm btn-secondary" href="/kewpa1/{{$kewpa1->id}}">Cetak</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewpa1" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="background-color:#198754;">
              <h5 class="text-white">KEWPA 1</h5>
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
            <label for="">No Rujukan Pesanan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="no_rujukan_pesanan" value="">
            </div>
            <label for="">Tarikh Pesanan Kontrak</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_pesanan_kontrak" value="">
            </div>
            <label for="">No Rujukan Hantaran</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="no_rujukan_hantaran" value="">
            </div>
            <label for="">Tarikh Nota Hantaran</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_nota_hantaran" value="">
            </div>
            <label for="">Maklumat Pengangkutan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="maklumat_pengangkutan" value="">
            </div>
            <label for="">Pegawai Penerima</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="pegawai_penerima" value="">
            </div>
            <label for="">Pegawai Teknikal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="pegawai_teknikal" value="">
            </div>
          <button class="btn btn-success" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="background-color:#198754;">
              <h5 class="text-white">KEWPA 1</h5>
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
            <label for="">No Rujukan Pesanan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="no_rujukan_pesanan" value="">
            </div>
            <label for="">Tarikh Pesanan Kontrak</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_pesanan_kontrak" value="">
            </div>
            <label for="">No Rujukan Hantaran</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="no_rujukan_hantaran" value="">
            </div>
            <label for="">Tarikh Nota Hantaran</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_nota_hantaran" value="">
            </div>
            <label for="">Maklumat Pengangkutan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="maklumat_pengangkutan" value="">
            </div>
            <label for="">Pegawai Penerima</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="pegawai_penerima" value="">
            </div>
            <label for="">Pegawai Teknikal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="pegawai_teknikal" value="">
            </div>
          <button class="btn btn-success" type="submit">Simpan</button>
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

      $("#updateForm input[name=nama_pembekal]").val(obj.nama_pembekal);
      $("#updateForm input[name=alamat_pembekal]").val(obj.alamat_pembekal);
      $("#updateForm input[name=jenis_penerimaan]").val(obj.jenis_penerimaan);
      $("#updateForm input[name=no_rujukan_pesanan]").val(obj.no_rujukan_pesanan);
      $("#updateForm input[name=tarikh_pesanan_kontrak]").val(obj.tarikh_pesanan_kontrak);
      $("#updateForm input[name=no_rujukan_hantaran]").val(obj.no_rujukan_hantaran);
      $("#updateForm input[name=tarikh_nota_hantaran]").val(obj.tarikh_nota_hantaran);
      $("#updateForm input[name=maklumat_pengangkutan]").val(obj.maklumat_pengangkutan);
      $("#updateForm input[name=date_created]").val(obj.date_created);
      $("#updateForm input[name=date_modified]").val(obj.date_modified);
      $("#updateForm input[name=pegawai_penerima]").val(obj.pegawai_penerima);
      $("#updateForm input[name=pegawai_teknikal]").val(obj.pegawai_teknikal);      

      $("#updateForm action").val("/kewpa1/" + obj.id);      
      $("#updateForm").attr('action', "/kewpa1/" + obj.id)

      $("#updateDiv").show();

    }


    function initiateDatatable() {
      const dataTableBasic = new simpleDatatables.DataTable("#table", {
          searchable: true,
          fixedHeight: true
      });
    }

    


</script>

@endsection
