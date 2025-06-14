<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('status')->oldest()->get();
        // dd($transactions[0]->total_harga);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('transactions.create', compact('customers', 'products'));
    }

    public function edit(Transaction $transaction)
    {
        // Hanya bisa edit transaksi pending
        if ($transaction->status === 'done') {
            return redirect()
                ->route('transactions.index')
                ->with('error', 'Transaksi yang sudah selesai tidak bisadiubah');
        }
        $products = Product::all();
        $transaction = Transaction::select('transactions.*', 'customers.nama_customer')
            ->leftJoin('customers', 'transactions.kode_customer', '=', 'customers.kode_customer')
            ->findOrFail($transaction->id);
        return view('transactions.edit', compact('transaction', 'products'));
    }

    public function show($id)
    {
        $transaction = Transaction::select('transactions.*', 'customers.nama_customer', 'products.nama_produk')
            ->leftJoin('products', 'transactions.kode_produk', '=', 'products.kode_produk')
            ->leftJoin('customers', 'transactions.kode_customer', '=', 'customers.kode_customer')
            ->findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    public function store(Request $request)
    {
        // dd($request->kode_produk);
        $request->validate([
            'kode_customer' => 'required|exists:customers,kode_customer',
        ]);
        $product = Product::where('kode_produk', $request->kode_produk)->first();
        Transaction::create([
            'kode_customer' => $request->kode_customer,
            'kode_produk' => $request->kode_produk,
            'status' => 'pending',
            'tanggal_dibayar' => null,
        ]);
        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil dibuat');
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'kode_customer' => 'required|exists:customers,kode_customer',
            'kode_produk' => 'required|exists:products,kode_produk',
            'quantity' => 'required|integer|min:1',
        ]);
        $product = Product::where('kode_produk', $request->kode_produk)->firstOrFail();
        $updateData = [
            'kode_produk' => $request->kode_produk,
            'quantity' => $request->quantity,
            'total_harga' => $product->harga * $request->quantity,
            'status' => 'pending',
            'tanggal_dibayar' => null,
        ];
        // Jika status diubah ke done, set tanggal dibayar
        if ($request->status === 'done' && $transaction->status === 'pending'){
            $updateData['tanggal_dibayar'] = now();
        }
        $transaction->update($updateData);
        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil diperbarui');
    }

    public function updateStatus($id)
    {
        // Cari transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($id);
        // Validasi bahwa quantity > 0
        if ($transaction->quantity <= 0) {
            return redirect()
                ->back()
                ->with('error', 'Tidak dapat menyelesaikan transaksi dengan quantity 0');
        }
        // Update status menjadi 'done'
        $transaction->update([
            'status' => 'done',
            'tanggal_dibayar' => now(),
            'updated_at' => now()
        ]);
        return redirect()
            ->back()
            ->with('success', 'Transaksi berhasil, terima kasih telah berbelanja!');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()
            ->route('transactions.index')
            ->with('success', 'Produk berhasil dihapus');
    }

    public function viewInvoice($id)
    {
        $transaction = Transaction::select(
            'transactions.*',
            'customers.nama_customer',
            'customers.alamat',
            'customers.no_telp',
            'products.harga', 
            'products.nama_produk'    
        )->leftJoin(
            'products', 
            'transactions.kode_produk', 
            '=',
            'products.kode_produk'
        )->leftJoin(
            'customers', 
            'transactions.kode_customer', 
            '=',
            'customers.kode_customer'
        )->findOrFail($id);
        return view('pdf.invoice', compact('transaction'));
    }

    public function downloadInvoice($id)
    {
        $transaction = Transaction::select(
            'transactions.*',
            'customers.nama_customer',
            'customers.alamat',
            'customers.no_telp',
            'products.harga',
            'products.nama_produk'
        )->leftJoin(
            'products', 
            'transactions.kode_produk', 
            '=',
            'products.kode_produk'
        )->leftJoin(
            'customers', 
            'transactions.kode_customer', 
            '=',
            'customers.kode_customer'
        )->findOrFail($id);
        $pdf = Pdf::loadView('pdf.download_invoice', compact('transaction'));
        return $pdf->download('invoice-'.$transaction->kode_transaksi.'.pdf');
    }


}
