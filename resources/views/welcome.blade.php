@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            
                            @if (Route::has('login'))
    
                            @auth
                                @if (Auth::user()->is_admin)
                                    <div class="jumbotron jumbotron-fluid_">
                                        <h1 class="display-4">Welcome Admin!</h1>
                                        <hr class="my-4">
                                        <a class="btn btn-primary btn-lg" href="{{ url('admin/categories') }}" role="button">Manage Categories</a>
                                        <a class="btn btn-success btn-lg" href="{{ url('admin/tickets') }}" role="button">See all Tickets</a>
                                    </div>
                                @else
                                    <div class="jumbotron jumbotron-fluid_">
                                        <h1 class="display-4">Welcome To our Support!</h1>
                                        <p class="lead">You are logged in.</p>
                                        <hr class="my-4">
                                        <a class="btn btn-primary btn-lg" href="{{ url('my_tickets') }}" role="button">See Your Tickets</a>
                                        <a class="btn btn-success btn-lg" href="{{ url('new_ticket') }}" role="button">Open New Ticket</a>
                                    </div>
                                @endif
                            @else
                            <div class="jumbotron jumbotron-fluid_">
                                    <h1 class="display-4">Welcome To our Support!</h1>
                                    <p class="lead">You must be logged in to open tickets.</p>
                                    <hr class="my-4">
                                    <a class="btn btn-primary btn-lg" href="{{ url('new_ticket') }}" role="button">Open New Ticket</a>
                                </div>
                            @endauth
                        </div>
                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                
            </div>
        </div> --}}
    </body>

@endsection