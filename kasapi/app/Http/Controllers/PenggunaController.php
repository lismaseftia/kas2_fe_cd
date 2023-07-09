<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Buat token autentikasi untuk pengguna
        $token = $user->createToken('authToken')->plainTextToken;

        // Berikan respons dengan token
        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request)
    {
        // Validasi data input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Periksa kecocokan email dan password
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Dapatkan pengguna yang telah terautentikasi
        $user = Auth::user();

        // Buat token autentikasi untuk pengguna
        $token = $user->createToken('authToken')->plainTextToken;

        // Berikan respons dengan token
        return response()->json(['token' => $token], 200);
    }
}
