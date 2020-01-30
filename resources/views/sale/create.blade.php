<!-- create.blade.php -->

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
    New Sale
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
      <form method="post" action="{{ route('sales.store') }}">
          <div class="form-group">
              @csrf
              <div class="form-group">
                <label for="product_id">Product :</label>
                <select class="form-control" name="product_id" >
                    @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="customer_id">Customer :</label>
                <select class="form-control" name="customer_id" >
                    @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="form-group">
              <label for="quantity">Quantity :</label>
              <input type="number" class="form-control" name="quantity"/>
          </div>
          <div class="form-group">
              <label for="discount">Discount :</label>
              <input type="number" class="form-control" name="discount"/>
          </div>
          <div class="form-group">
              <label for="sale_amount">Sale Amount :</label>
              <input type="number" class="form-control" name="sale_amount"/>
          </div>
          <div class="form-group">
              <label for="status">Status :</label>
              <input type="text" class="form-control" name="status"/>
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>
@endsection
</div>
