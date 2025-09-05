<?php
namespace App\Filament\Resources\MembershipPlans\MembershipPlanResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\MembershipPlans\MembershipPlanResource;
use App\Filament\Resources\MembershipPlans\MembershipPlanResource\Api\Requests\CreateMembershipPlanRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = MembershipPlanResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create MembershipPlan
     *
     * @param CreateMembershipPlanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateMembershipPlanRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}