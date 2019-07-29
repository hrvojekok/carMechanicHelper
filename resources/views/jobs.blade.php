@extends('layouts.app')

 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Vaši poslovi</div>

                 <div class="card-body">
                     @if (session('status'))
                         <div class="alert alert-success" role="alert">
                             {{ session('status') }}
                         </div>
                     @endif

                     <?php
                     //TODO continue here
                     $user = Auth::user();
                     //print($user->id);
                     // print("<br><br>");
                     $userID = $user->id;
                     // print($userID);
                     // print("<br><br>");

                     //$descriptionReal = DB::table('items')->where('mechanic_id', $userID)->pluck('description');
                     //print($descriptionReal);
                     //print("<br><br>");

                     // $customer = DB::table('items')->where('mechanic_id', $user)->pluck('id');
                     // $sizeCustomer = sizeof($customer);
                     // //print("sizeCustomer");
                     // //print($sizeCustomer);
                     // for($j=0; $j<$sizeCustomer; $j++){
                     //   print($customer[$j]);
                     // }

                       $make = DB::table('items')->where('mechanic_id', $userID)->pluck('make');
                       $model = DB::table('items')->where('mechanic_id', $userID)->pluck('model');
                       $engine = DB::table('items')->where('mechanic_id', $userID)->pluck('engine');
                       $description = DB::table('items')->where('mechanic_id', $userID)->pluck('description');
                       $user_id = DB::table('items')->pluck('user_id');

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
                             print("Ime naručitelja: ");
                             $userName = DB::table('users')->where('id', $user_id[$i])->pluck('name');
                             $userNameSubstring = substr($userName, 2, -2);
                             print($userNameSubstring);
                             print("<br>");
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
