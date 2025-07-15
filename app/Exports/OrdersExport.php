<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return \App\Models\Order::select('id','buyer_name','buyer_phone','buyer_address','product_id','quantity','total_price','status','created_at','updated_at')->get();
    }
}
