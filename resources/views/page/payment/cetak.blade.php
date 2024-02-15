<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['pageTitle'] }} - {{ $data['autoId'] }}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
        }

        span.header {
            font-size: 24pt;
        }

        span.subheader {
            font-size: 16pt;
        }

        .horizontal-rule {
            background-color: transparent;
            margin: 5px 0;
        }

        .horizontal-rule.black {
            border-top: 4px solid black;
        }

        .horizontal-rule.red {
            border-top: 4px solid #fdd911;
        }
    </style>
</head>

<body>
    <div>
        <table border="0">
            <thead>
                <tr>
                    <th>
                        <img src="{{ asset('assets/compiled/png/logo.png') }}" alt="logo" width="120px"
                            style="border-radius: 50%;">
                    </th>
                    <th>
                        <span class="header">PT RIZQUNA MEKKAH MADINAH</span> <br>
                        <span class="subheader">IZIN : 02350009222460004</span> <br>
                        <span style="font-size: 11pt">Ruko Graha Aziz, Unit B. Jl.KH. Abdullah Syafei No. 12, RT/TW
                            012/009, <br>Kel.Bukit
                            Duri,
                            Kec.Tebet Jakarta Selatan</span> <br>
                        <span style="font-size: 10pt">Email : rizqunamekkahmadinahjkt@gmail.com , Telp :
                            081999940934</span>
                    </th>
                </tr>
            </thead>
        </table>
        <div class="horizontal-rule red"></div>
        <div class="horizontal-rule black"></div>

        <table style="border-collapse: collapse" border="0">
            <thead>
                <tr>
                    <th style="text-align: left" colspan="8">Customer</th>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>: <b><span id="namaagen">Em Abror</span></b></td>
                    <td colspan="3" width="20%"></td>
                    <td colspan="2">Number</td>
                    <td>: <span id="noinvoice">003/INV</span></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td colspan="2">Invoice Date</td>
                    <td>: <span id="tglinvoice">2 Feb</span></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td colspan="2">Payment Term</td>
                    <td>: <span id="metodebayar">Cash</span> / Transfer</td>
                </tr>
                <tr>
                    <td>Nama Hotel</td>
                    <td>: <b><span id="namahotel">Rayyana</span></b></td>
                    <td colspan="6"></td>
                </tr>
                <tr>
                    <td>Check In</td>
                    <td>: <span id="checkin">3 Feb</span></td>
                    <td colspan="6"></td>
                </tr>
                <tr>
                    <td>Check Out</td>
                    <td>: <span id="checkout">3 Feb</span></td>
                    <td colspan="6"></td>
                </tr>
            </thead>
        </table>
        <br>
        <table border="1" style="width: 80%; border-collapse: collapse;" cellpadding="3px">
            <thead>
                <tr>
                    <th>Room Type</th>
                    <th>Room Quantity</th>
                    <th>Durasi (N)</th>
                    <th colspan="2">Room Rate</th>
                    <th colspan="2">Ammount</th>
                </tr>
            </thead>
            <tbody id="invoiceDetailsBody">
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
            <tfoot id="myTfoot">
                <tr>
                    <th>TOTAL</th>
                    <th><span id="sumqty"></span></th>
                    <th colspan="3">Sub Total</th>
                    <th style="text-align: left">SAR</th>
                    <th style="text-align: right"><span id="sumamount"></span><input type="hidden" id="sumamount1">
                    </th>
                </tr>
                <tr>
                    <th colspan="2" rowspan="4"></th>
                    <th colspan="3">Total dalam USD</th>
                    <th colspan="2" style="text-align: right">$<span id="totalusd">1.578</span></th>
                </tr>
                <tr>
                    <th colspan="3">Total dalam IDR</th>
                    <th colspan="2" style="text-align: right"><span id="totalidr">25.924.600</span></th>
                </tr>
                <tr>
                    <th colspan="3"><span id="deposito"></span></th>
                    <th colspan="2" style="text-align: right"><span id="hasildeposito"></span></th>
                </tr>
                <tr>
                    <th colspan="3"><span id="sstatus">TEST</span></th>
                    <th colspan="2" style="text-align: right"><span id="sisadeposit"></span></th>
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
        <table>
            <tbody>
                <tr>
                    <td>
                        <table border="1" style="border-collapse: collapse; text-align: left;" cellpadding="5px">
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
                                    <td style="width: 50%; text-align: center;">
                                        <span>Approve By</span> <br>
                                        <img src="{{ asset('assets/compiled/png/logo.png') }}" alt="logo"
                                            width="120px" style="border-radius: 50%;"> <br>
                                        <span><b><u>Fatimah Az zahra</u></b></span> <br>
                                        <span>Finance</span>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            var jwtToken = localStorage.getItem('jwtToken');
            fetchPaymentData(jwtToken);

            function fetchPaymentData(jwtToken) {
                var paymentIdBase64 = "{{ $data['idpage'] }}";
                var paymentId = atob(paymentIdBase64);
                if (jwtToken) {
                    $.ajax({
                        url: "{{ route('payment') }}/" + paymentId,
                        type: 'GET',
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('Authorization', 'Bearer ' + jwtToken);
                        },
                        success: function(response) {
                            $('#namaagen').html(response.booking.agent.nama_agent);
                            $('#noinvoice').html(response.id_booking);
                            $('#tglinvoice').html(formatDate(response.booking.tgl_booking));
                            $('#namahotel').html(response.booking.hotel.nama_hotel);
                            $('#checkin').html(formatDate(response.booking.check_in));
                            $('#checkout').html(formatDate(response.booking.check_out));
                            var ttlamount = response.booking.total_subtotal;
                            var ttlusd = ttlamount * response.sar_usd;
                            var ttlidr = ttlamount * response.sar_idr;
                            $('#totalusd').html(formatCurrencyID(ttlusd));
                            $('#totalidr').html(formatCurrencyID(ttlidr));
                            $('#sstatus').html(response.booking.status);

                            var detailpay = response.detailpay;
                            var sumDeposit = 0;
                            var formattedSumDeposit = 0;
                            var sisaDeposit = 0;

                            // Loop through each deposit in detailpay array
                            detailpay.forEach(function(detail, index) {
                                sumDeposit += parseFloat(detail
                                    .deposit
                                ); // Convert deposit to a number and accumulate the total

                                // Update the content of the deposito span
                                var depositSpan = $('#deposito');
                                depositSpan.append('<span id="deposit' + (index + 1) +
                                    '">Deposit ' + (index + 1) + ' ' + formatDate2(detail
                                        .tgl_payment) + '</span><br>');

                                // Update the content of the hasildeposito span with formatted deposit value
                                var hasildepositSpan = $('#hasildeposito');
                                hasildepositSpan.append('<span id="hasildeposito' + (index +
                                        1) + '">' + formatCurrencyID(detail.deposit) +
                                    '</span><br>');
                            });

                            // Calculate sisaDeposit
                            sisaDeposit = parseFloat(response.hasil_konversi) - sumDeposit;

                            // Format sumDeposit and sisaDeposit for display
                            formattedSumDeposit = formatCurrencyID(sumDeposit);
                            sisaDeposit = formatCurrencyID(sisaDeposit);

                            // Update the HTML content of sisadeposit and sumdeposit elements
                            $('#sisadeposit').html(sisaDeposit);
                            $('#sumdeposit').html(formattedSumDeposit);
                            window.print();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    console.error('JWT token not found in localStorage.');
                }
            }

            function formatDate(dateTimeString) {
                var dateTime = new Date(dateTimeString);
                var day = ('0' + dateTime.getDate()).slice(-2);
                var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                ];
                var monthIndex = dateTime.getMonth();
                var year = dateTime.getFullYear();
                return day + ' ' + monthNames[monthIndex] + ' ' + year;
            }

            function formatDate2(dateTimeString) {
                var dateTime = new Date(dateTimeString);
                var day = ('0' + dateTime.getDate()).slice(-2);
                var month = ('0' + (dateTime.getMonth() + 1)).slice(-2);
                var year = dateTime.getFullYear();
                return day + '/' + month + '/' + year;
            }
            getDetail();

            function getDetail() {
                var id = '{{ $data['autoId'] }}';
                var idWithHyphens = id.replace(/\//g, '-');
                var totalQty = 0;
                var totalSubtotal = 0;
                $.ajax({
                    url: "{{ route('booking_d_inv', ['id' => ':id']) }}".replace(':id', idWithHyphens),
                    type: 'GET',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer ' + jwtToken);
                    },
                    success: function(data) {
                        // Clear existing rows
                        $('#invoiceDetailsBody').empty();
                        // Append new rows based on received data
                        $.each(data, function(index, item) {
                            totalQty += item.qty;
                            totalSubtotal += parseFloat(item.subtotal);

                            var row = '<tr>' +
                                '<td style="text-align: center">' + item.room.keterangan +
                                '</td>' +
                                '<td style="text-align: center">' + item.qty +
                                '</td>' +
                                '<td style="text-align: center">' + item.malam + '</td>' +
                                '<td style="text-align: left">SAR</td>' +
                                '<td style="text-align: right">' + formatCurrencyID(item
                                    .tarif) + '</td>' +
                                '<td style="text-align: left">SAR</td>' +
                                '<td style="text-align: right">' + formatCurrencyID(item
                                    .subtotal) + '</td>' +
                                '</tr>';
                            $('#invoiceDetailsBody').append(row);
                        });
                        $('#sumqty').html(totalQty);
                        $('#sumamount').html(formatCurrencyID(totalSubtotal));
                        $('#sumamount1').val(totalSubtotal);
                    },
                    error: function(xhr, status, error) {
                        console.error(status + ': ' + error);
                    }
                });
            }

            function formatCurrencyID(value) {
                var numericValue = parseFloat(value);
                if (isNaN(numericValue)) {
                    return '';
                }
                return numericValue.toLocaleString('id-ID');
            }
        });
    </script>
</body>

</html>
