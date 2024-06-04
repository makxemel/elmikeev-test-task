<?php

namespace App\Service;

use App\Models\Sale;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use League\Flysystem\Config;

class CommonService
{
    public $url;
    public $instance;
    public function __construct(Model $instance)
    {
        $this->instance = $instance;
        $this->url = '89.108.115.241:6969/';
    }

        public function getTodayDate()
    {
        $currentTime = Carbon::now();
        return $currentTime;
    }

    public function getDataFromApiAndSaveToDb($apiLink)
    {
        $countItems = 0;
        $currentCountItems = 0;

        for ($date = $this->getTodayDate()->subYears(5); $currentCountItems !=  $countItems || $currentCountItems == 0; $date->subYears(1)) {
            for ($p = 1, $lastPage = 1; $p <= $lastPage; $p++) {

                $response = Http::acceptJson()->get($this->url.$apiLink, [
                    'page' => $p,
                    'dateFrom' => $this->instance instanceof Stock ? $this->getTodayDate()->toDateString() : $date->toDateString(),
                    'dateTo' => $this->instance instanceof Stock ? null : $this->getTodayDate()->toDateString(),
                    'key' => env('API_KEY'),
                ]);
                $decodedResponse = json_decode($response->body(), true);

                if ($p == 1) {
                    $lastPage = (int)$decodedResponse["meta"]["last_page"];
                }

                $this->store($this->instance, $decodedResponse['data']);

                echo "\n"."PAGE $p DONE!";

                if ($p == $lastPage) {
                    echo "\n".get_class($this->instance)." SCRAPPED!";
                    echo "\n"."TOTAL IN DB ".$this->instance::count()."!"."\n";
                    break 2;
                }
            }
        }
    }

    public function store($instance, $data)
    {
        foreach ($data as $i) {
            $instance->updateOrCreate($i);
        }
    }
}
