<?php
namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['username']           = 'Lindy';
        $data['birthdate']          = new DateTime('1998-05-06');
        $today                      = new DateTime();
        $birthdate                  = new DateTime('1998-06-15');
        $today                      = new DateTime();
        $data['my_age']             = $today->diff($birthdate)->y; 
        $data['hobbies']            = ['Menulis', 'Bermain Game', 'Berenang', 'Berenang', 'Memasak'];
        $data['current_semester']   = 4;
        $wisuda_date                = new DateTime('2025-10-30');
        $data['time_to_study_left'] = $today->diff($wisuda_date)->days;
        $data['tgl_harus_wisuda']   = '2025-10-30';

        if ($data['current_semester'] < 3) {
            $data['semester_message'] = 'Masih Awal, Kejar TAK';
        } else {
            $data['semester_message'] = 'Jangan main-main, kurang-kurangi main game!';
        }
        $data['future_goal'] = 'Menjadi seorang pengusaha sukses';
        return view('coba', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
