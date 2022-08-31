<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;

class TeamController extends Controller
{
  public function index () {
    $data = Team::all();
    return response()->json($data);
  }

  public function show ($id) {
    $data = Team::findOrFail($id);    
    return response()->json($data);
  }

  public function store (Request $request) {
    $data = new Team;
    $data->name = $request->name;

    $data->save();

    $dataAll = Team::all();
    return response()->json($dataAll);

  }
}
