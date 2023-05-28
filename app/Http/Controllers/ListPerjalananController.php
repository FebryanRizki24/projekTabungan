<?php

namespace App\Http\Controllers;

use App\Models\ListPerjalanan;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreListPerjalananRequest;
use App\Http\Requests\UpdateListPerjalananRequest;

class ListPerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('listPerjalanan');
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
    public function store(StoreListPerjalananRequest $request)
    {
        $validatedData = Validator::make($request->all(),[
            'nama' => 'required',
            'biaya' => 'required',
            // Tambahkan aturan validasi untuk kolom lainnya
        ]);

        // return response()->json(['message' => 'Data inserted successfully']);
        if($validatedData->fails()) return redirect()->back()->withInput()->withErrors($validatedData);

        $data['nama'] = $request->nama;
        $data['biaya'] = $request->biaya;
        if ($data['biaya'] < 100000) {
            $keterangan = 'nabung lagi';
        }else{
            $keterangan = 'berangkaat';
        }
        $data['keterangan'] = $keterangan;

        ListPerjalanan::create($data);

        return redirect()->route('listPerjalanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ListPerjalanan $listPerjalanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListPerjalanan $listPerjalanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListPerjalananRequest $request, ListPerjalanan $listPerjalanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(ListPerjalanan $listPerjalanan, $id)
    {
        $data = ListPerjalanan::find($id);

        if ($data) {
            $data->delete();
        }
        
        return redirect()->route('home');
    }
}
