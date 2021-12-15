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
            <div class="card mt-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Penolakan Aset</h2>
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
                                <th scope="col">Tindakan</th>
                                <th scope="col">No Rujukan KEWPA1</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kewpa2 as $kewpa2)
                                <tr>

                                    <td scope="col">{{ $loop->index + 1 }}</td>
                                    <td scope="col">{{ $kewpa2->tindakan }}</td>
                                    <td scope="col">No Rujukan: {{ $kewpa2->rujukan_kewpa1_id }}</td>

                                    @if ($kewpa2->status == 'DERAF')
                                        <td scope="col"><span class="badge bg-warning">{{ $kewpa2->status }}</span></th>
                                        @elseif ($kewpa2->status=="HANTAR")
                                        <td scope="col"><span class="badge bg-primary">{{ $kewpa2->status }}</span></th>
                                        @elseif ($kewpa2->status=="LULUS")
                                        <td scope="col"><span class="badge bg-success">{{ $kewpa2->status }}</span></th>
                                        @elseif ($kewpa2->status=="DITOLAK")
                                        <td scope="col"><span class="badge bg-danger">{{ $kewpa2->status }}</span></th>
                                    @endif

                                    <td scope="col">
                                        <a href="/kewpa2/{{ $kewpa2->id }}"><i class="fas fa-pen"></i></a>
                                        <a href="/kewpa2pdf/{{ $kewpa2->id }}"><i class="fas fa-print"></i></a>
                                        <a href="/kewpa2" onclick="deleteData({{ $kewpa2 }})"><i
                                                class="fas fa-trash"></i></a>
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
                <form id="create_form" method="POST" action="/kewpa2" enctype="multipart/form-data">
                    @csrf
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
                                        <input class="form-control mb-3" type="text" name="tindakan" value="" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="">No Rujukan KEWPA 1</label>
                                    <div class="input-group">
                                        <select id="selected_kewpa1" class="form-control mb-3" name="rujukan_kewpa1_id"
                                            required>
                                            <option value="" selected disabled hidden>sila pilih</option>
                                            @foreach ($kewpa1 as $kp1)
                                                <option value="{{ $kp1->id }}">Kewpa1 - No Rujukan:
                                                    {{ $kp1->id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetPenolakan()">Tambah Aset</a>
                            <button id="create_submit" class="btn-sm btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>

                    <div id="info_kewpa2_create"></div>
                </form>
            </div>


            <script type="text/javascript">
                //global vars for info assignation
                var kewpa1 = <?php echo $kewpa1; ?>
                //var kewpa1 = {!! json_encode($kewpa1All->toArray()) !!};

                $(document).ready(function() {
                    initiateDatatable();
                    console.log(kewpa1);
                })

                $("#tambah").click(function() {
                    $("#show").hide();
                    $("#create").show();
                    tambahAsetPenolakan();
                });

                function tambahAsetPenolakan() {


                    $("#info_kewpa2_create").append(

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
              <label for="">Info Kewpa 1</label>
              <div class="input-group">
                <select id="info_kewpa1_select" class="form-control mb-3" name="info_kewpa1_id[]" required>
                </select>

              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Ditolak</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_ditolak[]" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Kuantiti Kurang Lebih</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih[]" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Sebab Penolakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="sebab_penolakan[]" value="" required>
              </div>
            </div>
            <div class="col-4">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan[]" value="" required>
              </div>
            </div>
           </div>
         </div>

         </div>
         </div>

      `
                    );

                    autoTriggerChange();

                }


                function deleteData(obj) {
                    var id = obj.id;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/kewpa2/" + id,
                        type: "DELETE",
                        success: function() {
                            location.replace = "/kewpa2";;
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

                $("#selected_kewpa1").change(function() {
                    let selected_kewpa1 = $("#create_form select[name=rujukan_kewpa1_id]").val();
                    for (let i = 0; i < kewpa1.length; i++) {
                        if (kewpa1[i].id == selected_kewpa1) {
                            updateInfoCreateForm(kewpa1[i].info_kewpa1);
                        }
                    }

                });

                function updateInfoCreateForm(info_kewpa1) {
                    let option_data = "";

                    for (let i = 0; i < info_kewpa1.length; i++) {
                        option_data = option_data +
                            `<option value=${info_kewpa1[i].id}>No Rujukan INFO KEWPA 1 - ${info_kewpa1[i].id}</option>`
                    }
                    console.log(option_data);

                    $("select[name='info_kewpa1_id[]'] option").remove();
                    $("select[name='info_kewpa1_id[]']").append(option_data);

                }

                function autoTriggerChange() {
                    let selected_kewpa1 = $("#create_form select[name=rujukan_kewpa1_id]").val();
                    for (let i = 0; i < kewpa1.length; i++) {
                        if (kewpa1[i].id == selected_kewpa1) {
                            updateInfoCreateForm(kewpa1[i].info_kewpa1);
                        }
                    }

                }
            </script>

        @endsection
