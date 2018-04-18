@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add User</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('user.add') }}">Add User</a> 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manage User</div>
                <div class="card-body">
                    <table class="table table-hover m-0  table-actions-bar dt-responsive " cellspacing="0" width="100%" id="datatable">
                       <thead>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th class="hidden-sm">Action</th>
                            </tr>
                        </thead>
                         <tbody>
                            @php $no=1; @endphp
                            @foreach($userData as $user)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('user.edit', [$user->id]) }}">Edit</a> <br>
                                        <form method="POST" action="{{ route('user.destroy', [$user->id]) }}">
                                                {!! method_field('delete') !!}
                                                {!! csrf_field() !!}
                                                <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection
