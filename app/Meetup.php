<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
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

    public function getDescriptionAttribute(): string
    {
        if (is_null($this->info)) {
            $this->fetchInfo();
        }

        return $this->info['description'];
    }

    public function getWebsiteAttribute(): ?string
    {
        if (is_null($this->info)) {
            $this->fetchInfo();
        }

        return $this->info['website'];
    }

    public function getMeetupAttribute(): ?string
    {
        if (is_null($this->info)) {
            $this->fetchInfo();
        }

        return $this->info['meetup'];
    }

    public function getNextMeetingAttribute(): ?Meeting
    {
        if (is_null($this->info)) {
            $this->fetchInfo();
        }

        $nextMeeting = $this->info['next_meeting'];

        if (is_null($nextMeeting)) {
            return null;
        }

        $time = Carbon::parse($nextMeeting['time'] / 1000);
        if ($time->isBefore(Carbon::now())) {
            return null;
        }

        return new Meeting(
            $this,
            $nextMeeting['name'],
            strip_tags($nextMeeting['description']),
            $time,
        );
    }

    protected function fetchInfo(): void
    {
        $data = Cache::remember($this->apiDataCacheKey, 86400, function() {
            try {
                $response = Http::get($this->api_url);
            } catch (\Exception $e) {
                return [
                    'name' => 'Massive failure fetching data.',
                    'description' => 'Massive failure fetching data.',
                    'website' => null,
                    'meetup' => null,
                    'next_meeting' => null,
                ];
            }

            if ($response->failed()) {
                return [
                    'name' => 'Error fetching data.',
                    'description' => 'Error fetching data.',
                    'website' => null,
                    'meetup' => null,
                    'next_meeting' => null,
                ];
            }

            return $response->json();
        });

        $this->info = [
            'name' => $data['name'] ?? "Couldn't fetch name.",
            'description' => $data['description'] ?? "Couldn't fetch description.",
            'website' => $data['urls']['website'] ?? null,
            'meetup' => $data['urls']['meetup'] ?? null,
            'next_meeting' => $data['next_meetup'] ?? null,
        ];
    }
}
