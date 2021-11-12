@extends('layouts.base') @section('content')
    <form method="POST" action="/infokewps1/{{ $infokewps1->id }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="modal-body">

            <div class="card mt-4" id="basic-info">
                <div class="card-header"
                    style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)                                                                                                                                                               ">
                    <h6 class="text-white">Aset untuk KEW.PS-1</h6>
                </div>
                </br>
                <div class="card-body pt-0">

                    <label for="">Perihal Barang</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="perihal_barang"
                            value="{{ $infokewps1->perihal_barang }}">
                    </div>
                    <label for="">Unit Pengukuran</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="unit_pengukuran"
                            value="{{ $infokewps1->unit_pengukuran }}">
                    </div>
                    <label for="">Kuantiti Dipesan</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="integer" name="kuantiti_dipesan"
                            value="{{ $infokewps1->kuantiti_dipesan }}">
                    </div>
                    <label for="">Kuantiti DO</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="integer" name="kuantiti_do"
                            value="{{ $infokewps1->kuantiti_do }}">
                    </div>
                    <label for="">Kuantiti Diterima</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="integer" name="kuantiti_diterima"
                            value="{{ $infokewps1->kuantiti_diterima }}">
                    </div>
                    <label for="">Harga Seunit</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="nombor_rujukan_pk"
                            value="{{ $infokewps1->nombor_rujukan_pk }}">
                    </div>
                    <label for="">Jumlah Harga</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="harga_seunit"
                            value="{{ $infokewps1->harga_seunit }}">
                    </div>
                    <label for="">Catatan</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="jumlah_harga"
                            value="{{ $infokewps1->jumlah_harga }}">
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        <input class="form-control mb-3" type="hidden" name="m_nama_pembekal" value="">
        <input class="form-control mb-3" type="hidden" name="m_alamat_pembekal" value="">
        <input class="form-control mb-3" type="hidden" name="m_jenis_penerimaan" value="">
        <input class="form-control mb-3" type="hidden" name="m_nombor_rujukan_pk" value="">
        <input class="form-control mb-3" type="hidden" name="m_tarikh_pk" value="">
        <input class="form-control mb-3" type="hidden" name="m_nombor_do" value="">
        <input class="form-control mb-3" type="hidden" name="m_tarikh_do" value="">
        <input class="form-control mb-3" type="hidden" name="m_maklumat_pengangkutan" value="">
    </form>
@endsection
