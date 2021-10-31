<?php

namespace app\components;

use app\models\UlozenkaBranch;
use yii\httpclient\Client;

class UlozenkaClient
{
    public function getBranches()
    {
        $client = new Client();
        $response = $client->get('https://www.ulozenka.cz/gmap')
            ->send();

        if (!$response->isOk)
            throw new \RuntimeException('Error fetching Ulozenka places');

        return array_map(function ($branchData) {
            return new UlozenkaBranch($branchData);
        }, $response->data);
    }

    public function getBranch($id)
    {
        $branches = $this->getBranches();
        foreach ($branches as $branch) {
            if ($branch->id === intval($id))
                return $branch;
        }

        return null;
    }
}