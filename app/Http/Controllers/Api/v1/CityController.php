<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\CityRequests\CityIndexRequest;
use App\Http\Requests\CityRequests\CityStoreRequest;
use App\Http\Requests\CityRequests\CityUpdateRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Services\v1\QueryFilterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CityController
{
    /**
     * Display a listing of the resource.
     *
     * @param CityIndexRequest $request
     * @return AnonymousResourceCollection
     */
    public function index(CityIndexRequest $request)
    {
//        return CityResource::collection(City::orderBy('name_en')->paginate());
        $model = new City();
        $filter = new QueryFilterService();

        return CityResource::collection($filter->applyFilter($model, $request->validated()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CityStoreRequest $request
     * @return JsonResponse
     */
    public function store(CityStoreRequest $request)
    {
        City::create($request->validated());

        return response()->createSuccess();
    }

    /**
     * Display the specified resource.
     *
     * @param City $city
     * @return CityResource
     */
    public function show(City $city)
    {
        return new CityResource($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CityUpdateRequest $request
     * @param City $city
     * @return JsonResponse
     */
    public function update(CityUpdateRequest $request, City $city)
    {
        $city->update($request->validated());

        return response()->updateSuccess();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return JsonResponse
     */
    public function destroy(City $city)
    {
        $city->delete();

        return response()->deleteSuccess();
    }
}
