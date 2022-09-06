<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Match;

use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
  public function index () {
    $data = Match::all();
    foreach ($data as $key => $row) {
      $data[$key]->team_a = $this->getTeam($row->team_a);
      $data[$key]->team_b = $this->getTeam($row->team_b);
      $data[$key]->matchday = $this->dateFormatted($row->matchday);
    }
    return response()->json($data);
  }

  public function store (Request $request) {
    $data = new Match;
    $data->team_a = $request->team_a;
    $data->team_b = $request->team_b;
    $data->goals_a = $request->goals_a;
    $data->goals_b = $request->goals_b;
    $data->logs_a = $request->logs_a;
    $data->logs_b = $request->logs_b;
    $data->matchday = $request->matchday;
    $data->save();
    $dataAll = Match::all();
    foreach ($dataAll as $key => $row) {
      $dataAll[$key]->team_a = $this->getTeam($row->team_a);
      $dataAll[$key]->team_b = $this->getTeam($row->team_b);
      $dataAll[$key]->matchday = $this->dateFormatted($row->matchday);
    }
    return response()->json($dataAll);
  }

  private function dateFormatted($row) { 
    return date('d/m/Y\ H:i', strtotime($row));
  }

  private function getTeam($id) {
    return DB::table('teams')->where('id', $id)->value('name');
  }
}
