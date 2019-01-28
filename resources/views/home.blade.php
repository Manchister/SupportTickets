@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                {{-- <div class="card-header">Dashboard</div> --}}

                <div class="card-body">

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection