<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <input type="text" name="name" value ="{{$products->name}}" class="form-control" required>

</div>
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Code:') !!}
    <input type="text" name="code" value ="{{$products->code}}" class="form-control" required>

</div>
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Price:') !!}
    <input type="text" name="price" value ="{{$products->price}}" class="form-control" required>

</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Description:') !!}
   <input type="text" name="description" value ="{{$products->description}}" class="form-control" required>

</div>


<div class="form-group col-sm-6">

    {{ Form::label('Choose Category:') }}
    <br>



     {!! Form::select('type',$types,['id'=>'type','class'=>'form-control']) !!}

</div>
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Image:') !!}
    <input type="file" name="image" required="">
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Quantity:') !!}
    <input type="number" name="quantity" value ="{{$products->quantity}}" class="form-control" required>

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <a href="{!! route('products.index') !!}" class="btn btn-default">Back</a>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}


</div>
