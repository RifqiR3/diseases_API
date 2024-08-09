<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // Handle specific exceptions and return JSON response
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'status' => [
                    'code' => '405',
                    'error' => 'Method Not Allowed'
                ],
            ], 405);
        }

        // // Handle validation exceptions and return JSON response
        if ($exception instanceof RouteNotFoundException) {
            return response()->json([
                'status' => [
                    'code' => '400',
                    'error' => 'Invalid Token.',
                ],
            ], 400);
        }


        // Handle unauthorized exceptions and return JSON response
        if ($exception instanceof HttpResponseException && $exception->getStatusCode() === 401) {
            return response()->json([
                'code' => '401',
                'error' => 'Unauthorized'
            ], 401);
        }

        return parent::render($request, $exception);
    }

    // Other methods in your Handler class...
}
