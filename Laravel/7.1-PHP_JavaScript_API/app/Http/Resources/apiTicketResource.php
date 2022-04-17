<?php

namespace App\Http\Resources;

use App\Models\Organizer;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\FlareClient\Time\Time;

class apiTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $description = null;
        $available = true;
        if ($this->special_validity) {
            $sv = json_decode($this->special_validity);

            if ($sv->type == 'date') {
                $description = 'Available Until ' . Carbon::parse($sv->date)->format('F d, Y');

                if ($sv->date < now())
                    $available = false;
            }

        }

        return [
            "id" => $this->id,
            "name" =>  $this->name,
            "description" => $description,
            "cost" => $this->cost,
            "Available" => $available,
        ];
    }
}
