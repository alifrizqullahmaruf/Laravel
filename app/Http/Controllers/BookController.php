<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batas = 5;
        $jumlah_buku = Book::count();
        $book_data = Book::orderBy('id','desc')->simplePaginate($batas);
        $no = $batas * ($book_data->currentPage() - 1) + 1;        
        return view('book.index', compact('book_data','no','jumlah_buku'));
    }   
    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->kata;
        $book_data = Book::where('judul','like',"%".$cari."%")->orwhere('penulis','like',);
        $book_data = Book::orderBy('id','desc')->simplePaginate($batas);
        $no = $batas * ($book_data->currentPage() - 1) + 1;        
        return view('book.index', compact('book_data','no','jumlah_buku'));
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);
        $book = new Book;
        $book -> judul = $request->judul;
        $book -> penulis = $request->penulis;
        $book -> harga = $request->harga;
        $book -> tgl_terbit = $request->tgl_terbit;
        $book->save();
        return redirect('/Book')->with('AddMassage','Data berhasil di tambahkan');
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

    // Membuat fungsi edit unutk edit data
    public function edit(string $id)
    {
        // mengambil data dari model Book sesuai dengan id yang diminta
        $book_data = Book::findOrFail($id);
        
        // Menampilkan page edit 
        return view('book.edit', compact('book_data'));
    }

    /**
     * Update the specified resource in storage.
     */

    // Membuat fungsi update yang di gunnakan unutk menyimpan perubahan yang ada
    public function update(Request $request, string $id)
    {
        // mengambil data dari model Book sesuai dengan id yang ada
        $book = Book::findOrFail($id);

        // mengambil data yang ada di database
        $book->judul = $request->judul?? $book->judul;
        $book->penulis = $request->penulis?? $book->penulis;
        $book->harga = $request->harga?? $book->harga;
        $book->tgl_terbit = $request->tgl_terbit?? $book->tgl_terbit;
        
        // Menyimpan perubahan 
        $book->update();

        return redirect("/Book")->with('UpdateMassage','Data berhasil diUpdate');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book-> delete();
        return redirect('/Book')->with('DeleteMassage','Data berhasil Dihapus');
    }
}
