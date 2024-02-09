<?php

namespace App\Http\Controllers;

use App\Models\Booking;

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
        $lastBooking = Booking::orderBy('id_booking', 'desc')->first();
        $lastId = $lastBooking ? (int) substr($lastBooking->id, 0, 3) + 1 : 1;
        $paddedId = str_pad($lastId, 3, '0', STR_PAD_LEFT);
        $autoId = $paddedId . '/INV-HTL/II/' . $currentYear;
        $pageTitle = 'Add Booking - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
            'autoId' => $autoId,
        );
        return view('page.booking.tambah', compact('data'));
    }

    public function editBooking($id)
    {

        $pageTitle = 'Edit Booking - PT RIZQUNA MEKAH MADINAH';
        $data = array(
            'pageTitle' => $pageTitle,
            'idpage' => $id,
        );

        return view('page.booking.edit', compact('data'));
    }
}
