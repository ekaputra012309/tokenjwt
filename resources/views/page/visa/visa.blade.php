@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Payment Visa</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('p.dash') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Payment Visa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0"> </h5>
                    <div>
                        <a href="{{ route('p.visa.tambah') }}" class="btn btn-primary btn-sm"><i
                                class="bi bi-plus-square"></i> Add Transaction</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Tanggal Invoice</th>
                                <th>Agen</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            var token = localStorage.getItem('jwtToken');

            $.ajax({
                url: "{{ route('visa') }}",
                type: "GET",
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                dataType: "json",
                success: function(data) {
                    $('#table1').DataTable({
                        "data": data,
                        "columns": [{
                                "data": null,
                                "render": function(data, type, row) {
                                    var editHref =
                                        "{{ route('p.visa.edit', ['id' => ':id']) }}";
                                    var lihatHref =
                                        "{{ route('p.visa.lihat', ['id' => ':id']) }}";
                                    var visaIdBase64 = btoa(row.id_visa);
                                    editHref = editHref.replace(':id', visaIdBase64);
                                    lihatHref = lihatHref.replace(':id', visaIdBase64);
                                    return '<a href="' + lihatHref +
                                        '" class="btn btn-light btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="bi bi-search"></i></a> ' +
                                        '<a href="' + editHref +
                                        '" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a> ' +
                                        '<button class="btn btn-danger btn-sm delete-btn" data-id="' +
                                        row.id_visa +
                                        '" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"><i class="bi bi-trash"></i></button>';
                                }
                            },
                            {
                                "data": "visa_id"
                            },
                            {
                                "data": "tgl_visa",
                                "render": function(data, type, row) {
                                    return formatDate(
                                        data); // Use formatDate function to format date
                                }
                            },
                            {
                                "data": "agent.nama_agent"
                            },
                            {
                                "data": "total"
                            },
                            {
                                "data": "status",
                                "render": function(data, type, row) {
                                    var buttonColor = data === 'Piutang' ? 'danger' :
                                        'success';
                                    var statusLabel = data === 'Piutang' ? 'Piutang' :
                                        'Lunas';
                                    return '<button class="btn btn-' + buttonColor +
                                        ' btn-sm">' + statusLabel + '</button>';
                                }
                            }
                        ]
                    });

                    // Add click event listener to delete buttons
                    $('#table1').on('click', '.delete-btn', function() {
                        var visaId = $(this).data('id');
                        if (confirm('Are you sure you want to delete this visa?')) {
                            // Perform deletion using AJAX
                            $.ajax({
                                url: "{{ route('visa') }}/" + visaId,
                                type: "DELETE",
                                headers: {
                                    'Authorization': 'Bearer ' + token
                                },
                                success: function(response) {
                                    location.reload();
                                },
                                error: function(xhr, status, error) {
                                    alert(
                                        'An error occurred while deleting the visa.'
                                    );
                                    console.error(xhr.responseText);
                                }
                            });
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching visa data:', error);
                }
            });

            function formatDate(dateString) {
                // Parse datetime string to Date object
                var date = new Date(dateString);
                // Get date components
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();
                // Format date as "DD/MM/YYYY"
                var formattedDate = (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month + '/' +
                    year;
                return formattedDate;
            }
        });
    </script>
@endsection
