<?php


namespace App\Services;


class FetchDistrictsGdansk extends FetchDistricts
{
    /**
     * @return string
     */
    public function getTownName(): string
    {
        return env('GDANSK_TOWN_NAME');
    }


    protected function getDistrictIds(): array
    {
        // TODO: Implement getDistrictIds() method.
        return ['1'];
    }

    protected function getDistrictPage($districtUrl): string
    {
        // TODO: Implement getDistrictPage() method.
        return '';
    }

    protected function getDistrictdata($districtPage): array
    {
        // TODO: Implement getDistrictdata() method.
        return [];
    }
}