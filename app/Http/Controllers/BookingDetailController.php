<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingDetail;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookingDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $booking_ds = BookingDetail::all();
        return response()->json($booking_ds);
    }

    public function show($id)
    {
        try {
            $booking_d = BookingDetail::find($id);
            return response()->json($booking_d);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Detail Booking not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $booking_d = BookingDetail::create($request->all());

        return response()->json($booking_d, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $booking_d = BookingDetail::findOrFail($id);
            $booking_d->update($request->all());
            return response()->json($booking_d, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Detail Booking not found'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $booking_d = BookingDetail::findOrFail($id);
            $booking_d->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Detail Booking Not Found'], 404);
        }
    }
}
