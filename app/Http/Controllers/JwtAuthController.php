<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Modules\Users\Services\UserService;
use Illuminate\Http\JsonResponse;

class JwtAuthController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        parent::__construct();
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

        return $this->profile()
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

        return $this->responseGenerator->createSuccessResponse("Token refreshed successfully")
            ->withCookie($authCookies["token"])
            ->withCookie($authCookies["csrf"]);
    }

    // User Logout (GET)
    public function logout(){
        auth()->logout();
        return $this->responseGenerator->createSuccessResponse("User logged out successfully");
    }

    private function createErrorResponse(): JsonResponse
    {
        $errors = $this->service->getErrors();
        return $this->responseGenerator->createErrorResponse($errors, Response::HTTP_BAD_REQUEST);
    }
}
