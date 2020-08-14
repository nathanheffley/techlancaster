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

    public function getNameAttribute(): string
    {
        if (is_null($this->info)) {
            $this->fetchInfo();
        }

        return $this->info['name'];
    }

    protected function fetchInfo(): void
    {
        $data = Cache::remember('meetup-'.$this->id.'-api-data', 86400, fn () => Http::get($this->api_url)->json());

        $this->info = [
            'name' => $data['name'],
        ];
    }
}
