@extends('layouts.app')

 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Pregled automehaničarskih radiona, korisnika usluga i zakazanih poslova </div>

                 <div class="card-body">
                     @if (session('status'))
                         <div class="alert alert-success" role="alert">
                             {{ session('status') }}
                         </div>
                     @endif


                    <?php



                      $make = DB::table('items')->pluck('make');
                      $model = DB::table('items')->pluck('model');
                      $engine = DB::table('items')->pluck('engine');
                      $description = DB::table('items')->pluck('description');
                      $mechanic_id = DB::table('items')->pluck('mechanic_id');
                      $item_id = DB::table('items')->pluck('id');
                      $user_id = DB::table('items')->pluck('user_id');
                      //print($item_id);

                      $size = sizeof($make);
                      //print($tasks);
                      if($make != ""){
                        for($i=0; $i<$size; $i++){
                            print("Marka vozila: ");
                            print($make[$i]);
                            print("  ||  ");
                            print("Model vozila: ");
                            print($model[$i]);
                            print("  ||  ");
                            print("Motor: ");
                            print($engine[$i]);
                            print("  ||  ");
                            print("Opis kvara: ");
                            print($description[$i]);
                            print("  ||  ");
                            print("Ime automehaničara: ");
                            //print($mechanic_id[$i]);
                            $mechanicName = DB::table('users')->where('id', $mechanic_id[$i])->pluck('name');
                            $mechanicNameSubstring = substr($mechanicName, 2, -2);
                            print($mechanicNameSubstring);
                            print("  ||  ");
                            print("Ime osobe koja je naručila popravak: ");
                            //print($mechanic_id[$i]);
                            $orderPerson = DB::table('users')->where('id', $user_id[$i])->pluck('name');
                            $orderPersonSubstring = substr($orderPerson, 2, -2);
                            print($orderPersonSubstring);

                            print("<br><br>");
                        }
                      } else {
                        //print("Nemate prijavljenih kvarova");
                      }
                      if($make == "[]"){
                        print("Nemate prijavljenih kvarova");
                      } else {
                        print("");
                      }

                   ?>



                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
