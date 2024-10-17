<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data_buku = Buku::all();

        $jumlah_buku = $data_buku->count();
        $total_harga = $data_buku->sum('harga');

        return view('auth.dashboard', compact('data_buku', 'jumlah_buku', 'total_harga'));
    }

    public function create() {
        return view('buku.create');
    }

    public function store(Request $request) {
        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect('/buku');
    }

    public function show(string $id) {
        //
    }

    public function edit(string $id) {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }
    
    public function update(Request $request, string $id) {
        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect('/buku');
    }

    public function destroy(string $id) {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('/buku');
    }
}

