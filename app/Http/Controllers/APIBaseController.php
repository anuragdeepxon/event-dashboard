<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Encryption\Encrypter;


class APIBaseController extends Controller
{

    public function __construct()
    {
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message,
        ], 200);
    }

    public function sendError($message)
    {
        return Response::json([
            'success' => false,
            'message' => $message,
        ], 403);
    }

    public function sendResponse($data, $message)
    {
        return Response::json([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], 200);
    }
}
