<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $data = [
            'id' => "posts",
            'menu' => 'Gallery',
            'galleries' => Post::where('picture', '!=', '')
                               ->whereNotNull('picture')
                               ->orderBy('created_at', 'desc')
                               ->paginate(30)
        ];
        return view('gallery.index')->with($data);
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
        ]);
    
        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . '_' . time();
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);
        } else {
            $filenameSimpan = 'noimage.png';
        }
    
        $post = new Post;
        $post->picture = $filenameSimpan;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();
    
        return redirect('gallery')->with('success', 'Berhasil menambahkan data baru');
    }

    public function edit($id)
    {
        $gallery = Post::findOrFail($id); 
        return view('gallery.edit', compact('gallery')); 
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
        ]);

        $gallery = Post::findOrFail($id);
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');

        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . '_' . time();
            $filenameSimpan = "{$basename}.{$extension}";
            $request->file('picture')->storeAs('posts_image', $filenameSimpan);
            $gallery->picture = $filenameSimpan;
        }

        $gallery->save();

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery updated successfully');
    }

    public function destroy(string $id) {
        $buku = Post::find($id);
        $buku->delete();

        return redirect('/gallery');
    }
}

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'title' => 'required|max:255',
    //         'description' => 'required',
    //         'picture' => 'image|nullable|max:1999'
    //     ]);

    //     $post = Post::find($id);
    //     if (!$post) {
    //         return redirect()->route('gallery.index')->with('error', 'Data tidak ditemukan');
    //     }

    //     if ($request->hasFile('picture')) {
    //         // Hapus gambar lama jika ada
    //         if ($post->picture && $post->picture !== 'noimage.png') {
    //             Storage::delete('posts_image/' . $post->picture);
    //         }

    //         // Proses upload gambar baru
    //         $filenameWithExt = $request->file('picture')->getClientOriginalName();
    //         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //         $extension = $request->file('picture')->getClientOriginalExtension();
    //         $basename = uniqid() . '_' . time();
    //         $filenameSimpan = "{$basename}.{$extension}";
    //         $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);
    //         $post->picture = $filenameSimpan;
    //     }

    //     // Update data lain
    //     $post->title = $request->input('title');
    //     $post->description = $request->input('description');
    //     $post->save();

    //     return redirect()->route('gallery.index')->with('success', 'Data berhasil diperbarui');
    // }

