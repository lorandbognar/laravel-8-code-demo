@extends('layout')

@section('title')
    Edit Customer: {{ $customer->name }}
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <form action="{{ route('customers.update', $customer) }}" method="POST">
                @method('PATCH')
                @include('customers.form')
            </form>
            @include('customers.delete')
        </div>
    </div>
@endsection