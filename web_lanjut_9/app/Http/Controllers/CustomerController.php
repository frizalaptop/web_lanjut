<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::oldest()->paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:50',
            'email' => 'nullable|email|unique:customers,email',
            'no_telp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:50'
        ]);
        Customer::create($request->all());
        return redirect()->route('customers.index')
            ->with('success', 'Customer berhasil ditambahkan');
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:50',
            'email' => 'nullable|email|unique:customers,email,'.$customer->id,
            'no_telp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:50'
        ]);
        $customer->update($request->all());
        return redirect()->route('customers.index')
            ->with('success', 'Customer berhasil diperbarui');
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')
            ->with('success', 'Customer berhasil dihapus');
    }
}
