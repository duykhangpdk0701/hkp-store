<?php

namespace Database\Seeders;

use App\Models\ItemStock;
use Illuminate\Database\Seeder;

class ItemStockSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (ItemStock::first() && ItemStock::first()->size_id == null) {
            $itemStocks = ItemStock::all();
            foreach ($itemStocks as $itemStock) {
                $itemStock->update([
                    'size_id' => $itemStock->itemVariant->size_id
                ]);
            }
        }
    }
}
