<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::all();
        return view('index', compact('data'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);
        
        Produk::create($request->all());

        return redirect()->route('produk.index')->with('success','Produk has been created successfully.');
    }

    public function show(Produk $produk)
    {
        return view('show',compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('edit',compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);
        
        $produk->fill($request->post())->save();

        return redirect()->route('produk.index')->with('success','Produk Has Been updated successfully');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success','Produk has been deleted successfully');
    }
}
