<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Resposta de sucesso.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse(string $message, $data = [], string $statusCode = 'SUCCESS')
    {
    	$response = [
            'status_code' => $statusCode,
            'message'     => $message
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, 200);
    }

    /**
     * Resposta de falha.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError(string $message, $data = [], string $statusCode = 'ERROR', int $code = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
    	$response = [
            'status_code' => $statusCode,
            'message'     => $message
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }
}
