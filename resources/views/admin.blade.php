@extends('layouts.app')

 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Pregled automehaničarskih radiona, korisnika usluga i zakazanih poslova </div>

                 <div class="card-body">
                     @if (session('status'))
                         <div class="alert alert-success" role="alert">
                             {{ session('status') }}
                         </div>
                     @endif


                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
