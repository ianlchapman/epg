<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChannelResource;
use App\Http\Resources\ProgrammeResource;
use App\Models\Channel;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProgrammeController extends Controller
{
    /**
     * @param Channel $channel
     * @param int $date
     * @param string $timezone
     * @return AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function list(Channel $channel, int $date, string $timezone) : AnonymousResourceCollection
    {
        $this->authorize('list', Channel::class);

        $programmes = $channel->programmes->where('start_date' >= $date)->paginate();

        return ProgrammeResource::collection($programmes);
    }
}
