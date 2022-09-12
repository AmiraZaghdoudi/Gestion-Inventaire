<?php

namespace App\Repositories;

use App\Interfaces\InventoryRepositoryInterface;
use App\Models\Inventory;

class InventoryRepository implements InventoryRepositoryInterface
{
    /**
     * Get inventory by center id
     *
     * @param  $centerID
     * @return mixed
     */
    public function getInventoryByCenterId($centerID)
    {
        return Inventory::where('center_id', $centerID)->latest()->paginate(10);
    }

    /**
     * Delete inventory row by id
     *
     * @param  $InventoryId
     * @return void
     */
    public function deleteInventory($InventoryId)
    {
        Inventory::destroy($InventoryId);
    }


    /**
     * Get inventory by center id and product id
     *
     * @param  $centerID
     * @param  $productId
     * @return mixed
     */
    public function getInventoryByCenterAndProduct($centerID, $productId)
    {
        return Inventory::where('center_id', $centerID)
            ->where('product_id', $productId)
            ->first();
    }

    /**
     * Update quantity in inventory exist or create inventory
     *
     * @param  $inventory
     * @param  $centerID
     * @param  $productId
     * @return void
     */
    public function setQuantity($inventory, $centerID, $productId): void
    {
        if ($inventory instanceof Inventory) {
            $inventory->increment('quantity');
        } else {
            Inventory::create(['center_id' => $centerID, 'product_id' => $productId, 'quantity' => 1]);
        }
    }

    /**
     * return only the available product into center
     *
     * @param  int $centerId
     * @return mixed
     */
    public function getAvailableProducts(int $centerId): mixed
    {
        return Inventory::select('products.*')
            ->join('products', 'inventories.product_id', '=', 'products.id')
            ->where('center_id', $centerId)
            ->get();
    }
}
