<?php

namespace App\Interfaces;

interface InventoryRepositoryInterface
{
    public function getInventoryByCenterId($centerId);

    public function deleteInventory($InventoryId);

    public function getAvailableProducts(int $centerId): mixed;
}
