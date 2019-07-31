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
                  @foreach ($items as $item)
                    <li>{{ $item->description }}</li>
                    <li>{{ $item->make }}</li>
                    <form method="post" action="test/{{ $item->id }}">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}

                      <button type="submit"> DELETE </button>

                    </form>
                  @endforeach

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
