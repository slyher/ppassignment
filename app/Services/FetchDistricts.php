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
    public function saveAllDistrictsData()
    {
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
            $this->model->fill($districtData);
            $this->model->save();
        }
    }

    protected abstract function getDistrictIds();

    protected abstract function generateDistrictUrl($districtsId);

    protected abstract function getDistrictPage($districtUrl);

    protected abstract function getDistrictdata($districtPage);


}