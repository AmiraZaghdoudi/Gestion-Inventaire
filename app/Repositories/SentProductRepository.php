<?php

namespace App\Repositories;

use App\Interfaces\SentProductRepositoryInterface;
use App\Models\sentProduct;

class SentProductRepository implements SentProductRepositoryInterface
{
    /**
     * return center row with id
     *
     * @param  $centerID
     * @return mixed
     */
    public function getListOfsentProduct($exchangeId)
    {
        return sentProduct::select('products.*')
            ->join('products', 'products.id', '=', 'sent_products.product_id')
            ->join('exchange_sends', 'exchange_sends.id', '=', 'sent_products.exchange_id')
            ->where('exchange_id', $exchangeId)
            ->get();
    }
}
