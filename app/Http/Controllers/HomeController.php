<?php

namespace App\Http\Controllers;

use App\Models\ListPerjalanan;
use App\Models\User;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = User::all();
        $dataPem = Pemasukan::all();
        $dataPeng = Pengeluaran::all();
        $dataPer = ListPerjalanan::all();

        // $item = count($dataPem);
            $totalPemasukan = Pemasukan::sum('nominal');
            $totalPengeluaran = Pengeluaran::sum('nominal');
    
            $sisaSaldo = $totalPemasukan - $totalPengeluaran;

        return view('home', compact('data' , 'dataPem', 'dataPeng', 'sisaSaldo', 'dataPer'));
    }
    public function delete(Pengeluaran $pengeluaran, $id)
    {
            $data = User::find($id);
    
            if ($data) {
                $data->delete();
            }
            
            return redirect()->route('home');
    }
}
