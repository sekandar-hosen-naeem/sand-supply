<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $data = Expense::orderBy('expense_date','desc')->get();
        return view('backend.expenses.index', compact('data'));
    }

    public function create()
    {
        return view('backend.expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'nullable|date',
            'category' => 'required|in:Fuel,Maintenance,Salary,Purchase,Other',
        ]);

        Expense::create($request->all());
        return redirect()->route('expenses.index')->with('success','Expense created successfully.');
    }

    public function edit(Expense $expense)
    {
        return view('backend.expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'nullable|date',
            'category' => 'required|in:Fuel,Maintenance,Salary,Purchase,Other',
        ]);

        $expense->update($request->all());
        return redirect()->route('expenses.index')->with('success','Expense updated successfully.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success','Expense deleted successfully.');
    }
}
