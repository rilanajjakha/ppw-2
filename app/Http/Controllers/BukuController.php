<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Storage;


class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
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
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
            'photo' => 'image|nullable|max:1999',
        ]);

        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('photos', $filenameSimpan);
        }

        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->photo = $path ?? null;

        $buku->save();

        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(string $id) {
        //
    }

    public function edit(string $id) {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
            'photo' => 'image|nullable|max:1999',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;

        if ($request->hasFile('photo')) {
            if ($buku->photo && Storage::exists($buku->photo)) {
                Storage::delete($buku->photo);
            }

            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('photos', $filenameSimpan);
            $buku->photo = $path;
        }
        $buku->save();
        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil diperbarui');
    }

    public function destroy(string $id) {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('/buku');
    }
}

