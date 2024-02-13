<script>
    $(document).ready(function() {
        var token = localStorage.getItem('jwtToken');

        $.ajax({
            url: "{{ route('payment') }}",
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function(data) {
                function formatDate(dateTimeString) {
                    var dateTime = new Date(dateTimeString);
                    var day = ('0' + dateTime.getDate()).slice(-
                        2); // Get day and pad with leading zero if needed
                    var month = ('0' + (dateTime.getMonth() + 1)).slice(-
                        2); // Get month and pad with leading zero if needed
                    var year = dateTime.getFullYear(); // Get full year
                    return day + '/' + month + '/' + year;
                }
                $.each(data, function(index, payment) {
                    console.log(payment);
                    var editHref = "{{ route('p.payment', ['id' => ':id']) }}";
                    var paymentIdBase64 = btoa(payment.id_payment);
                    editHref = editHref.replace(':id', paymentIdBase64);

                    var row = '<tr>' +
                        '<td><a href="' + editHref +
                        '" class="btn btn-light btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="bi bi-search"></i></a> ' +
                        '<td>' + payment.id_booking + '</td>' +
                        '<td>' + formatDate(payment.booking.tgl_booking) + '</td>' +
                        '<td>' + payment.booking.agent.nama_agent + '</td>' +
                        '<td>' + payment.hasil_konversi + '</td>' +
                        '</tr>';
                    $('#table1 tbody').append(row);
                });

                // Initialize DataTable after populating the table
                $('#table1').DataTable({
                    "searching": true,
                    "ordering": true,
                    "paging": true
                });
            }
        });
    });
</script>
