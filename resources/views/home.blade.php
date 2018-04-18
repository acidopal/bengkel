@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Daily Transaction</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form  method="POST" action="{{ route('daily_transaction.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="text" class="col-sm-4 col-form-label text-md-right">Nama Item</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="name_item" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-sm-4 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="price" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-sm-4 col-form-label text-md-right">Total Item</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="total_item" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
