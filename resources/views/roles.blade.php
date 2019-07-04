@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Molim odaberite Vašu ulogu:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post">
                      <select>
                        <option value="administrator">Administrator</option>
                        <option value="vlasnikAutomehanicarskeRadione">Vlasnik automehaničarske radione</option>
                        <option value="korisnikUsluge">Korisnik usluge</option>
                      </select>
                      <br>
                      <br>
                      <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
