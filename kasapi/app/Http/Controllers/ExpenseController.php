<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $expense = Expense::create([
            'amount' => $data['amount'],
            'description' => $data['description'],
            'user_id' => auth()->user()->id,
        ]);

        // Lakukan tindakan lain jika diperlukan (misalnya, mengirim email pemberitahuan, menghitung saldo pengguna, dll.)

        return redirect()->back()->with('success', 'Pengeluaran berhasil disimpan.');
    }
}
