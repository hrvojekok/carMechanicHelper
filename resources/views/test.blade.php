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

                    @foreach ($items as $item)
                      <li>{{ $item->make}}</li>
                      <li>{{ $item->model }}</li>
                      <li>{{ $item->engine }}</li>
                      <li>{{ $item->description }}</li>
                      <li>{{ $item->mechanic_id }}</li>
                      <form method="post" action="test/{{ $item->id }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

                        <button type="submit"> Označi kao dovršeno </button>

                      </form>
                      <br><br>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
