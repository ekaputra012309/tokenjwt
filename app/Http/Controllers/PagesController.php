<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function signin()
    {
        $pageTitle = 'Login - PT RIZQUNA MEKAH MADINAH';

        return view('page.login', compact('pageTitle'));
    }

    public function dash()
    {

        $pageTitle = 'Dashboard - PT RIZQUNA MEKAH MADINAH';

        return view('page.dashboard', compact('pageTitle'));
    }

    public function hotel()
    {

        $pageTitle = 'Hotel - PT RIZQUNA MEKAH MADINAH';

        return view('page.hotel.hotel', compact('pageTitle'));
    }

    public function tambahHotel()
    {

        $pageTitle = 'Add Hotel - PT RIZQUNA MEKAH MADINAH';

        return view('page.hotel.tambah', compact('pageTitle'));
    }

    public function editHotel($id)
    {

        $pageTitle = 'Edit Hotel - PT RIZQUNA MEKAH MADINAH';

        return view('page.hotel.edit', compact('pageTitle'));
    }

    public function room()
    {

        $pageTitle = 'Room - PT RIZQUNA MEKAH MADINAH';

        return view('page.room.room', compact('pageTitle'));
    }

    public function tambahRoom()
    {

        $pageTitle = 'Add Room - PT RIZQUNA MEKAH MADINAH';

        return view('page.room.tambah', compact('pageTitle'));
    }
}
