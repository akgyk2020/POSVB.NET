@extends('layouts.app')

@section('content')
 

<div class="container">
      <div class="row">
        <div class="col">
          <div class="jumbotron">
            <h1 class="display-4">{{ __('Point Of Sale') }}</h1>
            <p class="lead">made for easy .</p>
            <hr class="my-4">
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
            <p>Start for selling anything</p>
            <a class="btn btn-success btn-lg" href="{{ url('/cart') }}" role="button">P.O.S</a>
            
          </div>
        </div>
      </div>
    </div>
@endsection
