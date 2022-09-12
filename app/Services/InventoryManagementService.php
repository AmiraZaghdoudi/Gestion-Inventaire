<?php

namespace App\Services;

use App\Interfaces\InventoryRepositoryInterface;
use App\Interfaces\SentProductRepositoryInterface;
use App\Models\Center;
use App\Models\ExchangedSend;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\SentProduct;
use Exception;
use Illuminate\Support\Facades\Auth;
use Throwable;

class InventoryManagementService
{
    private SentProductRepositoryInterface $sentProductRepository;
    private InventoryRepositoryInterface $inventoryRepository;

    public function __construct(SentProductRepositoryInterface $sentProductRepository, InventoryRepositoryInterface $inventoryRepository)
    {
        $this->sentProductRepository = $sentProductRepository;
        $this->inventoryRepository = $inventoryRepository;
    }


    /**
     * Save exchange information
     *
     * @param  $data
     * @return mixed
     * @throws Exception
     */
    public function saveExchangeSend($data)
    {
        try {
            $exchangedSend = new ExchangedSend();

            $transmetterCenter = Center::find($data['transmitter_id']);
            $exchangedSend->transmetterCenter()->associate($transmetterCenter);

            $receiverCenter = Center::find($data['receiver_id']);
            $exchangedSend->receiverCenter()->associate($receiverCenter);

            $exchangedSend->is_new = true;

            $exchangedSend->save();

            return $exchangedSend->id;
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     *  Save list of sent products
     *
     * @param  $availableProductList
     * @param  $exchangedSendId
     * @return void
     * @throws Exception
     */
    public function saveSentProducts($availableProductList, $exchangedSendId)
    {
        try {
            foreach ($availableProductList as $productId) {
                $sentProduct = new sentProduct();
                $sentProduct->product()->associate(Product::find($productId));
                $sentProduct->exchangeSend()->associate(ExchangedSend::find($exchangedSendId));
                $sentProduct->save();
            }
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Display a listing of the unavailable products
     *
     * @param  $selectedProducts
     * @param  $availableProductList
     * @return string
     * @throws Exception
     */
    public function listOfUnavailableProduct($selectedProducts, $availableProductList)
    {
        try {
            $unavailableProductList = array_diff($selectedProducts, $availableProductList);

            $messageUnavailability = "";
            if (!empty($unavailableProductList)) {
                $messageUnavailability = "Malheureusement ces produits  ne sont plus disponible: ";
                foreach ($unavailableProductList as $productId) {
                    $messageUnavailability .= Product::find($productId)->name . " | ";
                }
            }
            return $messageUnavailability;
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Add center and randomly assign products with inventories to it
     *
     * @param  $request
     * @return void
     * @throws Exception
     */
    public function addCenter($request)
    {
        try {
            $request['admin_id'] = Auth::user()->id;
            $centerId = Center::create($request->all())->id;
            $products = Product::pluck('id')->toArray();

            foreach ($products as $productId) {
                Inventory::create(['center_id' => $centerId, 'product_id' => $productId, 'quantity' => random_int(1, 500)]);
            }
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Display a listing of products
     *
     * @param  $newExchangedSendData
     * @return array
     * @throws Exception
     */
    public function getListOfsentProduct($newExchangedSendData)
    {
        try {
            $productList = [];
            foreach ($newExchangedSendData as $item) {
                $productList[$item->id] = $this->sentProductRepository->getListOfsentProduct($item->id);
            }
            return $productList;
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Update inventory for transmitter center
     *
     * @param  int   $transmitterCenterId
     * @param  array $productIds
     * @return array
     * @throws Exception
     */
    public function updateInventoryForTransmitter(int $transmitterCenterId, array $productIds): array
    {
        try {
            foreach ($productIds as $key => $productId) {
                $inventory = $this->inventoryRepository->getInventoryByCenterAndProduct($transmitterCenterId, $productId);
                if ($inventory instanceof Inventory) {
                    if ($inventory->quantity <= 1) {
                        $this->deleteInventory($inventory->id);
                    } else {
                        $inventory->decrement('quantity');
                    }
                } else {
                    unset($productIds[$key]);
                }
            }
            return $productIds;
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return back()->withError($e->getMessage())->withInput();
        }
    }


    /**
     * Update Inventories data
     *
     * @param  $receivedData
     * @param  bool $acceptanceStatus
     * @return void
     * @throws Exception
     */
    public function updateInventories($receivedData, bool $acceptanceStatus)
    {
        try {
            //get the list of sent products by exchange_id
            $sentProducts = sentProduct::where('exchange_id', $receivedData->id)->get();

            if ($acceptanceStatus) {
                $centerId = $receivedData->receiver_id;
            } else {
                $centerId = $receivedData->transmitter_id;
            }

            foreach ($sentProducts as $sentProduct) {
                //check if an inventory line already exists
                $inventory = $this->inventoryRepository->getInventoryByCenterAndProduct($centerId, $sentProduct->product_id);

                $this->inventoryRepository->setQuantity($inventory, $centerId, $sentProduct->product_id);
            }
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return back()->withError($e->getMessage())->withInput();
        }
    }
}
