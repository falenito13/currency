<!DOCTYPE html>
<html>
<head>
    <title>ვალუტის კურსები</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
   <body>
   <table class="table">
       <thead>
       <tr>
           <th scope="col">ვალუტა</th>
           <th scope="col">ყიდვა</th>
           <th scope="col">გაყიდვა</th>
       </tr>
       </thead>
       <tbody>
       @foreach($getCurrency as $currency)
       <tr>
           <td>{{$currency->currency}}</td>
           <td>{{$currency->buy}}</td>
           <td>{{$currency->sell}}</td>
           @endforeach
       </tr>
       </tbody>
   </table>
   </body>
</html>
