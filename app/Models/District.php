<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method where(string $string, string $townName)
 * @method delete()
 */
class District extends Model
{
    /**
     * deletes all district from town
     * @param $townName
     * @return District
     */
    public function deleteAllFromTown($townName): District
    {
        $this->where('town_name', $townName)->delete();
        return $this;
    }
}
