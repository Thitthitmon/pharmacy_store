

<!DOCTYPE html>

<html lang="en">

<head>

  <title>Okkar Thiri</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>

 
<div class="container">
	<br>

  <h2>Product Detail Description</h2>

  <div class="card">

    <div class="card-header" align="center">{!! $products->name !!}</div>

    <div class="card-body">
    	<div class="container" align="center">
    		<img src="{{asset($products->image)}}">
    	</div>
    </div> 

    
		<div class="container" align="center">
    		<b>Price      :</b>  {!! $products->price !!}
    		<br>
    		<b>Category :</b>{!! $products->types['name'] !!}

    		<br>
    		<b>Description :</b> <p> {!! $products->description !!}</p>

    	</div>
    <div class="card-footer">
      <div class="container" align="center">
      	<a href="{!! route('home.index') !!}" class="btn btn-info">Back</a>
      </div>	
    	
    </div>

  </div>

</div>

​

</body>

</html>

​

