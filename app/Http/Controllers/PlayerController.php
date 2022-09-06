<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Player;

use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
  public function index () {
    $data = Player::all();
    foreach ($data as $key => $row) {
      $data[$key]->team = $this->getTeam($row->team_id);
    }
    return response()->json($data);
  }

  public function show ($team_id) {
    $data = Player::where('team_id', $team_id)->get();
    return response()->json($data);
  }

  public function store (Request $request) {
    $data = new Player;
    $data->team_id = $request->team_id;
    $data->name = $request->name;
    $data->number = $request->number;
    $data->save();
    $dataAll = Player::all();
    foreach ($dataAll as $key => $row) {
      $dataAll[$key]->team = $this->getTeam($row->team_id);
    }
    return response()->json($dataAll);
  }

  private function getTeam($id) {
    return DB::table('teams')->where('id', $id)->value('name');
  }
}
