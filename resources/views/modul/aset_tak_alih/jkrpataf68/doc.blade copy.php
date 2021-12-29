<!DOCTYPE html>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <title>Document</title>
</head>

<style>
    body {
        background: rgb(204, 204, 204);
    }

    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }

    page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
    }

    page[size="A4"][layout="landscape"] {
        width: 29.7cm;
        height: 21cm;
    }

    @media print {

        body,
        page {
            margin: 0;
            box-shadow: 0;
        }
    }

    .table-no-padding-y td {
        padding-top: 0px;
        padding-bottom: 0px;
    }

    td {
        margin: 0px;
        padding: 0px;
    }

    tr {
        margin: 0px;
        padding: 0px;
    }

    h5 {
        margin: 0px;
        padding: 0px;
    }

    table {
        margin-left: 100px;
        bottom: 0;
        vertical-align: bottom;
    }

</style>

<body>
    <page size="A4">
        <div class="container">
            <table style="margin-top: 50px;">
                <tr>
                    <td style="width: 400px; height:150px;"></td>
                    <td>
                        <h3><strong> JKR.PATA.F6/8 </strong></h3>
                    </td>
                </tr>
            </table>
        </div>

        <table>
            <tr>
                <td style="width: 100px;"> <strong> No Rujukan </strong></td>
                <td>:No Rujukan</td>
            </tr>
            <tr>
                <td style="padding-top: 20px;"><strong>Tarikh</strong></td>
                <td style="padding-top: 20px;">:10/10/1010</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;width:600px;height:100px;">KAD PENDAFTARAN ASET TAK ALIH</td>
            </tr>
        </table>
    </page>

</body>


</html>
