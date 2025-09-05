<?php
namespace App\Filament\Resources\MembershipPlans\MembershipPlanResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\MembershipPlan;

/**
 * @property MembershipPlan $resource
 */
class MembershipPlanTransformer extends JsonResource
{


    public $with = ['features'];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
