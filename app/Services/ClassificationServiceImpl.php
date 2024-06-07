<?php

namespace App\Services;

use App\Services\Interfaces\ClassificationService;
use GuzzleHttp\Client;

class ClassificationServiceImpl implements ClassificationService
{

    private $client;

    public function __construct(Client $client)
    {
        $this->client = new $client;
    }

    static private function generateUrlEndpoint(string $path = null): string
    {
        return env("CLASSIFICATION_CONNECTION") . $path;
    }

    public function connectionGateaway()
    {
        return $this->client->request('GET', self::generateUrlEndpoint())->getStatusCode() == 200 ? true : false;
    }

    public function classificationDokumen(string $file_path)
    {
        $request = $this->client->request('POST', self::generateUrlEndpoint('classification-internal'), [
            'query' => ['folder_file_path' => $file_path]
        ])->getBody()->getContents();
        
        return json_decode($request);
    }

    public function labelCalculate(array $probabilitas, int $min = 50): ?array
    {
        // menampung hasil label yang lolos
        $result = [];

        foreach($probabilitas as $key => $value){
            if ($value > $min){
                $result[] = $key;
            }
        }

        return $result;
    }

    // transkip nilai logic
    public function transkipNilaiScore(string $file_path)
    {
        try{
            $request = $this->client->request('POST', self::generateUrlEndpoint('transkip-nilai-scores'), [
                'query' => ['folder_file_path' => $file_path]
            ])->getBody()->getContents();
    
            return json_decode($request);
        } catch(\Exception $ex)
        {
            throw $ex;
        }
    }
}