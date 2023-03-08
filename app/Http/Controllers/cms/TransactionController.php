<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->paginate(10);
        return view('backend.transaction.index', compact('transactions'));
    }

    public function show($id)
    {
        $transactions = Transaction::findOrFail($id);
        return view('backend.transaction.show', compact('transactions'));
    }
}
