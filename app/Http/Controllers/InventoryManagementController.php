<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCenterRequest;
use App\Interfaces\CenterRepositoryInterface;
use App\Interfaces\ExchangedSendRepositoryInterface;
use App\Interfaces\InventoryRepositoryInterface;
use App\Models\Center;
use App\Services\InventoryManagementService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class InventoryManagementController extends Controller
{
    private CenterRepositoryInterface $centerRepository;
    private InventoryRepositoryInterface $inventoryRepository;
    private ExchangedSendRepositoryInterface $exchangedSendRepository;
    private InventoryManagementService $inventoryManagementService;


    public function __construct(CenterRepositoryInterface $centerRepository, InventoryRepositoryInterface $inventoryRepository, ExchangedSendRepositoryInterface $exchangedSendRepository, InventoryManagementService $inventoryManagementService)
    {
        $this->centerRepository = $centerRepository;
        $this->inventoryRepository = $inventoryRepository;
        $this->exchangedSendRepository = $exchangedSendRepository;
        $this->inventoryManagementService = $inventoryManagementService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function index()
    {
        try {
            $centers = $this->centerRepository->getCenterByUserId(Auth::user()->id);
            return view('centers.index', compact('centers'))->with('i', (request()->input('page', 1) - 1) * 5);
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return redirect()->route('centers.index')->withErrors(['field_name' => ['Alert! Failed to get center list']]);
        }
    }

    /**
     * Display a listing of the inventory.
     *
     * @param  $centerId
     * @return Application|Factory|View|RedirectResponse
     */
    public function inventory($centerId)
    {
        try {
            $centers = $this->inventoryRepository->getInventoryByCenterId($centerId);
            return view('centers.inventory', compact(['centers', 'centerId']))->with('i', (request()->input('page', 1) - 1) * 5);
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return view('centers.inventory')->withErrors(['field_name' => ["Alerte! Impossible d'obtenir la liste d'inventaire"]]);
        }
    }

    /**
     * Get the list of available product and centers to send inventory
     *
     * @param  $centerId
     * @return Application|Factory|View|RedirectResponse
     */
    public function sendProduct($centerId)
    {
        try {
            //get only available product
            $products = $this->inventoryRepository->getAvailableProducts($centerId);

            //get list of centers different from the transmitter
            $centers = $this->centerRepository->getSpeceficCenter($centerId);

            return view('centers.sendProduct', compact(['products', 'centers', 'centerId']));
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return view('centers.sendProduct')->withErrors(['field_name' => ["Alerte! Impossible d'envoyer les produits"]]);
        }
    }

    /**
     * Register the product sent
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function postSendProduct(Request $request)
    {
        try {
            //Check if the transmitter has a sufficient quantity of the product before sending it And update quantity for the sending center
            $availableProductList = $this->inventoryManagementService->updateInventoryForTransmitter($request['transmitter_id'], $request['selected_products']);

            $messageUnavailability = $this->inventoryManagementService->listOfUnavailableProduct($request['selected_products'], $availableProductList);

            $exchangedSendId = $this->inventoryManagementService->saveExchangeSend($request->all());

            $this->inventoryManagementService->saveSentProducts($availableProductList, $exchangedSendId);

            return redirect()->route('centers.index')
                ->with('success', 'Produit envoy?? avec succes du centre : ' . Center::find($request['transmitter_id'])->name . ' au centre :' . Center::find($request['receiver_id'])->name . '.  ' . $messageUnavailability);
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return redirect()->route('centers.index')->withErrors(['field_name' => ["Alerte! Impossible d'envoyer les produits"]]);
        }
    }


    /**
     * Display the flow of transactions between centers
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function receivedProduct()
    {
        try {
            $centerIds = $this->centerRepository->getCenterByUserId(Auth::user()->id)->pluck('id');

            $newExchangedSendData = $this->exchangedSendRepository->getNewExchangedSendData($centerIds, true);

            $productList = $this->inventoryManagementService->getListOfsentProduct($newExchangedSendData);

            return view('centers.receivedProduct', compact(['newExchangedSendData', 'productList']))->with('i', (request()->input('page', 1) - 1) * 5);
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return redirect()->route('centers.receivedProduct')->withErrors(['field_name' => ["Alerte! Impossible d'obtenir la liste des produits re??us"]]);
        }
    }

    /**
     * Save the response from the receiving center and update the inventory based on this response
     *
     * @param  $echangedSendId
     * @param  $acceptanceStatus
     * @return RedirectResponse
     */
    public function acceptOrRefuseReceivedProduct($echangedSendId, $acceptanceStatus)
    {
        try {
            $receivedData = $this->exchangedSendRepository->getNewExchangedSendDataById($echangedSendId);

            $this->inventoryManagementService->updateInventories($receivedData, $acceptanceStatus);

            $this->exchangedSendRepository->updateStatusReceivedProduct($echangedSendId, $acceptanceStatus);

            if ($acceptanceStatus) {
                return redirect()->route('centers.receivedProduct')->with('success', "Produits accept??s avec succ??s et les inventaires sont mis ?? jour");
            } else {
                return redirect()->route('centers.receivedProduct')->with('success', "Produits refus??s avec succ??s et les produits sont retourn??s automatiquement au centre exp??diteur");
            }
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return redirect()->route('centers.receivedProduct')->withErrors(['field_name' => ["Alerte! Impossible d'obtenir l'??tat de mise ?? jour ds produits re??us"]]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreCenterRequest $request
     * @param  Center             $center
     * @return RedirectResponse
     */
    public function update(StoreCenterRequest $request, Center $center): RedirectResponse
    {
        try {
            $center->update($request->all());
            return redirect()->route('centers.index')->with('success', 'Center updated successfully');
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return redirect()->route('centers.index')->withErrors(['field_name' => ["Alerte! Impossible de metre ?? jour le centre"]]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCenterRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreCenterRequest $request): RedirectResponse
    {
        try {
            $this->inventoryManagementService->addCenter($request);
            return redirect()->route('centers.index')->with('success', 'Centre cr???? avec succ??s.');
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return redirect()->route('centers.index')->withErrors(['field_name' => ["Alerte! Impossible de cr??er le centre"]]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('centers.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  Center $center
     * @return Application|Factory|View
     */
    public function show(Center $center)
    {
        return view('centers.show', compact('center'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Center $center
     * @return Application|Factory|View
     */
    public function edit(Center $center)
    {
        return view('centers.edit', compact('center'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Center $center
     * @return RedirectResponse
     */
    public function destroy(Center $center)
    {
        try {
            $center->delete();
            return redirect()->route('centers.index')->with('success', 'Centre supprim?? avec succ??s');
        } catch (Throwable $e) {
            Log::channel("inventorymanagementlog")->error($e);
            return redirect()->route('centers.index')->withErrors(['field_name' => ["Alerte! ??chec de la suppression du centre"]]);
        }
    }
}
