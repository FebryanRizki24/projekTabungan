<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\User;
use App\Http\Requests\StorePengeluaranRequest;
use App\Http\Requests\UpdatePengeluaranRequest;
use Illuminate\Support\Facades\Validator;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Pengeluaran::get();
        $dataUser = User::all();
        return view('pengeluaran', compact('data', 'dataUser'));
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
    public function store(StorePengeluaranRequest $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'keterangan' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
            // Tambahkan aturan validasi untuk kolom lainnya
        ]);

        // return response()->json(['message' => 'Data inserted successfully']);
        if($validatedData->fails()) return redirect()->back()->withInput()->withErrors($validatedData);

        $data['name'] = $request->name;
        $data['keterangan'] = $request->keterangan;
        $data['nominal'] = $request->nominal;
        $data['tanggal'] = $request->tanggal;

        Pengeluaran::create($data);

        return redirect()->route('pengeluaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran, $id)
    {
        $data = Pengeluaran::find($id);

        return view('editPengeluaran', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengeluaranRequest $request, $id)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'keterangan' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
            // Tambahkan aturan validasi untuk kolom lainnya
        ]);

        // return response()->json(['message' => 'Data inserted successfully']);
        if($validatedData->fails()) return redirect()->back()->withInput()->withErrors($validatedData);

        $data['name'] = $request->name;
        $data['keterangan'] = $request->keterangan;
        $data['nominal'] = $request->nominal;
        $data['tanggal'] = $request->tanggal;

        Pengeluaran::whereId($id)->update($data);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Pengeluaran $pengeluaran, $id)
    {
            $data = Pengeluaran::find($id);
    
            if ($data) {
                $data->delete();
            }
            
            return redirect()->route('home');
    }
}
