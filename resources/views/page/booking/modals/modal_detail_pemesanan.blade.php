<div class="modal fade" id="detailPemesananModal" tabindex="-1" role="dialog" aria-labelledby="detailPemesananModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailPemesananModalLabel">Add Detail Pemesanan</h5>
                <button type="button" class="close" id="closeModalBtnBooking1" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="detailPemesananForm" class="form" method="POST" action="#" data-parsley-validate>
                <div class="modal-body">
                    <!-- Your form for adding detail pemesanan goes here -->
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mandatory">
                                <label for="hotel_nama" class="form-label">Hotel</label>
                                <div class="input-group">
                                    <input type="hidden" id="booking_id" class="form-control" name="booking_id"
                                        value="{{ $data['autoId'] }}" readonly />
                                    <input type="hidden" id="hotel_id" class="form-control" placeholder="Hotel"
                                        name="hotel_id" data-parsley-required="true" readonly />
                                    <input type="text" id="hotel_nama" class="form-control" placeholder="Hotel"
                                        readonly />
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="searchButtonHotel">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group mandatory">
                                <label for="room_id" class="form-label">Tipe Kamar</label>
                                <select id="room_id" name="room_id" class="form-select" data-parsley-required="true"
                                    disabled>
                                    <!-- Options will be populated dynamically -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group mandatory">
                                <label for="qty" class="form-label">Quantity</label>
                                <input type="number" id="qty" class="form-control" placeholder="0" name="qty"
                                    data-parsley-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-12">
                            <div class="form-group mandatory">
                                <label for="check_in" class="form-label">Check In</label>
                                <input type="date" id="check_in" class="form-control" placeholder="Check In"
                                    name="check_in" data-parsley-required="true" />
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="form-group mandatory">
                                <label for="check_out" class="form-label">Check Out</label>
                                <input type="date" id="check_out" class="form-control" placeholder="Check Out"
                                    name="check_out" data-parsley-required="true" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group mandatory">
                                <label for="malam" class="form-label">Malam</label>
                                <input type="number" id="malam" class="form-control" placeholder="0" name="malam"
                                    data-parsley-required="true" value="0" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-12">
                            <div class="form-group mandatory">
                                <label for="mata_uang" class="form-label">Mata Uang</label>
                                <select id="mata_uang" name="mata_uang" class="form-select"
                                    data-parsley-required="true">
                                    <option value="SAR">SAR</option>
                                    <option value="$US">$US</option>
                                    <option value="IDR">IDR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group mandatory">
                                <label for="tarif" class="form-label">Tarif</label>
                                <input type="number" id="tarif" class="form-control" placeholder="Tarif"
                                    name="tarif" data-parsley-required="true" step="0.01" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group mandatory">
                                <label for="discount" class="form-label">Diskon</label>
                                <input type="number" id="discount" class="form-control" placeholder="0"
                                    name="discount" data-parsley-required="true" value="0" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group mandatory">
                                <label for="subtotal" class="form-label">Sub Total</label>
                                <input type="number" id="subtotal" class="form-control" placeholder="Sub Total"
                                    name="subtotal" data-parsley-required="true" value="0" readonly />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeModalBtnBooking">Close</button>
                    <button type="submit" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
