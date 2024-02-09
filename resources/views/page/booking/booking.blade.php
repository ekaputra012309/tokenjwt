@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Pemesanan Hotel</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('p.dash') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Pemesanan Hotel</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="m-0"> </h5>
                        <div>
                            <a href="{{ route('p.booking.tambah') }}" class="btn btn-primary btn-sm"><i
                                    class="bi bi-plus-square"></i> Add Pemesanan</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Pemesanan</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Agen</th>
                                    <th>Hotel</th>
                                    <th>Tipe Kamar</th>
                                    <th>Periode</th>
                                    <th>Sub Total</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>

    </div>

    <script>
        $(document).ready(function() {
            var token = localStorage.getItem('jwtToken');

            $.ajax({
                url: "{{ route('booking') }}",
                type: "GET",
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(data) {
                    $.each(data, function(index, booking) {
                        var editHref = "{{ route('p.booking.edit', ['id' => ':id']) }}";
                        var bookingIdBase64 = btoa(booking.id_booking);
                        editHref = editHref.replace(':id', bookingIdBase64);
                        var periode = booking.details.check_in + ' - ' + booking.details
                            .check_out;
                        var subTotal = booking.total_subtotal;
                        var total = subTotal - (subTotal * booking.total_discount / 100);

                        var row = '<tr>' +
                            '<td><a href="' + editHref +
                            '" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a> ' +
                            '<button class="btn btn-danger btn-sm delete-btn" data-id="' +
                            booking
                            .id_booking +
                            '" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"><i class="bi bi-trash"></i></button>' +
                            '<td>' + booking.booking_id + '</td>' +
                            '<td>' + booking.tgl_booking + '</td>' +
                            '<td>' + booking.agent.nama_agent + '</td>' +
                            '<td>' + booking.details.hotel.nama_hotel + '</td>' +
                            '<td>' + booking.details.room.nama_kamar + '</td>' +
                            '<td>' + periode + '</td>' +
                            '<td>' + subTotal + '</td>' +
                            '<td>' + total + '</td>' +
                            '</tr>';
                        $('#table1 tbody').append(row);
                    });

                    // Initialize DataTable after populating the table
                    $('#table1').DataTable({
                        "searching": true,
                        "ordering": true,
                        "paging": true
                    });

                    // Add click event listener to delete buttons
                    $('.delete-btn').click(function() {
                        var bookingId = $(this).data('id');
                        if (confirm('Are you sure you want to delete this booking?')) {
                            // Perform deletion using AJAX
                            $.ajax({
                                url: "{{ route('booking') }}/" + bookingId,
                                type: "DELETE",
                                headers: {
                                    'Authorization': 'Bearer ' + token
                                },
                                success: function(response) {
                                    // Reload the page or update the table as needed
                                    alert('Booking deleted successfully!');
                                    location
                                        .reload(); // Reload the page after deletion
                                },
                                error: function(xhr, status, error) {
                                    alert(
                                        'An error occurred while deleting the pemesanan.'
                                    );
                                    console.error(xhr.responseText);
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
