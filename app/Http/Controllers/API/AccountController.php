<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function login(Request $request): object
    {
        try {
            $result = ApiHelper::call(
                "member/login",
                "post",
                $request->all()
            );
            $state = $result['content']->state;
            $error = $result['content']->error;
            $token = ($state == 200) ? $token = $result['content']->result->bearer : "";
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 501);
        }

        return response()->json([
            "state" => $state,
            "error" => $error,
            "token" => $token
        ], 200);
    }
}
