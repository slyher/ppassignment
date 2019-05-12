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

    protected function generateDistrictUrl($districtsId): string
    {
        // TODO: Implement generateDistrictUrl() method.
        return '';
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