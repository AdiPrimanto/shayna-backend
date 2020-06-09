@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Gambar Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
                {{-- enctype="multipart/form-data" -> utk menambahkan gambar --}}
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ name }}</option>
                        @endforeach
                    </select>
                    @error('products_id') <div class="text-muted">{{ message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Tipe Barang</label>
                    <input type="text" name="type" value="{{ old('type') }}" 
                        class="form-control @error('type') is-invalid @enderror" />
                        @error('type') <div class="text-muted">{{ message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">Deskripsi Barang</label>
                    <textarea name="description" class="form-control ckeditor @error('description') is-invalid @enderror">
                        {{ old('descriptiom') }}</textarea>
                        @error('description') <div class="text-muted">{{ message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="price" class="form-control-label">Harga Barang</label>
                    <input type="number" name="price" value="{{ old('price') }}" 
                        class="form-control @error('price') is-invalid @enderror" />
                        @error('price') <div class="text-muted">{{ message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="quantity" class="form-control-label">Kuantitas Barang</label>
                    <input type="number" name="quantity" value="{{ old('quantity') }}" 
                        class="form-control @error('quantity') is-invalid @enderror" />
                        @error('quantity') <div class="text-muted">{{ message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection