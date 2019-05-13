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
        $url = env('GDANSK_DISTRICTS_LIST_URL');
        $pageContent = $this->client->get($url);
        $matches = [];
        preg_match_all("/<li> <a href=\"([a-z\-]*)\" target=\"_self\"><span>.*<\/span><\/a>/mU", $pageContent->getBody(), $matches);
        return (empty($matches) ? [] : $matches[1]);
    }

    protected function getDistrictdata($districtUrl): array
    {
        $pageContent = $this->client->get($districtUrl);
        $returnModelArray = ['town_name' => $this->getTownName()];
        $matches = [];
        preg_match_all("/<div style=\"font-size:1\.8em; font-weight:600; font-family: Kanit, sans-serif;\">(.*)<\/div><div>Powierzchnia: (.*) km<sup>2<\/sup><\/div><div>Liczba ludności: (.*) osób<\/div>/mU", $pageContent->getBody(), $matches);
        if(empty($matches) || empty($matches[1]) || empty($matches[1][0]) )
        {
            return [];
        }

        $returnModelArray['name'] = $matches[1][0];
        $returnModelArray['surface'] = (float)str_replace(',','.',$matches[2][0]);
        $returnModelArray['population'] = (int)$matches[3][0];
        return $returnModelArray;
    }
}