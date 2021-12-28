<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <link rel="stylesheet" href="/css/bootstrap3.min.css"> --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    <div class="container-fluid" style="margin-right: 50px">
        <div class="row" style="margin-top:50px;">
            <div class="col-1"></div>
            <div class="col-4" style="background-color: grey; height:30px;">
            </div>
            <div class="col-7" style="background-color: rgb(117, 177, 28); height:30px;">
                <h5 style="color:white; padding-left:10px;">BAB C : PENERIMAAN DAN PENDAFTARAN ASET
                    <strong style="background-color: white; color:black; padding:8px 20px; margin-"> 83 </strong>
                </h5>
            </div>
        </div>


        <div class="row">
            <div class="col-11 text-end" style="margin-top:110px;">
                <h4 class="font-weight-bold">JKR.PATA.F6/8</h4>
            </div>
            <div class="col-1">

            </div>
        </div>

        <div class="row" style="margin-top: 70px; margin-left:140px;">
            <div class="col-12">
                <h5 style="font-family: Arial, Helvetica, sans-serif">No Rujukan : {{ $jkrpataf68->no_rujukan }}</h5>
                <h5 style="font-family: Arial, Helvetica, sans-serif">Tarikh : {{ $jkrpataf68->tarikh }}</h5>
            </div>


            <div class="row">
                <div class="col-12 text-center">
                    <h4 style="text-decoration: underline;"><strong> KAD PENDAFTARAN ASET TAK ALIH </strong></h4>
                </div>
            </div>

            <div class="row" style="margin-top: 40px;">
                <div class="col-12">
                    <h6>Kategori ASET :
                        @switch($jkrpataf68->kategori_aset)
                            @case(1)
                                Bangunan & Binaan Lain
                            @break
                            @case(2)
                                Infrastruktur Jalan & Jambatan
                            @break
                            @case(3)
                                Infrastruktur (* Saliran / Pembetungan/ Aset air)
                            @break
                            @case(4)
                                Lain-lain
                            @break

                            @default

                        @endswitch


                    </h6>
                </div>

                <div class="col-12">
                    <h6>Fungsi ASET :
                        @switch($jkrpataf68->kategori_aset)
                            @case(1)
                                Bangunan & Binaan Lain
                            @break
                            @case(2)
                                Infrastruktur Jalan & Jambatan
                            @break
                            @case(3)
                                Infrastruktur (* Saliran / Pembetungan/ Aset air)
                            @break
                            @case(4)
                                Lain-lain
                            @break

                            @default

                        @endswitch
                    </h6>
                </div>

            </div>

        </div>
    </div>


</body>


</html>
