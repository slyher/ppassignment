<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * @method where(string $string, string $townName)
 * @method delete()
 */
class District extends Model
{
    use Sortable;
    protected $fillable = ['town_name', 'name', 'population', 'surface',];
    public $timestamps = false;
    public $sortable = ['town_name', 'name', 'population', 'surface',];

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

    public function getAll($sort, $sortDir): array
    {
        return $this->orderBy($sort, $sortDir)->get()->toArray();
    }

    public function remove($id)
    {
        $this->where('id', $id)->delete();
    }
}
