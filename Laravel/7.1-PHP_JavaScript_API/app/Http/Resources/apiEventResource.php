<?php

namespace App\Http\Resources;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\Point;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class apiEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //$events = Event::all();

        //$staff = Staff::select("id", "full_name","photo")->find($this->staff_id);
        //$camera = $this->camera;
        //$staff->camera = $camera;
        //dd($staff);

        $organizer = Organizer::all('id','name','slug')->where('id', $this->organizer_id)->first();

        return [
            "id" => $this->id,
            "name" =>  $this->name,
            "slug" => $this->slug,
            "date" => Carbon::parse($this->date)->format('Y-m-d'),
            'organizer' => $organizer
        ];
    }
}
