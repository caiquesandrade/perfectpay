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
    <a href="{{ route('products.create')}}" class="btn btn-primary">New Product</a>
  <br /> <br />


  <table class="table table-striped">
    <thead>
        <tr>
          <td>Id</td>
          <td>Name</td>
          <td>Description</td>
          <td>Price</td>
          <td colspan="2"></td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            {{-- <td><a href="{{ route('despesa.product',$product->id)}}">{{$product->descricao}}</a></td> --}}

            <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Remover</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
</div>
