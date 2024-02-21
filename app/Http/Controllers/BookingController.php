<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $bookings = Booking::with('agent', 'hotel', 'details')
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json($bookings);
    }

    public function notInPayment()
    {
        $bookingIdsWithPayments = Payment::pluck('id_booking')->toArray();

        $bookingsWithoutPayments = Booking::with('agent', 'hotel', 'details')
            ->whereNotIn('booking_id', $bookingIdsWithPayments)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($bookingsWithoutPayments);
    }


    public function show($id)
    {
        try {
            $booking = Booking::with('agent', 'hotel', 'details')->find($id);
            return response()->json($booking);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Booking not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $booking = Booking::create($request->all());

        return response()->json($booking, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->update($request->all());
            return response()->json($booking, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Booking not found'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            // Retrieve the booking_id before deleting
            $bookingId = Booking::where('id_booking', $id)->value('booking_id');
            // Delete booking details associated with the retrieved booking_id
            BookingDetail::where('booking_id', $bookingId)->delete();
            // Delete the payment
            $paymentId = Payment::where('id_booking', $bookingId)->value('id_payment');
            PaymentDetail::where('id_payment', $paymentId)->delete();
            Payment::where('id_payment', $paymentId)->delete();
            // Delete the booking
            Booking::where('id_booking', $id)->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Booking Not Found'], 404);
        }
    }

    public function updateStatusToLunas(Request $request, $id)
    {
        $idWithSlashes = preg_replace('/-(?!HTL)/', '/', $id);
        try {
            // $booking = Booking::where('id_booking', $idWithSlashes)->firstOrFail();

            // Update only the status field
            // $booking->status = $request->status;
            // $booking->save();
            
            $bookingId = Booking::where('booking_id', $idWithSlashes)->value('id_booking');
            $booking = Booking::findOrFail($bookingId);
            $booking->status = $request->status;
            $booking->save();

            return response()->json($booking, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Booking not found', 'id booking' => $idWithSlashes, 'status' => $request->status], 404);
        }
    }
}
