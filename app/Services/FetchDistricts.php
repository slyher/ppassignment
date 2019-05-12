<?php


namespace App\Services;

use App\Models\District;
use GuzzleHttp\Client;

abstract class FetchDistricts
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var District
     */
    private $model;

    /**
     * @var string
     */
    protected $townName;

    /**
     * @return string
     */
    public abstract function getTownName(): string;


    /**
     * FetchDistricts constructor.
     * @param Client $client
     * @param District $model
     * @param string $url
     */
    public function __construct(Client $client, District $model, string $url)
    {
        $this->client = $client;
        $this->model = $model;
        $this->url = $url;
    }

    /**
     * @throws TownNameNotPrivided
     */
    public function saveAllDistrictsData(): void
    {
        $this->townName = $this->townName();
        if (!empty($this->townName)) {
            $this->model->where('town_name', $this->townName)->delete();
        } else {
            throw new TownNameNotPrivided();
        }
        $districtsIds = $this->getDistrictIds();
        foreach ($districtsIds as $districtsId) {
            $districtUrl = $this->generateDistrictUrl($districtsId);
            $districtPage = $this->getDistrictPage($districtUrl);
            $districtData = $this->getDistrictdata($districtPage);//parse
            if (!empty($districtData)) {
                $this->model->fill($districtData);
                $this->model->save();
            }
        }
    }

    protected abstract function getDistrictIds(): array;

    protected abstract function generateDistrictUrl($districtsId): string;

    protected abstract function getDistrictPage($districtUrl): string;

    protected abstract function getDistrictdata($districtPage): array;


}