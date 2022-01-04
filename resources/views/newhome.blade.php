@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="alert alert-success" role="alert">
                Task Completed
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><a href="/newhome/{{ $item->id }}"><button type="button" class="btn btn-success">Accept</button></a>
                        <a href="/deny/{{ $item->id }}"><button type="button" class="btn btn-danger">Deny</button></td></a>
                        @endforeach
                    </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
