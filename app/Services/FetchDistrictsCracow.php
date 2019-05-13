<?php


namespace App\Services;


class FetchDistrictsCracow extends FetchDistricts
{
    /**
     * @return string
     */
    public function getTownName(): string
    {
        return env('CRACOW_TOWN_NAME');
    }


    protected function getDistrictIds(): array
    {
        // TODO: Implement getDistrictIds() method.
        return [];
    }

    protected function getDistrictdata($districtUrl): array
    {
        // TODO: Implement getDistrictdata() method.
        return [];
    }
}