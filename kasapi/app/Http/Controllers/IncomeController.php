<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;

class IncomeController extends Controller
{
    public function create()
    {
        // Tampilkan form untuk menambahkan uang masuk
        return view('income.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
        ]);

        // Simpan data uang masuk ke database
        $income = new Income;
        $income->amount = $validatedData['amount'];
        $income->description = $validatedData['description'];
        $income->save();

        // Redirect ke halaman yang sesuai
        return redirect()->back()->with('success', 'Uang masuk berhasil ditambahkan.');
    }
}

