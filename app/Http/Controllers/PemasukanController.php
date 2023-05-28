<?php

namespace App\Http\Controllers;


use App\Models\Pemasukan;
use App\Models\User;
use App\Http\Requests\StorePemasukanRequest;
use App\Http\Requests\UpdatePemasukanRequest;
use Illuminate\Support\Facades\Validator;

class PemasukanController extends Controller
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
        $data = Pemasukan::get();
        $dataUser = User::all();
        return view('pemasukan', compact('data', 'dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemasukan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePemasukanRequest $request)
    {
        // dd($request->all());
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

        Pemasukan::create($data);

        return redirect()->route('pemasukan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasukan $pemasukan, $id)
    {
        $data = Pemasukan::find($id);

        return view('editPemasukan', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemasukanRequest $request, $id)
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

        Pemasukan::whereId($id)->update($data);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Pemasukan $pemasukan, $id)
    {
        $data = Pemasukan::find($id);

        if ($data) {
            $data->delete();
        }
        
        return redirect()->route('home');
    }
}
