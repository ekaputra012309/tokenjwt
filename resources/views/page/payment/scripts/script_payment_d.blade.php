<script>
    $(document).ready(function() {
        checkTokenExpiration();

        $('#addDetailPembayaran').on('click', function() {
            $('#detailPembayaranModal').modal('show');
            $('#detailPembayaranForm')[0].reset();
        });
        // Retrieve JWT token from localStorage
        var jwtToken = localStorage.getItem('jwtToken');
        // Retrieve the agent ID from the URL or any other source
        var agentIdBase64 = "{{ $data['idpage'] }}"; // Assuming the agent ID is Base64 encoded
        var agentId = atob(agentIdBase64);
        // Check if JWT token exists
        if (jwtToken) {
            // Send GET request to fetch agent data
            $.ajax({
                url: "{{ route('booking') }}/" + agentId,
                type: 'GET',
                beforeSend: function(xhr) {
                    // Set the Authorization header with JWT token
                    xhr.setRequestHeader('Authorization', 'Bearer ' + jwtToken);
                },
                success: function(response) {
                    // Parse the date string
                    var dateParts = response.tgl_booking.split(' ')[0].split('-');
                    var year = dateParts[0];
                    var month = dateParts[1];
                    var day = dateParts[2];
                    var formattedDate = year + '-' + month + '-' + day;

                    var namaAgen = response.agent.nama_agent + ' - ' + response.agent
                        .contact_person;
                    // Populate form fields with retrieved agent data
                    $('#tgl_booking').val(formattedDate);
                    $('#agent_id').val(response.agent_id);
                    $('#agent_nama').val(namaAgen);
                    $('#keterangan').val(response.keterangan);
                },

                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                }
            });
        } else {
            // Handle case where JWT token is not found in localStorage
            console.error('JWT token not found in localStorage.');
        }

        $('#detailPembayaranForm').submit(function(event) {
            event.preventDefault();
            if (jwtToken) {
                var formData = $(this).serialize();
                // Send POST request with AJAX
                $.ajax({
                    url: "{{ route('payment') }}",
                    type: 'POST',
                    data: formData,
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer ' + jwtToken);
                    },
                    success: function(response) {
                        $('#detailPembayaranModal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                console.error('JWT token not found in localStorage.');
            }
        });

        // Retrieve booking details and populate table
        var id = '{{ $data['autoId'] }}';
        var idWithHyphens = id.replace(/\//g, '-');
        $.ajax({
            url: "{{ route('booking_d_inv', ['id' => ':id']) }}".replace(':id', idWithHyphens),
            type: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + jwtToken);
            },
            success: function(response) {
                if (response.length > 0) {
                    populateTable(response);
                } else {
                    showNoDataMessage();
                }
            },
            error: function(xhr, status, error) {
                handleAjaxError();
            }
        });

        // Function to populate table with booking details
        function populateTable(data) {
            var totalDiscount = 0;
            var totalSubtotal = 0;
            var tableBody = $('#detailPesananTable tbody');
            tableBody.empty(); // Clear previous data

            $.each(data, function(index, detail) {
                totalDiscount += parseFloat(detail.discount);
                totalSubtotal += parseFloat(detail.subtotal);

                var formattedCheckInDate = formatDate(detail.check_in);
                var formattedCheckOutDate = formatDate(detail.check_out);
                var row = '<tr>' +
                    '<td>' + detail.hotel.nama_hotel + '</td>' +
                    '<td>' + detail.room.keterangan + '</td>' +
                    '<td>' + detail.qty + '</td>' +
                    '<td>' + formattedCheckInDate + '</td>' +
                    '<td>' + formattedCheckOutDate + '</td>' +
                    '<td>' + detail.malam + '</td>' +
                    '<td>' + detail.mata_uang + '</td>' +
                    '<td>' + detail.tarif + '</td>' +
                    '<td>' + detail.discount + '</td>' +
                    '<td>' + detail.subtotal + '</td>' +
                    '</tr>';
                tableBody.append(row);
            });

            $('#total_discount').val(totalDiscount.toFixed(2));
            $('#total_subtotal').val(totalSubtotal.toFixed(2));

            $('.delete-btn').click(function() {
                var bookingId = $(this).data('id');
                deleteBooking(bookingId);
            });
        }

        // Function to display "No data" message
        function showNoDataMessage() {
            $('#detailPesananTable tbody').html(
                '<tr><td colspan="10" style="text-align:center">No data record</td></tr>'
            );
        }

        // Function to handle AJAX errors
        function handleAjaxError() {
            // Handle errors here, e.g., display an error message
            $('#detailPesananTable tbody').html(
                '<tr><td colspan="10" style="text-align:center">An error occurred while retrieving data</td></tr>'
            );
        }

        // Function to format date
        function formatDate(dateTimeString) {
            var dateTime = new Date(dateTimeString);
            var day = ('0' + dateTime.getDate()).slice(-2);
            var month = ('0' + (dateTime.getMonth() + 1)).slice(-2);
            var year = dateTime.getFullYear();
            return day + '/' + month + '/' + year;
        }

        $('#metode_bayar_toggle').change(function() {
            var hiddenInput = $('#metode_bayar');
            hiddenInput.val($(this).prop('checked') ? 'Kredit' : 'Tunai');
        });

        $('#closeModalBtnPayment').click(function() {
            $('#detailPembayaranModal').modal('hide');
        });
        $('#closeModalBtnPayment1').click(function() {
            $('#detailPembayaranModal').modal('hide');
        });

        function calculateTagihan() {
            var total_subtotal = parseFloat($('#total_subtotal').val());
            var sar_idr = parseFloat($('#sar_idr').val());
            var usd_idr = parseFloat($('#usd_idr').val());

            var tagihan_sar = total_subtotal * sar_idr;
            var tagihan_usd = total_subtotal * usd_idr;

            $('#tagihan_sar').val(tagihan_sar.toFixed(2));
            $('#tagihan_usd').val(tagihan_usd.toFixed(2));
        }

        // Calculate tagihan_sar and tagihan_usd initially
        calculateTagihan();

        // Calculate tagihan_sar and tagihan_usd when sar_idr or usd_idr changes
        $('#sar_idr, #usd_idr').on('input', function() {
            calculateTagihan();
        });

        // Function to calculate result_sar and result_usd
        function calculateResult() {
            var tagihan_sar = parseFloat($('#tagihan_sar').val());
            var tagihan_usd = parseFloat($('#tagihan_usd').val());
            var deposit = parseFloat($('#deposit').val());

            var result_sar = tagihan_sar - deposit;
            var result_usd = tagihan_usd - deposit;

            $('#result_sar').val(result_sar.toFixed(2));
            $('#result_usd').val(result_usd.toFixed(2));
            $('#deposit_usd').val(deposit);
        }

        // Calculate result_sar and result_usd initially
        calculateResult();

        // Calculate result_sar and result_usd when deposit changes
        $('#deposit').on('input', function() {
            calculateResult();
        });

        refreshTable();

        function refreshTable() {
            var id = '{{ $data['idpage'] }}';

            $.ajax({
                url: "{{ route('payment_inv', ['id' => ':id']) }}".replace(':id', atob(id)),
                type: 'GET',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + jwtToken);
                },
                success: function(response) {
                    $('#listPembayaran tbody').empty();
                    $.each(response, function(index, pembayaran) {
                        var formattedPaymentDate = formatDate(pembayaran.tgl_payment);
                        var row =
                            '<tr>' +
                            '<td>' + formattedPaymentDate + '</td>' +
                            '<td>' + pembayaran.sar_idr + '</td>' +
                            '<td>' + pembayaran.usd_idr + '</td>' +
                            '<td>' + pembayaran.deposit + '</td>' +
                            '<td>' + pembayaran.metode_bayar + '</td>' +
                            '</tr>';
                        $('#listPembayaran tbody').append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
</script>
