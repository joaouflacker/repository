<!DOCTYPE html>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inventary Control</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
        <style>
            body { padding-top: 70px; }
        </style>
    </head>
     <body>

     	  <nav class="navbar navbar-default navbar-fixed-top">
			 <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Home</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('products.index')}}">Products</a></li>
                        <li><a href="{{route('suppliers.index')}}">Suppliers</a></li>
                        <li><a href="{{route('users.index')}}">Users</a></li>
                        <li><a href="{{route('requisitions.index')}}">Requisitions</a></li>
                        <li><a href="{{route('purchases.index')}}">Purchases</a></li>
                    </ul>
                </div>
        	</div>
     	  </nav>

     	  <div class="container">
            @yield('content')
        </div>
        <script type="text/javascript">
            $('[data-date]').each(function () {
                $(this).datetimepicker();
            });
        </script>
     </body>
</html>
