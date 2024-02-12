<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['pageTitle'] }} - {{ $data['autoId'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
        }

        /* .invoice table {
            width: 100%;
            border-collapse: collapse;
        } */

        span.header {
            font-size: 24pt;
        }

        span.subheader {
            font-size: 16pt;
        }

        .custom-hr {
            border: none;
            height: 5px;
            background-color: #f7d611;
        }

        .custom-hr-2 {
            border: none;
            height: 5px;
            background-color: black;
        }
    </style>
</head>

<body>
    <embed id="pdfViewer" src="{{ route('p.payment.pdf', ['id' => $data['idpage']]) }}"
        style="width: 100%; height: 800px; border: 1px solid #ccc;"></embed>
    <div>
        <table>
            <thead>
                <tr style="border-bottom: 2px solid red">
                    <th>
                        <img src="{{ asset('assets/compiled/png/logo.png') }}" alt="logo" width="150px">
                    </th>
                    <th>
                        <p>
                            <span class="header">PT RIZQUNA MEKKAH MADINAH</span> <br>
                            <span class="subheader">IZIN : 02350009222460004</span> <br>
                            <span>Ruko Graha Aziz, Unit B. Jl.KH. Abdullah Syafei No. 12, RT/TW 012/009, <br>Kel.Bukit
                                Duri,
                                Kec.Tebet Jakarta Selatan</span> <br>
                            <span>Email : rizqunamekkahmadinahjkt@gmail.com , Telp : 081999940934</span>
                        </p>
                    </th>
                </tr>
            </thead>
        </table>
        <hr class="custom-hr">
        <hr class="custom-hr-2">
        <table style="border-collapse: collapse" border="0">
            <thead>
                <tr>
                    <th style="text-align: left" colspan="8">Customer</th>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>: <b>Em Abror</b></td>
                    <td colspan="3" width="30%"></td>
                    <td colspan="2">Number</td>
                    <td>: 003/INV</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td colspan="2">Invoice Date</td>
                    <td>: 2 Feb</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td colspan="2">Payment Term</td>
                    <td>: Cash / Transfer</td>
                </tr>
                <tr>
                    <td>Nama Hotel</td>
                    <td>: <b>Rayyana</b></td>
                    <td colspan="6"></td>
                </tr>
                <tr>
                    <td>Check In</td>
                    <td>: 3 Feb</td>
                    <td colspan="6"></td>
                </tr>
                <tr>
                    <td>Check Out</td>
                    <td>: 3 Feb</td>
                    <td colspan="6"></td>
                </tr>
            </thead>
        </table>
        <br>
        <table border="1" style="width: 80%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Room Type</th>
                    <th>Room Quantity</th>
                    <th>Durasi (N)</th>
                    <th colspan="2">Room Rate</th>
                    <th colspan="2">Ammount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center">Triple</td>
                    <td style="text-align: center">1</td>
                    <td style="text-align: center">4</td>
                    <td style="text-align: left">SAR</td>
                    <td style="text-align: right">775</td>
                    <td style="text-align: left">SAR</td>
                    <td style="text-align: right">3.100</td>
                </tr>
                <tr>
                    <td style="text-align: center">Double</td>
                    <td style="text-align: center">1</td>
                    <td style="text-align: center">4</td>
                    <td style="text-align: left">SAR</td>
                    <td style="text-align: right">700</td>
                    <td style="text-align: left">SAR</td>
                    <td style="text-align: right">2.800</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>TOTAL</th>
                    <th>2</th>
                    <th colspan="3">Sub Total</th>
                    <th style="text-align: left">SAR</th>
                    <th style="text-align: right">5.900</th>
                </tr>
                <tr>
                    <th colspan="2" rowspan="4"></th>
                    <th colspan="3">Total dalam USD</th>
                    <th colspan="2" style="text-align: right">$1.578</th>
                </tr>
                <tr>
                    <th colspan="3">Total dalam IDR</th>
                    <th colspan="2" style="text-align: right">25.924.600</th>
                </tr>
                <tr>
                    <th colspan="3">Deposit 2/2/2024</th>
                    <th colspan="2" style="text-align: right">25.924.600</th>
                </tr>
                <tr>
                    <th colspan="3">Lunas</th>
                    <th colspan="2" style="text-align: right">-</th>
                </tr>
            </tfoot>
        </table>
        <p>
            <b>
                <u>*Syarat & Ketentuan</u> <br>
                - Kurs mengikuti kurs BSI pada saat hari pembayaran <br>
                - DP minimal 50% dari total tagihan <br>
                - Pelunasan 2 minggu sebelum keberangkatan <br>
                - Apabila Agent membatalkan setelah kamar terkonfirmasi, dan ada pinalty (denda) maka <br>
                agent wajib membayar pinalty (denda) tersebut
            </b>
        </p>
        <br>
        <br>
        <table>
            <tbody>
                <tr>
                    <td>
                        <table border="1" style="border-collapse: collapse; text-align: left;">
                            <tbody>
                                <tr>
                                    <th>
                                        <u>Transfer ke : </u> <br>
                                        No. Rek <br>
                                        A/n <br>
                                        Bank
                                    </th>
                                    <th>
                                        <br>
                                        : 174-00-0604805-2<br>
                                        : PT. RIZQUNA MEKKAH MADINAH<br>
                                        : MANDIRI (USD)
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        No. Rek <br>
                                        A/n <br>
                                        Bank
                                    </th>
                                    <th>
                                        : 174-00-0604805-2<br>
                                        : PT. RIZQUNA MEKKAH MADINAH<br>
                                        : MANDIRI (USD)
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table style="text-align: center">
                            <tbody>
                                <tr>
                                    <td style="width: 10%"></td>
                                    <td style="width: 50%">
                                        Approve By <br>
                                        <img src="{{ asset('assets/compiled/png/logo.png') }}" alt="logo"
                                            width="100px"> <br>
                                        <b><u>Fatimah Az zahra</u></b> <br>
                                        Finance

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>


    </div>
</body>

</html>
