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

                     <!-- <form method="post" action="/delete">
                       {{ method_field('DELETE') }}
                       {{ csrf_field() }} -->
                       <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
                       <!-- <input typ e="hidden" name="_method" value="DELETE"> -->
                     <?php
                     //TODO continue here -- DONE
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
                       $item_id = DB::table('items')->where('mechanic_id', $userID)->pluck('id');


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
                             $newString = $user_id[$i];
                             $userName = DB::table('users')->where('id', $user_id[$i])->pluck('name');
                             $userNameSubstring = substr($userName, 2, -2);
                             print($userNameSubstring);
                             print("  ||  ");
                             print("Označi kao dovršeno: ");
                             print($item_id[$i]);

                             print("<a href=\"/delete/{{ $newString }}\" > <button>Delete</button> </a>");
                             //print("<a href=\"{{URL::to('/delete/'.$newString)}}\" > <button>Delete</button> </a>");

                             // print("<input type=\"radio\" name=\"delete_id\" value=\"");
                             // print($item_id[$i]);
                             //print("\">");
                             print("<br><br>");
                         }
                         //print("<button>Delete</button> <a href=\"/delete/{{$item_id}}\" >");
                         //print("<input type=\"submit\" name=\"submit\" class=\"btn btn-secondary\">");
                       } else {
                         print("Nemate zakazanih klijenata");
                       }
                    ?>
                    <!-- </form> -->

                    <form method="post" action="/delete/{{ $newString->id }}">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <a href="/delete/{{ $newString }}" > <button>Delete</button> </a>
                    </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
