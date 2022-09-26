<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TeamResource;

class TeamController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Teams = Team::all();

        return $this->sendResponse(TeamResource::collection($Teams), 'Teams retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $Team = Team::create($input);

        return $this->sendResponse(new TeamResource($Team), 'Team created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Team = Team::find($id);

        if (is_null($Team)) {
            return $this->sendError('Team not found.');
        }

        return $this->sendResponse(new TeamResource($Team), 'Team retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $Team)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $Team->name = $input['name'];
        $Team->detail = $input['detail'];
        $Team->save();

        return $this->sendResponse(new TeamResource($Team), 'Team updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $Team)
    {
        $Team->delete();

        return $this->sendResponse([], 'Team deleted successfully.');
    }
}
