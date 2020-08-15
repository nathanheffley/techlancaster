<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Meetup extends Model
{
    protected $fillable = [
        'api_url',
    ];

    protected ?array $info = null;

    public function getApiDataCacheKeyAttribute(): string
    {
        return 'meetup-' . $this->id . '-api-data';
    }

    public function getNameAttribute(): string
    {
        if (is_null($this->info)) {
            $this->fetchInfo();
        }

        return $this->info['name'];
    }

    protected function fetchInfo(): void
    {
        $data = Cache::remember($this->apiDataCacheKey, 86400, function() {
            $response = Http::get($this->api_url);

            if ($response->failed()) {
                return [
                    'name' => 'Error fetching data.',
                ];
            }

            $json = $response->json();

            if (! isset($json['name'])) {
                return [
                    'name' => 'Error parsing data.',
                ];
            }

            return $json;
        });

        $this->info = [
            'name' => $data['name'],
        ];
    }
}
