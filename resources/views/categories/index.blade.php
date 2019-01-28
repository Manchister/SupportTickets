@extends('layouts.app')

@section('title', 'All Tickets')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-warning">
                <div class="card-header">
                    <i class="fa fa-book"> Categories    <a class="btn btn-sm btn-success" href="{{ url('/admin/new_category') }}">Create New</a></i>
                </div>

                <div class="card-body">
                    @include('includes.flash')
                    @if ($categories->isEmpty())
                        <p>There are currently no Categories.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Last Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        {{$category->id}}
                                    </td>
                                    <td>
                                        {{$category->name}}
                                    </td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/category/' . $category->id) }}" class="btn btn-sm btn-primary">Tickets</a>
                                    
                                        <form action="{{ url('admin/delete_category/' . $category->id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $categories->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection