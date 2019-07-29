@extends('layouts.app')

 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Vaši prijavljeni kvarovi</div>

                 <div class="card-body">
                     @if (session('status'))
                         <div class="alert alert-success" role="alert">
                             {{ session('status') }}
                         </div>
                     @endif

                     <?php

                     $user = Auth::user();
                     //print($user->id);
                     // print("<br><br>");
                     $userID = $user->id;
                     //print($userID);

                       $make = DB::table('items')->where('user_id', $userID)->pluck('make');
                       $model = DB::table('items')->where('user_id', $userID)->pluck('model');
                       $engine = DB::table('items')->where('user_id', $userID)->pluck('engine');
                       $description = DB::table('items')->where('user_id', $userID)->pluck('description');
                       $mechanic_id = DB::table('items')->where('user_id', $userID)->pluck('mechanic_id');


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


                             //print($mechanicName[$i]);
                             // $userName = DB::table('items')->where('mechanic_id', $user_id[$i])->pluck('name');
                             // $userNameSubstring = substr($userName, 2, -2);
                             // print($userNameSubstring);
                             print("<br><br>");
                         }
                       } else {
                         print("Nemate zakazanih klijenata");
                       }
                    ?>

                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
