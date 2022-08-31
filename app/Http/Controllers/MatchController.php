<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Match;

class MatchController extends Controller
{
  public function index () {
    $data = Match::all();
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
    $data->save();
    $dataAll = Match::all();
    return response()->json($dataAll);
  }
}
