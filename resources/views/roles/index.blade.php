@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Roles</h1>
        </div>
        <div class="col-12">
            <table class="table caption-top">
                <caption>Roles</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $rol)
                    <tr>
                        <th scope="row">{{$rol->id}}</th>
                        <td>{{$rol->rol}}</td>
                        <td>
                            
                        </td>
                    </tr>
                   @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection