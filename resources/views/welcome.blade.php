<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Perfect Pay</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>

<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Perfect Pay
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ url('/customers') }}">New Customer</a></li>
                    <li><a href="{{ url('/products') }}">New Product</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if(session()->get('success'))
        <div class="alert alert-danger" id="MyPopup">
            {{ session()->get('success') }}
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div><br />
  @endif
    <div class="container">
    <form method="get" action="{{ route('sales.search') }}">
        <div class="form-group">
            <div class="col-sm-4">
                <select class="form-control" name="customer_id">
                    @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <input type="search" class="form-control mr-sm-2" name="date_search" aria-describedby="periodSearch" placeholder="Enter a Period">
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0"><i class="material-icons">search</i></button>
            </div>
        </div>
    </form>

    <div  style="margin:10em 5em;">

            Products Table
            <table class="table table-hover">
                <thead>
                    <tr>
                      <td>Name</td>
                      <td>Date</td>
                      <td>Price</td>
                      <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @isset($products)
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->created_at->format('d/m/Y')}}</td>
                            <td>{{$product->price}}</td>
                            <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Editar</a></td>
                            {{-- <td><a href="{{ route('despesa.product',$product->id)}}">{{$product->descricao}}</a></td> --}}
                        </tr>
                        @endforeach
                    @endisset
                </tbody>
              </table>

              Sales Result
              <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Status</td>
                        <td>Quantity</td>
                        <td>Sale Amount</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                    <tr>
                        <td>{{$sale->status}}</td>
                        <td>{{$sale->quantity}}</td>
                        <td>{{$sale->sale_amount}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $(function () {
                $("#btnClosePopup").click(function () {
                    $("#MyPopup").remove();
                });
            });
        });
    </script>
</body>
</html>
