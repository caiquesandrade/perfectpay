<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

  <div class="container">
    <a href="{{ route('sales.create')}}" class="btn btn-primary">New Sale</a>
  <br /> <br />


  <table class="table table-striped">
    <thead>
        <tr>
          <td>Id</td>
          <td>Product Id</td>
          <td>Customer Id</td>
          <td>Quantity</td>
          <td>Discount</td>
          <td>Sale Amount</td>
          <td>Status</td>
          <td colspan="2"></td>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
        <tr>
            <td>{{$sale->id}}</td>
            <td>{{$sale->product_id}}</td>
            <td>{{$sale->customer_id}}</td>
            <td>{{$sale->quantity}}</td>
            <td>{{$sale->discount}}</td>
            <td>{{$sale->sale_amount}}</td>
            <td>{{$sale->status}}</td>
            <td><a href="{{ route('sales.edit',$sale->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('sales.destroy', $sale->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
</div>
