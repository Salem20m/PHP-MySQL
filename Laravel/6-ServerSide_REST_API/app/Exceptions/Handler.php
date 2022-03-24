<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (AuthenticationException $e) {
            $data = [
                'code' => 401,
                'message' => 'Unauthorized'
            ];

            return response()->json(['error'=>$data], 401);
        });

        $this->renderable(function (ValidationException $e) {
            $data = [
                'code' => 422,
                'message' => 'Validation error',
                "errors" => $e->validator->errors()->toArray()
            ];

            return response()->json(['error'=>$data], 422);
        });
    }
}
