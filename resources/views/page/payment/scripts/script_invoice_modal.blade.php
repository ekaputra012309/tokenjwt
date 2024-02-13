<script>
    $(document).ready(function() {
        var jwtToken = localStorage.getItem('jwtToken');
        // invoice modal script
        $('#searchInv').on('click', function() {
            // AJAX call to retrieve data from invoice API route
            $.ajax({
                url: '{{ route('booking_notin') }}',
                type: 'GET',
                beforeSend: function(xhr) {
                    // Set the Authorization header with JWT token
                    var jwtToken = localStorage.getItem('jwtToken');
                    xhr.setRequestHeader('Authorization', 'Bearer ' + jwtToken);
                },
                success: function(response) {
                    // Populate data into modal table
                    var invoiceTableBody = $('#invoiceTable tbody');
                    invoiceTableBody.empty(); // Clear previous data
                    $.each(response, function(index, invoice) {
                        // Append each invoice as a row in the table
                        invoiceTableBody.append(
                            '<tr><td><button class="selectinvoiceBtn btn btn-primary" data-invoice-id="' +
                            invoice.booking_id + '" data-mata-uang="' + invoice
                            .mata_uang + '" data-subtotal="' + invoice
                            .total_subtotal +
                            '">Pilih</button></td><td>' + invoice.booking_id +
                            '</td><td>' + invoice.tgl_booking + '</td><td>' +
                            invoice.agent.nama_agent + '</td><td>' +
                            invoice.total_subtotal + '</td></tr>');
                    });
                    // Show modal
                    $('#invoiceModal').modal('show');
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });

        $(document).on('click', '.selectinvoiceBtn', function() {
            // Get invoice details from the button's data attributes
            var invoiceId = $(this).data('invoice-id');
            var mataUang = $(this).data('mata-uang');
            var subTotal = $(this).data('subtotal');

            // Set invoice details in the input field
            $('#id_booking').val(invoiceId);
            $('#inv_number').val(invoiceId);
            $('#mata_uang').val(mataUang);
            $('#dari').html(mataUang);
            $('#subtotal').val(subTotal);

            // Close the modal
            $('#invoiceModal').modal('hide');
        });

        $('#invoiceModal').on('shown.bs.modal', function() {
            if (!$.fn.DataTable.isDataTable('#invoiceTable')) {
                $('#invoiceTable').DataTable({
                    "searching": true,
                    "ordering": true,
                    "paging": true
                });
            }
        });

        $('#pilih_konversi').change(function() {
            $('#hasil').html($('#pilih_konversi').val());
        });

        $('#konversi').on('keyup', function() {
            konversiHasil();
        });

        function konversiHasil() {
            var tarif = parseFloat($('#subtotal').val());
            var konversi = parseFloat($('#konversi').val());
            var hasilKonversi = tarif * konversi;

            $('#hasil_konversi').val(hasilKonversi);
        }

        $('#closeModalBtninvoice').click(function() {
            $('#invoiceModal').modal('hide');
        });
        $('#closeModalBtninvoice1').click(function() {
            $('#invoiceModal').modal('hide');
        });

        // form submit
        $('#paymentForm').submit(function(event) {
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
                        // $('#paymentForm')[0].reset();
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
    });
</script>
