<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrdersImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
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
            $order = \App\Models\Order::find($row['id']);
            if ($order) {
                $order->buyer_name = $row['buyer_name'] ?? $order->buyer_name;
                $order->buyer_phone = $row['buyer_phone'] ?? $order->buyer_phone;
                $order->buyer_address = $row['buyer_address'] ?? $order->buyer_address;
                $order->product_id = $row['product_id'] ?? $order->product_id;
                $order->quantity = $row['quantity'] ?? $order->quantity;
                $order->total_price = $row['total_price'] ?? $order->total_price;
                $order->status = $row['status'] ?? $order->status;
                $order->save();
                return null;
            }
        }
        return new \App\Models\Order([
            'buyer_name' => $row['buyer_name'] ?? null,
            'buyer_phone' => $row['buyer_phone'] ?? null,
            'buyer_address' => $row['buyer_address'] ?? null,
            'product_id' => $row['product_id'] ?? null,
            'quantity' => $row['quantity'] ?? null,
            'total_price' => $row['total_price'] ?? null,
            'status' => $row['status'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'buyer_name' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'status' => 'required',
        ];
    }
}
