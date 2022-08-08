<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class apiRegistrationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "event" => $this->ticket->event->only(['id', 'name', 'slug', 'date']),
            //"event" => $this->ticket->event->makeHidden(['organizer_id', 'organizer']),
            "organizer" =>  $this->ticket->event->organizer->makeHidden('email'),
            "session_ids" => $this->workshopRegistrations->map->pivot->map->session_id,
        ];
    }
}
