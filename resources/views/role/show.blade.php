@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">User List</div>

                <div class="panel-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Roles</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td><a href="{{action('RoleController@edit', array('id'=>$role->id))}}" > Edit </a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @endsection