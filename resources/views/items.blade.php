@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prijava kvara</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="/items">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                      <input type="hidden" name="user_id" value="<?php $user = Auth::user(); print($user->id); ?>">
                      <input type="text" name="make" placeholder="Marka vozila"><br><br>
                      <input type="text" name="model" placeholder="Model vozila"><br><br>
                      <input type="text" name="engine" placeholder="Motor"><br><br>
                      <input type="text" name="description" placeholder="Opis kvara"><br><br>
                      Odaberite automehaničara:
                      <?php
                         $roles = DB::table('roles')->where('role', 2)->pluck('user_id');
                         $size = sizeof($roles);
                         //print($tasks);
                         if($roles != ""){
                           for($i=0; $i<$size; $i++){
                              $name = DB::table('users')->where('id', $roles[$i])->pluck('name');
                              print("<br><br><a type=\"button\">  ");
                              print($name[$i]);
                              print("  </a><br>");
                           }
                         } else {
                           print("Nema prijavljenih automehaničara");
                         }
                      ?>
                      <br>
                      <br>
                      <input type="submit" name="submit" class="btn btn-secondary" title="Prijavi kvar">
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
