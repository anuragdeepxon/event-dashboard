<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIBaseController;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class EventAPIController extends APIBaseController
{

    /**
     * @OA\GET (
     *   path="/event",
     *   summary="Get event_.",
     *   tags={"event_"},
     *   @OA\Response(
     *     response=200,
     *     description="Response.",
     *     @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="title",
     *                     description="API title response.",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="descriptione",
     *                     description="API descriptione response.",
     *                     type="string"
     *                 )
     *                 ),
     *             ),
     *         ),
     *   ),
     * ),
     */

    ###########  ############
    public function event_list()
    {
        $events = Event::orderBy('start_date', 'ASC')->get();

        if (!$events) {
            return $this->sendError('Data not found');
        }

        return $this->sendResponse($events, 'Data retrieved successfully');
    }






    public function event_list_one($id)
    {
        $event = Event::where('id', '=', $id)->get();

        if (!$event) {
            return $this->sendError('Data not found');
        }
        return $this->sendResponse($event, 'Data retrieved successfully');
    }


    public function event_update_one($id, Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required',
            'organizer' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first());
        }

        $input['start_date'] = Carbon::parse($input['start_date']);
        $input['end_date'] = Carbon::parse($input['end_date']);

        $status = Event::where('id', '=', $id)->update($input);

        if (!$status) {
            return $this->sendError('Event Updation Failed');
        }
        return $this->sendResponse($status, 'Event Updated ');
    }
}
