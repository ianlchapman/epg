<?php

namespace Tests\Feature\Channel;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ListChannelsTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_channels() : void
    {
        $channels = Channel::factory()
            ->count(10)
            ->create();
        $channel = $channels[0];

        $response = $this->getJson('/api/channel');

        dd($response);

        $response->assertStatus(200)
            ->assertJson(static function (AssertableJson $json) use ($channel) {
                $json
                    ->has('data', 5)
                    ->has('data.0', function (AssertableJson $json) use ($channel) {
                        $json->whereAll([
                            'id' => $channel['id'],
                            'name' => $channel['name'],
                            'icon' => $channel['icon']
                        ]);
                    })
                    ->has('links', function (AssertableJson $json) {
                        $json->hasAll([
                            'first', 'last', 'prev', 'next'
                        ]);
                    })
                    ->has('meta', function (AssertableJson $json) {
                        $json->hasAll([
                            'current_page', 'from', 'last_page', 'links', 'path', 'per_page', 'to', 'total'
                        ]);
                    })
                    ->etc();
            });
    }
}
