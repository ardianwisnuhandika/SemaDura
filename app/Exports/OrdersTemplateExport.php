<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersTemplateExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect([
            ['id', 'buyer_name', 'buyer_phone', 'buyer_address', 'product_id', 'quantity', 'total_price', 'status']
        ]);
    }
}
