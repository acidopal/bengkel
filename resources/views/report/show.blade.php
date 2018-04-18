@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage User</div>
                <div class="card-body">
                    <table class="table table-hover m-0  table-actions-bar dt-responsive " cellspacing="0" width="100%" id="datatable">
                       <thead>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>Nama Item</th>
                                <th>Price</th>
                                <th>Total Item</th>
                                <th>Total</th>
                                <th class="hidden-sm">Action</th>
                            </tr>
                        </thead>
                         <tbody>
                           @php $no=1; @endphp
                            @foreach($transactionData as $transaction)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$transaction->name_item}}</td>
                                    <td>{{$transaction->price}}</td>
                                    <td>{{$transaction->total_item}}</td>
                                    <td>{{$transaction->total}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('report.edit', [$transaction->id]) }}">Edit</a> <br>
                                        <form method="POST" action="{{ route('report.destroy', [$transaction->id]) }}">
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
