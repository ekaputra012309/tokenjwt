<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;

class PagesController extends Controller
{
    public function signin()
    {
        $pageTitle = 'Login - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
        );
        return view('page.login', compact('data'));
    }

    public function dash()
    {

        $pageTitle = 'Dashboard - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
        );
        return view('page.dashboard', compact('data'));
    }

    public function hotel()
    {

        $pageTitle = 'Hotel - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
        );
        return view('page.hotel.hotel', compact('data'));
    }

    public function tambahHotel()
    {

        $pageTitle = 'Add Hotel - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
        );
        return view('page.hotel.tambah', compact('data'));
    }

    public function editHotel($id)
    {

        $pageTitle = 'Edit Hotel - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
            'idpage' => $id,
        );

        return view('page.hotel.edit', compact('data'));
    }

    public function room()
    {

        $pageTitle = 'Room - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
        );
        return view('page.room.room', compact('data'));
    }

    public function tambahRoom()
    {

        $pageTitle = 'Add Room - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
        );
        return view('page.room.tambah', compact('data'));
    }

    public function editRoom($id)
    {

        $pageTitle = 'Edit Room - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
            'idpage' => $id,
        );

        return view('page.room.edit', compact('data'));
    }

    public function agent()
    {

        $pageTitle = 'Agent - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
        );
        return view('page.agent.agent', compact('data'));
    }

    public function tambahAgent()
    {

        $pageTitle = 'Add Agent - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
        );
        return view('page.agent.tambah', compact('data'));
    }

    public function editAgent($id)
    {

        $pageTitle = 'Edit Agent - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
            'idpage' => $id,
        );

        return view('page.agent.edit', compact('data'));
    }

    public function rekening()
    {

        $pageTitle = 'Rekening - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
        );
        return view('page.rekening.rekening', compact('data'));
    }

    public function tambahRekening()
    {

        $pageTitle = 'Add Rekening - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
        );
        return view('page.rekening.tambah', compact('data'));
    }

    public function editRekening($id)
    {

        $pageTitle = 'Edit Rekening - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
            'idpage' => $id,
        );

        return view('page.rekening.edit', compact('data'));
    }

    public function booking()
    {
        $pageTitle = 'Booking - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
        );
        return view('page.booking.booking', compact('data'));
    }

    public function tambahBooking()
    {
        $currentYear = date('Y');

        // Find the maximum ID from existing bookings
        $maxId = Booking::max('booking_id');

        // Extract the numeric part and increment by 1
        $numericPart = (int)explode('/', $maxId)[0]; // Extract "002" from "002/INV-HTL/II/2024"
        $newNumericPart = $numericPart + 1;

        // Format the new ID to a 3-digit string
        $newId = str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);

        $autoId = $newId . '/INV-HTL/II/' . $currentYear;
        $pageTitle = 'Add Booking - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
            'autoId' => $autoId,
        );

        return view('page.booking.tambah', compact('data'));
    }

    public function editBooking($id)
    {
        $autoId = Booking::where('id_booking', base64_decode($id))->value('booking_id');
        $pageTitle = 'Edit Booking - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
            'idpage' => $id,
            'autoId' => $autoId,
        );

        return view('page.booking.edit', compact('data'));
    }

    public function payment()
    {
        $pageTitle = 'Payment - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
        );
        return view('page.payment.payment', compact('data'));
    }

    public function lihatPayment($id)
    {
        $autoId = Payment::where('id_payment', base64_decode($id))->value('id_booking');
        $pageTitle = 'Detail Payment - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
            'idpage' => $id,
            'autoId' => $autoId,
        );

        return view('page.payment.lihat', compact('data'));
    }

    public function cetakPayment($id)
    {
        $autoId = Payment::where('id_payment', base64_decode($id))->value('id_booking');
        $pageTitle = 'Invoice ';
        $data = array(
            'pageTitle' => $pageTitle,
            'idpage' => $id,
            'autoId' => $autoId,
        );

        return view('page.payment.cetak', compact('data'));
    }

}
