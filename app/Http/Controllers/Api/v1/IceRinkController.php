<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\IceRinkRequest;
use App\Http\Resources\IceRinkResource;
use App\Models\IceRink;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class IceRinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return IceRinkResource::collection(IceRink::orderBy('name')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IceRinkRequest $request
     * @return Response
     */
    public function store(IceRinkRequest $request)
    {
        IceRink::create($request->validated());

        return response()->createSuccess();
    }

    /**
     * Display the specified resource.
     *
     * @param IceRink $iceRink
     * @return IceRinkResource
     */
    public function show(IceRink $iceRink)
    {
        return new IceRinkResource($iceRink);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IceRinkRequest $request
     * @param IceRink $iceRink
     * @return Response
     */
    public function update(IceRinkRequest $request, IceRink $iceRink)
    {
        $iceRink->update($request->validated());

        return response()->updateSuccess();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param IceRink $iceRink
     * @return Response
     */
    public function destroy(IceRink $iceRink)
    {
        $iceRink->delete();

        return response()->deleteSuccess();
    }
}
