<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Models\ActivityLog;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();
        if ($request->filled('q')) {
            $query->where('name', 'like', '%'.$request->q.'%');
        }
        $products = $query->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }
        $product = \App\Models\Product::create($validated);
        // Log tambah produk
        ActivityLog::create([
            'admin' => session('admin_name') ?? 'admin',
            'action' => 'create',
            'table' => 'products',
            'data' => 'Tambah produk: ' . $product->name . ' (ID: ' . $product->id . ')',
        ]);
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
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
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }
        $product->update($validated);
        // Log update produk
        ActivityLog::create([
            'admin' => session('admin_name') ?? 'admin',
            'action' => 'update',
            'table' => 'products',
            'data' => 'Update produk: ' . $product->name . ' (ID: ' . $product->id . ')',
        ]);
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        // Log hapus produk
        ActivityLog::create([
            'admin' => session('admin_name') ?? 'admin',
            'action' => 'delete',
            'table' => 'products',
            'data' => 'Hapus produk: ' . $product->name . ' (ID: ' . $product->id . ')',
        ]);
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function exportCsv()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\ProductsExport, 'products.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);
        $import = new \App\Imports\ProductsImport;
        \Maatwebsite\Excel\Facades\Excel::import($import, $request->file('file'));
        if (count($import->failures()) > 0) {
            return redirect()->route('admin.products.index')->with('import_errors', $import->failures());
        }
        // Log aktivitas import produk
        ActivityLog::create([
            'admin' => session('admin_name') ?? 'admin',
            'action' => 'import',
            'table' => 'products',
            'data' => 'Import produk dari file: ' . $request->file('file')->getClientOriginalName(),
        ]);
        return redirect()->route('admin.products.index')->with('success', 'Import produk berhasil!');
    }

    public function downloadTemplate()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\ProductsTemplateExport, 'template_produk.xlsx');
    }
}
