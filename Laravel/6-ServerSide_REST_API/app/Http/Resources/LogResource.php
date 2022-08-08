<?php

namespace App\Http\Resources;

use App\Models\Log;
use App\Models\Point;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $staff = Staff::select("id", "full_name","photo")->find($this->staff_id);
        $camera = $this->camera;
        $staff->camera = $camera;

        return [
            "access" => (bool) $this->access,
            "staff" =>  $staff,
            "point" => Point::select('id', 'name')->where('id', $this->point_id)->get(),
            "timestamp" => Carbon::parse($this->created_at)->timestamp
        ];
    }
}
