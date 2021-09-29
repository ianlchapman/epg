<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChannelResource;
use App\Models\Channel;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ChannelController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function list() : AnonymousResourceCollection
    {
        $this->authorize('list', Channel::class);

        $channels = Channel::paginate();

        return ChannelResource::collection($channels);
    }
}
