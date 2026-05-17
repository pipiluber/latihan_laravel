<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ImageHelpher;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
    /**\
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('updated_at', 'desc')->get();
        // dd($user);
        return view('backend.v_user.index', ['judul' => 'Data User', 'index' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'backend.v_user.create',
            ['judul' => 'Tambah Data User']
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|Unique:user',
            'role' => 'required',
            'hp' => 'required|min:10|max:13',
            'password' => 'required|min:4|confirmed',
            'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024'
        ], $message = [
            'foto.image' => 'format gambar gunakan file ekstensi jpeg,jpg,png,gif.',
            'foto.max' => 'Ukuran file gambar maksimal adalah 1024 KB.'
        ]);
        $validatedData['status'] = 0;

        if ($request->file('foto')) {
            if ($file = $request->file('foto'));
            $extension = $file->getClientOriginalExtension();
            $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;
            $dicrectory = 'storage/img-user';
            // dd($file);
            ImageHelpher::uploadAndResize($file, $dicrectory, $originalFileName, 385, 400);
            $validatedData['foto'] = $originalFileName;
        }
        $password = $request->input('password');
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/';
        if (preg_match($pattern, $password)) {
            $validatedData['password'] = hash::make($validatedData['password']);
            user::create($validatedData, $message);
            return redirect()->route('backend.user.index')->with('success', 'data berhasil tersimpan');
        } else {
            return redirect()->back()->withErrors(['password' => 'password harus terdir dari kombinasi huruf besar,huruf kecil,angka,dan simbol karakter.']);
        }
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
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('backend.v_user.edit', [
            'judul' => 'Ubah Data User',
            'edit' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $rules = [
            'name' => 'required|max:255',
            'role' => 'required',
            'status' => 'required',
            'hp' => 'required|min:10|max:13',
            'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024'
        ];
        $message = [
            'foto.image' => 'format gambar gunakan file ekstensi jpeg,jpg,png,gif.',
            'foto.max' => 'Ukuran file gambar maksimal adalah 1024 KB.'
        ];

        if ($request->email != $user->email) {

            $rules['email'] = 'required|max:255|email|unique:user';
        }
        $validatedData = $request->validate($rules, $message);
        
        if ($request->file('foto')) {


            if ($user->foto) {
                $oldImagePath = public_path('storage/img-user/' . $user->foto);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;
            $dicrectory = 'storage/img-user';
            ImageHelpher::uploadAndResize($file, $dicrectory, $originalFileName, 385, 400);
            $validatedData['foto'] = $originalFileName;
        }

        $user->update($validatedData);
        return redirect()->route('backend.user.index')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->foto) {
            $oldImagePath = public_path('storage/img-user/') . $user->foto;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $user->delete();
        return redirect()->route('backend.user.index')->with('success', 'data berhasil dihapus');
    }
}
