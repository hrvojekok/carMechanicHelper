@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dobro došli</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Uspješno ste prijavljeni.
                    <br>
                    <br>
                    <?php
                      $user = Auth::user();
                      $user_id = $user->id;
                      //print($user_id);
                      //print("<br>");
                      // TODO -> continue here -- DONE
                      // if(DB::table('roles')->where('user_id', $user_id->pluck('role')=="")){
                      //   print(" ");
                      // } else {
                      //   $role = DB::table('roles')->where('user_id', $user_id)->pluck('role');
                      //   if($role[0] == "1"){
                      //     print("Registirani ste kao Administrator.");
                      //   } else {
                      //     print(" ");
                      //   }
                      //   if($role[0] == "2"){
                      //     print("Registirani ste kao Vlasnik automehaničarske radione.");
                      //   } else {
                      //     print(" ");
                      //   }
                      //   if($role[0] == "3"){
                      //     print("Registirani ste kao Korisnik usluge.");
                      //   } else {
                      //     print(" ");
                      //   }
                      // };
                      $role = DB::table('roles')->where('user_id', $user_id)->pluck('role');
                      //print($role);
                      if($role != "[]"){
                        if($role[0] == "1"){
                          print("Registirani ste kao Administrator.");
                        } else {
                          print(" ");
                        }
                        if($role[0] == "2"){
                          print("Registirani ste kao Vlasnik automehaničarske radione.");
                        } else {
                          print(" ");
                        }
                        if($role[0] == "3"){
                          print("Registirani ste kao Korisnik usluge.");
                        } else {
                          print(" ");
                        }
                      } else {
                        print("Još uvijek nemate dodijeljenu ulogu. Kliknite ispod da biste odabrali.");
                      }

                      //print($role[0]);
                      //print("<br>");
                     ?>

                    <br>
                    <br>
                    <div class="col-md-0 offset-md-0">
                        <a href='/roles' class="btn btn-secondary">
                            {{ __('Odaberi ulogu') }}
                        </a>
                    </div>
                    <br>

                    <?php
                      if($role != "[]"){
                        if($role[0] == "2"){
                          print("<a class=\"btn btn-secondary\" href='/jobs'> Pogledaj prijavljene poslove </a>");
                        } else {
                          print(" ");
                        }
                      } else {
                        print(" ");
                      }

                    ?>
                    <?php
                      if($role != "[]"){
                        if($role[0] == "3"){
                          print("<a class=\"btn btn-secondary\" href='/items'> Prijavi kvar na automobilu </a>");
                        } else {
                          print(" ");
                        }
                      } else {
                        print(" ");
                      }

                    ?>
                    <br><br>

                    <?php
                      if($role != "[]"){
                        if($role[0] == "3"){
                          print("<a class=\"btn btn-secondary\" href='/failures'> Pogledaj prijavljene kvarove </a>");
                        } else {
                          print(" ");
                        }
                      } else {
                        print(" ");
                      }

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
