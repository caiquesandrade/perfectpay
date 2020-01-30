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
    Create new Customer
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
      <form method="post" action="{{ route('customers.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name :</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="identification_type">Identification Type :</label>
              <input type="text" class="form-control" name="identification_type"/>
          </div>
          <div class="form-group">
              <label for="identification_number">	Identification Number :</label>
              <input type="number" class="form-control" name="identification_number"/>
          </div>

          <div class="form-group">
            <label for="email">	Email:</label>
            <input type="email" class="form-control" name="email"/>
            </div>

          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>
@endsection
</div>
