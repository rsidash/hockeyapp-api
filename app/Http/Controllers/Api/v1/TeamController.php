<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamIndexRequest;
use App\Http\Requests\TeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Services\v1\QueryFilterService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param TeamIndexRequest $request
     * @return AnonymousResourceCollection
     */
    public function index(TeamIndexRequest $request)
    {
//        return TeamResource::collection(Team::orderBy('name')->paginate());
        $model = new Team();
        $filter = new QueryFilterService();

        return TeamResource::collection($filter->applyFilter($model, $request->validated()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeamRequest $request
     * @return Response
     */
    public function store(TeamRequest $request)
    {
        Team::create($request->validated());

        return response()->createSuccess();
    }

    /**
     * Display the specified resource.
     *
     * @param Team $team
     * @return TeamResource
     */
    public function show(Team $team)
    {
        return new TeamResource($team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeamRequest $request
     * @param Team $team
     * @return Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        $team->update($request->validated());

        return response()->updateSuccess();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return response()->deleteSuccess();
    }
}
