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

        $make = $request->input('make');
        $model = $request->input('model');
        $engine = $request->input('engine');
        $description = $request->input('description');

        $data = array('make'=>$make, 'model'=>$model, 'engine'=>$engine, 'description'=>$description);

        DB::table('items')->insert($data);

        return redirect()->to('/home');

    }
}
