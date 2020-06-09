@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route(products.store) }}" method="POST">
                @csrf
                
            </form>
        </div>
    </div>
@endsection