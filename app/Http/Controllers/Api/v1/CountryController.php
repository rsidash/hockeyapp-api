<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\CountryRequests\CountryStoreRequest;
use App\Http\Requests\CountryRequests\CountryUpdateRequest;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CountryController
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CountryResource::collection(Country::orderBy('country_code')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryStoreRequest $request
     * @return JsonResponse
     */
    public function store(CountryStoreRequest $request)
    {
        Country::create($request->validated());

        return response()->createSuccess();
    }

    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @return CountryResource
     */
    public function show(Country $country)
    {
        return new CountryResource($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryUpdateRequest $request
     * @param Country $country
     * @return JsonResponse
     */
    public function update(CountryUpdateRequest $request, Country $country)
    {
        $country->update($request->validated());

        return response()->updateSuccess();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Country $country
     * @return JsonResponse
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return response()->deleteSuccess();
    }
}
