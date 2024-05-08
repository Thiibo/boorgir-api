<?php
namespace App\Modules\Users\Services;

use Nette\Utils\Random;
use App\Models\User;
use App\Modules\Core\Services\Service;
use Illuminate\Support\MessageBag;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserService extends Service {

    protected $fields= ['id', 'name'];
    protected $searchField = 'name';

    protected function getRules()
    {
        return [
            "add" => [
                "name" => "required",
                "email" => "required|email|unique:users",
                "password" => "required|confirmed"
            ],
            "auth" => [
                "email" => "required|email",
                "password" => "required"
            ]
        ];
    }

    public function login($data, $ruleSet = "auth")
    {
        $this->validate($data, $ruleSet);
        if ($this->hasErrors()) return;

        $csrfLength = env("CSRF_TOKEN_LENGTH");
        $csrfToken = Random::generate($csrfLength);

        // JWTAuth (add CSRF token into payload of JWT)
        $token = JWTAuth::claims(['X-XSRF-TOKEN' => $csrfToken])->attempt([
            "email" => $data["email"],
            "password" => $data["password"]
        ]);

        if(empty($token)){
            $this->errors = new MessageBag(["general" => "Invalid details"]);
            return;
        }

        $ttl = env("JWT_COOKIE_TTL");
        return [
            "token" => cookie("token", $token, $ttl),
            "csrf" => cookie("X-XSRF-TOKEN", $csrfToken, $ttl)
        ];
    }

    public function refreshToken()
    {
        $csrfLength = env("CSRF_TOKEN_LENGTH");
        $csrfToken = Random::generate($csrfLength);

        $oldToken = JWTAuth::getToken();
        $token = JWTAuth::claims(['X-XSRF-TOKEN' => $csrfToken])->refresh($oldToken);

        $ttl = env("JWT_COOKIE_TTL");
        return [
            "token" => cookie("token", $token, $ttl),
            "csrf" => cookie("X-XSRF-TOKEN", $csrfToken, $ttl)
        ];
    }

    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
