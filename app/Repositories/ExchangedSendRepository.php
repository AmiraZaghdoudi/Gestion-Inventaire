<?php

namespace App\Repositories;

use App\Interfaces\ExchangedSendRepositoryInterface;
use App\Models\ExchangedSend;

class ExchangedSendRepository implements ExchangedSendRepositoryInterface
{
    public function getNewExchangedSendData($centerIds, $isNEw)
    {
        return ExchangedSend::whereIn('receiver_id', $centerIds)
            ->where('is_new', $isNEw)
            ->latest()
            ->paginate(10);
    }

    public function updateStatusReceivedProduct($echangedSendId, $acceptanceStatus)
    {
        ExchangedSend::whereId($echangedSendId)->update(['is_new' => false, 'acceptance_status' => $acceptanceStatus]);
    }

    public function getNewExchangedSendDataById($echangedSendId)
    {
        return ExchangedSend::where('id', $echangedSendId)->where('is_new', '1')->first();
    }
}
