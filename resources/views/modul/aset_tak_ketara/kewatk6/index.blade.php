@extends('layouts.base') @section('content')
<div id="show">
  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">KEWATK 6</h6>
        </div>
        <div class="col text-end">
        </div>
      </div>
    </div>
    </br>
    <div class="card-body pt-0">
      <label for="">Laporan Kedudukan Semasa Harta Intelek Tahun: </label>
      <div class="input-group">
              <select onchange="getInfoKewatk4(this)" class="form-control mb-3" name="no_rujukan_atk1">
                <option value="2021" selected="selected">2021</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
              </select>
            </div>
       <a class="btn btn-sm btn-primary text-white">Cari</a>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/info_kewatk1" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
            <h6 class="text-white">KEWATK 6</h6>
          </div>
          </br>
          <div class="card-body pt-0">
          <label for="">No Kod</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="no_kod" value="">
          </div>
          <label for="">Keterangan Aset</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="keterangan_aset" value="">
          </div>

          <label for="">Medium</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="medium" value="">
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
          <label for="">No Kod</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="no_kod" value="">
          </div>

          <label for="">Keterangan Aset</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="keterangan_aset" value="">
          </div>
          <label for="">Medium</label>
          <div class="input-group">
            <input class="form-control mb-3" type="text" name="medium" value="">
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

          <button class="btn btn-primary" type="submit">Simpan</button>
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
      $("#updateForm input[name=keterangan_aset]").val(obj.keterangan_aset);
      $("#updateForm input[name=medium]").val(obj.medium);
      $("#updateForm input[name=kuantiti_dipesan]").val(obj.kuantiti_dipesan);
      $("#updateForm input[name=kuantiti_do]").val(obj.kuantiti_do);
      $("#updateForm input[name=kuantiti_diterima]").val(obj.kuantiti_diterima);
      $("#updateForm input[name=catatan]").val(obj.catatan);
      $("#updateForm input[name=no_rujukan]").val(obj.no_rujukan);      
      $("#updateForm action").val("/info_kewatk1/" + obj.id);      
      $("#updateForm").attr('action', "/info_kewatk1/" + obj.id);

      $("#updateDiv").show();

    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk1/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/info_kewatk1";
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
