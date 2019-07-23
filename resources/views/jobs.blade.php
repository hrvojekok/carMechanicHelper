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
                       $jobs = DB::table('items')->pluck('description');
                       $size = sizeof($jobs);
                       //print($tasks);
                       if($jobs != ""){
                         for($i=0; $i<$size; $i++){
                             print($jobs[$i]);
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
