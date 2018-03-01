@extends('layouts.master')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><a class="btn btn-warning" href="{{'/users/' . $user->id}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$users->links()}}                    
@endsection