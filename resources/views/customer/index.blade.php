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
    <a href="{{ route('customers.create')}}" class="btn btn-primary">New Customer</a>
  <br /> <br />


  <table class="table table-striped">
    <thead>
        <tr>
          <td>Id</td>
          <td>Name</td>
          <td>Identification Type</td>
          <td>Identification Number</td>
          <td>Email</td>
          <td colspan="2"></td>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{$customer->id}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->identification_type}}</td>
            <td>{{$customer->identification_number}}</td>
            <td>{{$customer->email}}</td>
            <td><a href="{{ route('customers.edit',$customer->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('customers.destroy', $customer->id)}}" method="post">
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
