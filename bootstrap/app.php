<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {

        //CUSTOM HANDLER FORM VALIDATION
        $exceptions->render(function (\Illuminate\Validation\ValidationException$e, $request) {
            if ($request->is('api/*')) {
                $errorsMsg = '';
                foreach($e->errors() as $key => $value) {
                    if ($key === array_key_first($e->errors())) {
                        $errorsMsg .= $value[0];
                    }
                }

                return response()->json(
                    [
                        "success" => false,
                        "code" => 422,
                        "message" => $errorsMsg,
                        "data" => ['errors' => $e->errors()]
                    ],
                    422
                );
            }
        });
        //CUSTOM HANDLER RETURN NOT LOGIN/UNAUTHORIZED FOR API
        $exceptions->render(function (\Illuminate\Auth\AuthenticationException$e, $request) {
            if ($request->is('api/*')) {
                return response()->json(
                    [
                        "success" => false,
                        "code" => 401,
                        "message" => "Harap login terlebih dahulu. Jika sudah login sebelumnya, logout dulu dari aplikasi sebelum login kembali.",
                        "data" => null,
                    ],
                    401
                );
            }
        });

        //CUSTOM HANDLER FORM NOT FOUND
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException$e, $request) {
            if ($request->is('api/*')) {
                return response()->json(
                    [
                        "success" => false,
                        "code" => 404,
                        "message" => "NOT FOUND",
                        "data" => null,
                    ],
                    404
                );
            }
        });

        //CUSTOM HANDLER FORM NOT ALLOWED
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException$e, $request) {
            if ($request->is('api/*')) {
                return response()->json(
                    [
                        "success" => false,
                        "code" => 405,
                        "message" => "METHOD NOT ALLOWED",
                        "data" => null,
                    ],
                    405
                );
            }
        });

        //SPATIE EXCEPTION
        $exceptions->render(function (\Spatie\Permission\Exceptions\UnauthorizedException$e, $request) {
            if ($request->is('api/*')) {
                return response()->json(
                    [
                        "success" => false,
                        "code" => 403,
                        "message" => "Pengguna tidak memiliki izin akses",
                        "data" => null,
                    ],
                    403
                );
            }
        });
        // $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\HttpException$e, $request) {
        //     if ($request->is('api/*')) {
        //         return response()->json(

        //             [
        //                 "response" => null,
        //                 "metaData" => [
        //                     'success' => false,
        //                     "message" => "METHOD NOT ALLOWED",
        //                     "code" => $e->getStatusCode(),
        //                 ],
        //             ], $e->getStatusCode()
        //         );
        //     }
        // });
    })->create();
