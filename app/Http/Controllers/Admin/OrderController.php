<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersExport;
use App\Models\ActivityLog;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Order::query();
        if ($request->filled('q')) {
            $query->where('customer_name', 'like', '%'.$request->q.'%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $orders = $query->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string',
            'product' => 'required|string',
            'quantity' => 'required|integer',
            'status' => 'required|string',
        ]);
        $order = \App\Models\Order::create($validated);
        // Log tambah pesanan
        ActivityLog::create([
            'admin' => session('admin_name') ?? 'admin',
            'action' => 'create',
            'table' => 'orders',
            'data' => 'Tambah pesanan: ' . $order->customer_name . ' (ID: ' . $order->id . ')',
        ]);
        return redirect()->route('custom')->with('success', 'Pesanan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string',
            'product' => 'required|string',
            'quantity' => 'required|integer',
            'status' => 'required|string',
        ]);
        $order = Order::findOrFail($id);
        $order->update($validated);
        // Log update pesanan
        ActivityLog::create([
            'admin' => session('admin_name') ?? 'admin',
            'action' => 'update',
            'table' => 'orders',
            'data' => 'Update pesanan: ' . $order->customer_name . ' (ID: ' . $order->id . ')',
        ]);
        return redirect()->route('custom')->with('success', 'Pesanan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        // Log hapus pesanan
        ActivityLog::create([
            'admin' => session('admin_name') ?? 'admin',
            'action' => 'delete',
            'table' => 'orders',
            'data' => 'Hapus pesanan: ' . $order->customer_name . ' (ID: ' . $order->id . ')',
        ]);
        return redirect()->route('custom')->with('success', 'Pesanan berhasil dihapus!');
    }

    public function export()
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }

    public function exportCsv()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\OrdersExport, 'orders.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);
        $import = new \App\Imports\OrdersImport;
        \Maatwebsite\Excel\Facades\Excel::import($import, $request->file('file'));
        if (count($import->failures()) > 0) {
            return redirect()->route('admin.orders.index')->with('import_errors', $import->failures());
        }
        // Log aktivitas import pesanan
        ActivityLog::create([
            'admin' => session('admin_name') ?? 'admin',
            'action' => 'import',
            'table' => 'orders',
            'data' => 'Import pesanan dari file: ' . $request->file('file')->getClientOriginalName(),
        ]);
        return redirect()->route('admin.orders.index')->with('success', 'Import pesanan berhasil!');
    }

    public function downloadTemplate()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\OrdersTemplateExport, 'template_pesanan.xlsx');
    }

    public function dashboard()
    {
        $latestOrders = Order::orderBy('created_at', 'desc')->limit(5)->get();
        return view('admin.dashboard', compact('latestOrders'));
    }
}
