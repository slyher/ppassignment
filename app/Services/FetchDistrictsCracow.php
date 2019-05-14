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
        $url = env('CRACOW_DISTRICTS_LIST_URL');
        $pageContent = $this->client->get($url);
        $matches = [];
        preg_match_all("/<option value=\"([0-9]+)\">(.+)<\/option>/m", $pageContent->getBody(), $matches);
        return (empty($matches) ? [] : $matches[1]);
    }

    protected function getDistrictdata($districtUrl): array
    {
        $returnModelArray = ['town_name' => $this->getTownName()];
        $pageContent = $this->client->get($districtUrl);
        $matches = [];
        $pageBody = str_replace(["\r", "\n", "\t"], ["", "", ""], $pageContent->getBody()->__toString());
        preg_match_all("/<h3>\s*(.*)\s*<\/h3>/m", $pageBody, $matches);
        if ($this->checkMatchOneEmpty($matches)) {
            return [];
        }
        $returnModelArray['name'] = html_entity_decode(trim($matches[1][0]));

        $matches = [];
        preg_match_all(
            "/Powierzchnia:<\/b><\/td>\s*<td>\s*<span lang=\"pl-PL\">([0-9,]+)/m",
            $pageBody,
            $matches);
        if ($this->checkMatchOneEmpty($matches)) {
            return [];
        }
        $returnModelArray['surface'] = 0.01 * (float)str_replace(',', '.', $matches[1][0]);
        //^^ convert from ha -> km^2 //putting in separate class? overkill?

        $matches = [];
        preg_match_all(
            "/ci:<\/b><\/td>\s*<td>([0-9]*)/",
            $pageBody,
            $matches
        );
        if ($this->checkMatchOneEmpty($matches)) {
            return [];
        }
        $returnModelArray['population'] = (int)$matches[1][0];

        return $returnModelArray;
    }

    private function checkMatchOneEmpty(array $matches): bool
    {
        if (empty($matches) || empty($matches[1]) || empty($matches[1][0])) {
            return true;
        }
        return false;
    }
}