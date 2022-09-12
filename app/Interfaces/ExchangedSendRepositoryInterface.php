<?php

namespace App\Interfaces;

interface ExchangedSendRepositoryInterface
{
    public function getNewExchangedSendData($centerIds, $isNEw);

    public function updateStatusReceivedProduct($echangedSendId, $acceptanceStatus);

    public function getNewExchangedSendDataById($echangedSendId);
}
