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

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class=" d-flex justify-content-between align-items-center">
                                    <div>
                                        <button type="button" class="btn btn-danger" id="cetakPembayaran"><i
                                                class="bi bi-filetype-pdf"></i>
                                            Cetak</button>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary" id="addDetailPembayaran"><i
                                                class="bi bi-wallet2"></i> Add
                                            Pembayaran</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group ">
                                            <label for="booking_id" class="form-label">Kode Pemesanan</label>
                                            <input type="text" id="booking_id" class="form-control"
                                                placeholder="Kode Pemesanan" value="{{ $data['autoId'] }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group ">
                                            <label for="tgl_booking" class="form-label">Tanggal Pemesanan</label>
                                            <input type="date" id="tgl_booking" class="form-control"
                                                placeholder="Tanggal Pemesanan" value="{{ date('Y-m-d') }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group ">
                                            <label for="agent_nama" class="form-label">Customer/Agen</label>
                                            <div class="input-group">
                                                <input type="hidden" id="agent_id" class="form-control"
                                                    placeholder="Customer/Agen" readonly />
                                                <input type="text" id="agent_nama" class="form-control"
                                                    placeholder="Customer/Agen" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="table-responsive">
                                            <table class="table" id="detailPesananTable">
                                                <thead>
                                                    <tr>
                                                        <th>Hotel</th>
                                                        <th>Tipe Kamar</th>
                                                        <th>Qty</th>
                                                        <th style="width: 110px">Check In</th>
                                                        <th style="width: 110px">Check Out</th>
                                                        <th>Malam</th>
                                                        <th>Mata Uang</th>
                                                        <th>Tarif</th>
                                                        <th>Diskon</th>
                                                        <th>Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Keterangan</th>
                                                        <th colspan="6">
                                                            <textarea class="form-control" id="keterangan" rows="1" placeholder="Keterangan" readonly></textarea>
                                                        </th>
                                                        <th style="text-align: right; vertical-align: top">Total</th>
                                                        <th style="vertical-align: top"><input id="total_discount"
                                                                type="text" placeholder="0.00" class="form-control"
                                                                value="0" readonly>
                                                        </th>
                                                        <th style="vertical-align: top"><input id="total_subtotal"
                                                                type="text" placeholder="0.00" class="form-control"
                                                                value="0" readonly>
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <h3>List Pembayaran</h3>
                                        <div class="table-responsive">
                                            <table class="table" id="listPembayaran">
                                                <thead>
                                                    <tr>
                                                        <th>Tgl Pembayaran</th>
                                                        <th>Kurs SAR 1 = IDR</th>
                                                        <th>Kurs USD 1 = IDR</th>
                                                        <th>Jumlah Deposit</th>
                                                        <th>Metode Pembayaran</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modals -->
            @include('page.payment.modals.modal_detail_pembayaran')
        </section>
    </div>

    <!-- Scripts -->
    @include('page.payment.scripts.script_payment_d')
@endsection