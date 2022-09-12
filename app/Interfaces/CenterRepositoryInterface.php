<?php

namespace App\Interfaces;

interface CenterRepositoryInterface
{
    public function getCenterById($centerId);

    public function getCenterByUserId($UserId);

    public function getSpeceficCenter($centerId);
}
