<?php

namespace App\Repositories;

use App\Interfaces\CenterRepositoryInterface;
use App\Models\Center;

class CenterRepository implements CenterRepositoryInterface
{
    /**
     * return center row with id
     *
     * @param  $centerID
     * @return mixed
     */
    public function getCenterById($centerID)
    {
        return Center::findOrFail($centerID);
    }

    /**
     * return center row with here admin id
     *
     * @param  $userID
     * @return mixed
     */
    public function getCenterByUserId($userID)
    {
        return Center::where('admin_id', $userID)->latest()->paginate(10);
    }

    /**
     * return list of centers different from the centerId param
     *
     * @param  $centerId
     * @return mixed
     */
    public function getSpeceficCenter($centerId)
    {
        return Center::where('id', '<>', $centerId)->get();
    }
}
