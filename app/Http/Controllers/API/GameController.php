<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(): object
    {
        try {
            $result = ApiHelper::call(
                "game",
                "get",
                [
                    "limit" => 8,
                    "type" => "new"
                ]
            );
            $games = $result['content']->result;
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 501);
        }

        return response()->json($games, 200);
    }

    public function gamesByCategory(String $category): object
    {
        try {
            $result = ApiHelper::call(
                "game",
                "get",
                [
                    "tag" => $category,
                ]
            );
            $games = $result['content']->result;
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 501);
        }

        return response()->json($games, 200);
    }

    public function search(String $query): object
    {
        try {
            $result = ApiHelper::call(
                "game",
                "get",
                [
                    "search" => $query,
                ]
            );
            $games = $result['content']->result;
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 501);
        }

        return response()->json($games, 200);
    }

    public function tags(): object
    {
        try {
            $result = ApiHelper::call("game/tags", "get");
            $tags = $result['content']->result;
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 501);
        }

        return response()->json($tags, 200);
    }
}
