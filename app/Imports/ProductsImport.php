<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (isset($row['id']) && $row['id']) {
            $product = \App\Models\Product::find($row['id']);
            if ($product) {
                $product->name = $row['name'] ?? $product->name;
                $product->description = $row['description'] ?? $product->description;
                $product->price = $row['price'] ?? $product->price;
                $product->stock = $row['stock'] ?? $product->stock;
                $product->image = $row['image'] ?? $product->image;
                $product->save();
                return null;
            }
        }
        return new \App\Models\Product([
            'name' => $row['name'] ?? null,
            'description' => $row['description'] ?? null,
            'price' => $row['price'] ?? null,
            'stock' => $row['stock'] ?? null,
            'image' => $row['image'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ];
    }
}
