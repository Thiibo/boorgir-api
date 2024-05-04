<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Modules\Users\Services\UserService;
use App\Modules\Helpers\ErrorCreator;
use Illuminate\Http\JsonResponse;

class JwtAuthController
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    // User Register (POST, formdata)
    public function register(Request $request){
        $model = $this->service->create($request->all());
        if ($this->service->hasErrors()) {
            return $this->createErrorResponse();
        }

        return response()->json($model, Response::HTTP_CREATED);
    }

    // User Login (POST, formdata)
    public function login(Request $request){
        $authCookies = $this->service->login($request->all());
        if ($this->service->hasErrors()) {
            return $this->createErrorResponse();
        }

        return response(["message" => "User logged in successfully"])
            ->withCookie($authCookies["token"])
            ->withCookie($authCookies["csrf"]);
    }

    // User Profile (GET)
    public function profile(){
        $userdata = auth()->user();
        return response()->json($userdata);
    } 

    // To generate refresh token value
    public function refreshToken(){
        $authCookies = $this->service->refreshToken();

        return response(["message" => "Token refreshed successfully"])
            ->withCookie($authCookies["token"])
            ->withCookie($authCookies["csrf"]);
    }

    // User Logout (GET)
    public function logout(){
        auth()->logout();
        return response()->json(["message" => "User logged out successfully"]);
    }

    private function createErrorResponse(): JsonResponse
    {
        $errors = $this->service->getErrors();
        $errorCreator = new ErrorCreator();
        return $errorCreator->createErrorResponse($errors, Response::HTTP_BAD_REQUEST);
    }
}
