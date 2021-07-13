@extends('layouts.app')

@section('content')
 

<div class="container">
      <div class="row ">
        <div class="col">
          <div class="jumbotron bg-white">
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
            <a class="btn btn-secondary btn-lg" href="{{ url('/products') }}" role="button">Product</a>
            <a class="btn btn-danger btn-lg" href="{{ url('/cart') }}" role="button">Supplier</a>
            <a class="btn btn-success btn-lg" href="{{ url('/user') }}" role="button">Member</a>
            <a class="btn btn-secondary btn-lg" href="{{ url('/cart') }}" role="button">Opname</a>
            <a class="btn btn-danger btn-lg" href="{{ url('/cart') }}" role="button">Report</a>
            <a class="btn btn-primary btn-lg" href="{{ url('/cart') }}" role="button">Maintenace</a>

          </div>
        </div>
      </div>
    </div>
@endsection
