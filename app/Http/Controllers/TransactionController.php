<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    // Show the dashboard with transaction summary
    public function showDashboard()
    {
        $transactions = Transactions::all();
        $totalAmount = $transactions->sum('amount');
        return view('dashboard', compact('transactions', 'totalAmount'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transactions::all();
        $totalAmount = $transactions->sum('amount');
        return view('transactions.index', compact('transactions', 'totalAmount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate only form fields
        $validated = $request->validate([
            'type'   => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        // Attach user_id separately
        $validated['user_id'] = Auth::id();

        Transactions::create($validated);
        return redirect()->route('transactions.index')
            ->with('success', 'Transaction added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transactions::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transactions::findOrFail($id);
        return view('transactions.edit', compact('transaction'))
            ->with('success', 'Transaction updated successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transactions::findOrFail($id);
        $transaction->update($request->all());
        return redirect()->route('transactions.index')
            ->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transactions::findOrFail($id);
        $transaction->delete();
        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }
}
