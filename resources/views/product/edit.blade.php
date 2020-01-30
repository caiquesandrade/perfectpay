<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="container">

<div class="card uper">
  <div class="card-header">
    Edit Product
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.update', $product->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{$product->name}}"/>
              <label for="name">Description:</label>
              <input type="text" class="form-control" name="description" value="{{$product->description}}"/>
              <label for="name">Price:</label>
              <input type="text" class="form-control" name="price" value="{{$product->price}}"/>
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>
@endsection
</div>
