<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StatisticFilterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $cpc = round($this->resource->cost / $this->resource->clicks,2);
        $cpm = round($this->resource->cost / $this->resource->views * 1000,2);
        $cost = $this->resource->cost;
        return [
            ...parent::toArray($request),
            ...[
                'cpc' => str($cpc)->contains('.') ? str($cpc)->replace('.',' руб ')->append('коп.') : $cpc. 'руб.',
                'cpm' => str($cpm)->contains('.') ? str($cpm)->replace('.',' руб ')->append('коп.') : $cpm. 'руб.',
                'cost' => str($cost)->contains('.') ? str($cost)->replace('.',' руб ')->append('коп.') : $cost. 'руб.',
            ],
        ];
    }
}
