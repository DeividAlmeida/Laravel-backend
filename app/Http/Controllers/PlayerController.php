<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Player;


class PlayerController extends Controller
{
  public function index () {
    $data = Player::all();
    return response()->json($data);
  }

  public function show ($team_id) {
    $data = Player::findOrFail($team_id);
    return response()->json($data);
  }

  public function store (Request $request) {
    $data = new Player;
    $data->team_id = $request->team_id;
    $data->name = $request->name;
    $data->number = $request->number;
    $data->save();
    $dataAll = Player::all();
    return response()->json($dataAll);
  }
}
