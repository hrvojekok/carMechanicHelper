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
                    <br><br>

                    <?php
                      $user = Auth::user();
                      $userID = $user->id;
                    ?>

                    <?php
                      $make = DB::table('items')->where('mechanic_id', $userID)->pluck('make');
                      $model = DB::table('items')->where('mechanic_id', $userID)->pluck('model');
                      $engine = DB::table('items')->where('mechanic_id', $userID)->pluck('engine');
                      $description = DB::table('items')->where('mechanic_id', $userID)->pluck('description');
                      $user_id = DB::table('items')->where('mechanic_id', $userID)->pluck('user_id');
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
                            //print($user_id[$i]);
                            $userName = DB::table('users')->where('id', $user_id[$i])->pluck('name');
                            $userNameSubstring = substr($userName, 2, -2);
                            print($userNameSubstring);
                            //print("  ||  ");
                            //print("Označi kao dovršeno: ");
                            //print($item_id[$i]);

                            print("<form method=\"post\" action=\"jobs/$item_id[$i]\">");
                            print("<input type=\"hidden\" name=\"_method\" value=\"DELETE\">");
                            print("<input type=\"hidden\" name=\"_token\" value=\"");
                            print(csrf_token());
                            print("\">");
                            print("<button type=\"submit\"> Označi kao dovršeno </button>");

                            print("</form>");
                            //print("<a href=\"/delete/{{ $newString }}\" > <button>Označi kao dovršeno</button> </a>");
                            //print("<a href=\"{{URL::to('/delete/'.$newString)}}\" > <button>Delete</button> </a>");

                            // print("<input type=\"radio\" name=\"delete_id\" value=\"");
                            // print($item_id[$i]);
                            //print("\">");
                            print("<br><br>");
                        }

                        //print("<button>Delete</button> <a href=\"/delete/{{$item_id}}\" >");
                        //print("<input type=\"submit\" name=\"submit\" class=\"btn btn-secondary\">");
                      } else {
                        //print("Nemate zakazanih klijenata");
                      }
                      if($make == "[]"){
                        print("Nemate zakazanih poslova");
                      }

                    ?>
                    <!-- @foreach ($items as $item)
                      <li>{{ $item->where('mechanic_id', $userID)->pluck('make')}}</li>

                      <li>{{ $item->where('mechanic_id', $userID)->pluck('model') }}</li>
                      <li>{{ $item->where('mechanic_id', $userID)->pluck('engine') }}</li>
                      <li>{{ $item->where('mechanic_id', $userID)->pluck('description') }}</li>
                      <li>{{ $item->where('mechanic_id', $userID)->pluck('mechanic_id') }}</li>
                      <form method="post" action="test/{{ $item->id }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

                        <button type="submit"> Označi kao dovršeno </button>

                      </form>
                      <br><br>
                    @endforeach -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
