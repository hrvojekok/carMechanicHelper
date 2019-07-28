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
                     $make = DB::table('items')->pluck('make');
                     $model = DB::table('items')->pluck('model');
                     $engine = DB::table('items')->pluck('engine');
                     $description = DB::table('items')->pluck('description');
                     $size = sizeof($make);
                     //print($tasks);
                     if($description != ""){
                       for($i=0; $i<$size; $i++){
                           print($make[$i]);
                           print("  ");
                           print($model[$i]);
                           print("  ");
                           print($engine[$i]);
                           print(" ");
                           print($description[$i]);
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
