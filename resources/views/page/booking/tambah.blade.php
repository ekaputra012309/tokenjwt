@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Pemesanan Hotel</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('p.dash') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Pemesanan Hotel</li>
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
                                <form id="bookingForm" class="form" method="POST" action="#" data-parsley-validate>
                                    <div class="row">
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="booking_id" class="form-label">Kode Pemesanan</label>
                                                <input type="text" id="booking_id" class="form-control"
                                                    placeholder="Kode Pemesanan" name="booking_id"
                                                    data-parsley-required="true" value="{{ $data['autoId'] }}" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tgl_booking" class="form-label">Tanggal Pemesanan</label>
                                                <input type="date" id="tgl_booking" class="form-control"
                                                    placeholder="Tanggal Pemesanan" name="tgl_booking"
                                                    data-parsley-required="true" value="{{ date('Y-m-d') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="agent_nama" class="form-label">Customer/Agen</label>
                                                <div class="input-group">
                                                    <input type="hidden" id="agent_id" class="form-control"
                                                        placeholder="Customer/Agen" name="agent_id"
                                                        data-parsley-required="true" readonly />
                                                    <input type="text" id="agent_nama" class="form-control"
                                                        placeholder="Customer/Agen" readonly />
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                            id="searchButton">
                                                            <i class="bi bi-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <button type="button" id="addDetailButton" class="btn btn-primary">Add
                                                    Detail
                                                    Pemesanan</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="table-responsive">
                                                <table class="table" id="detailPesananTable">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 100px">#</th>
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
                                                            <th colspan="9" style="text-align: right">Total</th>
                                                            <th><input id="total_discount" name="total_discount"
                                                                    type="text" placeholder="0.00" class="form-control"
                                                                    value="0">
                                                            </th>
                                                            <th><input id="total_subtotal" name="total_subtotal"
                                                                    type="text" placeholder="0.00" class="form-control"
                                                                    value="0">
                                                            </th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mandatory">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Keterangan"
                                                    data-parsley-required="true"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                Reset
                                            </button>
                                            <a href="{{ route('p.booking') }}" class="btn btn-secondary me-1 mb-1">
                                                Back
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modals -->
            @include('page.booking.modals.modal_agent')
            @include('page.booking.modals.modal_detail_pemesanan')
            @include('page.booking.modals.modal_hotel_search')
        </section>
    </div>

    <!-- Scripts -->
    @include('page.booking.scripts.script_booking')
    @include('page.booking.scripts.script_agent_modal')
    @include('page.booking.scripts.script_detail_pemesanan')
    @include('page.booking.scripts.script_hotel_search_modal')
@endsection
