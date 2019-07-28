<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ItemController extends Controller {

  public function insertform() {

      return view('items');
  }

    public function insert (Request $request) {

        $user_id = $request->input('user_id');
        $make = $request->input('make');
        $model = $request->input('model');
        $engine = $request->input('engine');
        $description = $request->input('description');
        $mechanic_id = $request->input('mechanic_id');

        $data = array('user_id'=>$user_id, 'make'=>$make, 'model'=>$model, 'engine'=>$engine, 'description'=>$description, 'mechanic_id'=>$mechanic_id);

        DB::table('items')->insert($data);

        return redirect()->to('/home');

    }
}
