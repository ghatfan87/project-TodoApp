<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan halaman awal dan semua data
        return view('halaman_login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function dashboard()
    {
        return view('dashboard');
    }

    public function regist()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //untuk menampilkan halaman form data
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk mengirim data baru ke database
        $request->validate([
            'tittle'=> 'required|min:3',
            'date'=> 'required',
            'description'=>'required|min:8',
        ]);
        //kirim data ke database yg table todos : model todo
        //yang '' nama column
        //yg $request-> = value name
        //kenapa kirim 5 data pdhl di input ada 3 inputan? kl di cek ditable todos kan ada 6 column yg harus diisi, salah satunya column done_date yg nullable,kl nullable itu gausa diisi juga gpp jd gadiisi dl
        //user_id ngambil id dari fitur auth (history login),supaya tau itu todo punya siapa
        //column status  kan boolean, jadi kalo status si todo blm dikerjain = 0
        Todo::create([
            'tittle'=> $request->tittle,
            'date'=> $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);
        //kl berhasil tmbh ke db,bakal diarahin ke halaman dashboard dengan menampilkan pemberitahuan
        return redirect('/dashboard')->with('addTodo', 'Berhasil menambahkan data Todo!');
    }

    public function data()
    {
        //ambil data dari table todos
        $todos = Todo::all();
        //compact untuk mengirim data ke bladenya
    return view('data', compact('todos'));
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //menampilkan spesifikasi database
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan halaman input form edit data
        // parameter $id mengambil data path dinamis {id}
        // ambil satu baris data yang memiliki value column id sama dengan data path dinamis id yg dikirim ke route
        $todo = Todo::where('id', $id)->first();
        // kemudian arahkan/tampilkan file view yg bernama edit.blade.php dan kirim data dari $todo ke file edit tersebut dengan bantuan compact
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mengupdate data di database
        // validasi
        $request->validate([
            'tittle'=> 'required|min:3',
            'date'=> 'required',
            'description'=>'required|min:8',
        ]);
        Todo::where('id', $id)->update([
            'tittle'=> $request->tittle,
            'date'=> $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);
        // kalau berhasil, arahkan halaman ke halaman data dengan pemberitahuan berhasil
        return redirect('/data')->with('succesUpdate', 'Berhasil mengubah data Todo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data di database
        Todo::where('id', $id)
        ->delete();
        return redirect('/data')->with('succesDelete', 'Berhasil menghapus data!');

    }
    
    public function updateToComplated( Request $request, $id)
    {
    Todo::where('id', '=', $id)->update([
        'status'=> 1,
        'done_time' => \Carbon\Carbon::now(),

    ]);
    return redirect()->back()->with('done','Todo telah selesai dikerjakan');
}
}


 
