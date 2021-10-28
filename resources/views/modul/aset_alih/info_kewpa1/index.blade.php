@extends('layouts.base') @section('content')

<button class="btn btn-sm btn-success" id="tambah">Tambah</button>
<div id="show">
  <div class="card mt-4">
    <div class="card-header" style="background-color:#198754;">
      <h5 class="text-white">INFO KEWPA 1</h5>
    </div>
    </br>
    <div class="card-body pt-0">

      <table class="table" id="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No Kod</th>
            <th scope="col">Keterangan Aset Alih</th>
            <th scope="col">Kuantiti Dipesan</th>
            <th scope="col">Kuantiti Do</th>
            <th scope="col">Kuantiti Diterima</th>
            <th scope="col">Catatan</th>
            <th scope="col">Rujukan Kewpa1</th>
            <th scope="col">Tindakan</th>
           </tr>
        </thead>
        <tbody>
          @foreach ($info_kewpa1 as $info_kewpa1)
          <tr>
            <td scope="col">{{$info_kewpa1->no_kod}}</th>
            <td scope="col">{{$info_kewpa1->keterangan_aset_alih}}</th>
            <td scope="col">{{$info_kewpa1->kuantiti_dipesan}}</th>
            <td scope="col">{{$info_kewpa1->kuantiti_do}}</th>
            <td scope="col">{{$info_kewpa1->kuantiti_diterima}}</th>
            <td scope="col">{{$info_kewpa1->catatan}}</th>
            <td scope="col">{{$info_kewpa1->rujukan_kewpa1_id}}</th>            
            <td scope="col">
              <a class="btn-sm btn-primary" onclick="updateData({{$info_kewpa1}})">Kemaskini</a>
              <form method="POST" action="/info_kewpa1/{{$info_kewpa1->id}}" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <input class="form-control mb-3" type="text" name="rujukan_kewpa1_id" value="{{$rujukan_kewpa1_id}}" hidden>
                <input type=submit value="Buang" class="btn-sm btn-danger"></button>
              </form>
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
          <div class="card-header" style="background-color:#198754;">
              <h5 class="text-white">INFO KEWPA 1</h5>
          </div>
          </br>
          <div class="card-body pt-0">
          <label for="">No Kod</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="no_kod" value="">
          </div>
          <label for="">Keterangan Aset Alih</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="keterangan_aset_alih" value="">
          </div>
          <label for="">Kuantiti Dipesan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_dipesan" value="">
          </div>
          <label for="">Kuantiti Do</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_do" value="">
          </div>
          <label for="">Kuantiti Diterima</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_diterima" value="">
          </div>
          <label for="">Catatan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="catatan" value="">
          </div>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="rujukan_kewpa1_id" value="{{$rujukan_kewpa1_id}}" hidden>
          </div>  
          <button class="btn btn-success" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm"  method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="background-color:#198754;">
              <h5 class="text-white">INFO KEWPA 1</h5>
          </div>
          </br>
          <div class="card-body pt-0">
          <label for="">No Kod</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="no_kod" value="">
          </div>
          <label for="">Keterangan Aset Alih</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="keterangan_aset_alih" value="">
          </div>
          <label for="">Kuantiti Dipesan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_dipesan" value="">
          </div>
          <label for="">Kuantiti Do</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_do" value="">
          </div>
          <label for="">Kuantiti Diterima</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="kuantiti_diterima" value="">
          </div>
          <label for="">Catatan</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="catatan" value="">
          </div>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="rujukan_kewpa1_id" value="{{$rujukan_kewpa1_id}}" hidden>
          </div>  
          <button class="btn btn-success" type="submit">Simpan</button>
          </div>
      </div>
  </form>
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
      $("#updateForm input[name=rujukan_kewpa1_id]").val(obj.rujukan_kewpa1_id);

      $("#updateForm action").val("/info_kewpa1/" + obj.id);      
      $("#updateForm").attr('action', "/info_kewpa1/" + obj.id)


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
