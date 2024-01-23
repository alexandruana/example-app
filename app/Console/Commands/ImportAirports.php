<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Airport;
use League\Csv\Reader;
use Illuminate\Support\Facades\Http;

class ImportAirports extends Command
{
    protected $signature = 'import:airports';
    protected $description = 'Import airports data from a CSV file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $url = "https://raw.githubusercontent.com/datasets/airport-codes/master/data/airport-codes.csv";
        $filePath = $this->downloadCsv($url);

        if (!file_exists($filePath)) {
            $this->error('CSV file could not be downloaded.');
            return;
        }

        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0); // Assuming first row as header

        foreach ($csv as $record) {
            // Check if 'icao' starts with 'LR'
            if (isset($record['icao']) && strpos($record['icao'], 'LR') === 0) {
                Airport::create([
                    'city' => $record['city'] ?? null,
                    'country' => $record['country'] ?? null,
                    'iata' => $record['iata'] ?? null,
                    'icao' => $record['icao'] ?? null,
                    'latitude' => $record['latitude'] ?? null,
                    'longitude' => $record['longitude'] ?? null,
                    'name' => $record['name'] ?? null
                ]);
            }
        }

        $this->info('Airports with ICAO code starting with LR imported successfully!');
    }


    private function downloadCsv($url)
    {
        $destination = storage_path('app/public/airport-codes.csv');
        $fileContents = Http::get($url);

        if ($fileContents->successful()) {
            file_put_contents($destination, $fileContents);
            return $destination;
        }

        return false;
    }
}
