<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
