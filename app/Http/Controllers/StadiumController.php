<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Stadium;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\StadiumResource;

class StadiumController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Stadiums = Stadium::all();

        return $this->sendResponse(StadiumResource::collection($Stadiums), 'Stadiums retrieved successfully.');
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
            'detail' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $Stadium = Stadium::create($input);

        return $this->sendResponse(new StadiumResource($Stadium), 'Stadium created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Stadium = Stadium::find($id);

        if (is_null($Stadium)) {
            return $this->sendError('Stadium not found.');
        }

        return $this->sendResponse(new StadiumResource($Stadium), 'Stadium retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stadium $Stadium)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $Stadium->name = $input['name'];
        $Stadium->detail = $input['detail'];
        $Stadium->latitude = $input['latitude'];
        $Stadium->longitude = $input['longitude'];
        $Stadium->save();

        return $this->sendResponse(new StadiumResource($Stadium), 'Stadium updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stadium $Stadium)
    {
        $Stadium->delete();

        return $this->sendResponse([], 'Stadium deleted successfully.');
    }
}
