<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIBaseController;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketAPIController extends APIBaseController
{
    public function event_ticket_store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'ticket_number' => 'required|integer|min:1|max:1111111111111110',
            'price' => 'required|between:0,9999999999999999.99'
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first());
        }

        $store = Ticket::create($input);

        if (!$store) {
            return $this->sendError('Ticket Creation Failed');
        }

        $tickets = Ticket::latest()->first();

        return $this->sendResponse($tickets, 'Ticket Created');
    }


    public function  event_ticket_list($event_id)
    {
        $tickets = Ticket::where('event_id', '=', $event_id)->orderBy('id', 'ASC')->get();

        if (!$tickets) {
            return $this->sendError('Data not found');
        }

        return $this->sendResponse($tickets, 'Data retrieved successfully');
    }


    public function event_ticket_delete($ticket_id)
    {
        $tickets = Ticket::find($ticket_id);
        $status = $tickets->delete();
        if (!$status) {
            return $this->sendError('Data not deleted');
        }

        return $this->sendResponse($status, 'Data deleted successfully');
    }


    public function event_ticket_update($ticket_id, Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'ticket_number' => 'required|integer|min:1|max:1111111111111110',
            'price' => 'required|between:0,9999999999999999.99'
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first());
        }

        $status = Ticket::where('id', '=', $ticket_id)->update($input);

        return $this->sendResponse($status, 'Ticket Updated successfully');
    }
}
