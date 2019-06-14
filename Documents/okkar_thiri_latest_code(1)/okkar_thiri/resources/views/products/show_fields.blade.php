<!-- Id Field -->


<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $products->name !!}</p>
</div>
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $products->code !!}</p>
</div>
<div class="form-group">
    {!! Form::label('name', 'Category:') !!}
    <p>{!! $products->types['name'] !!}</p>
</div>
<div class="form-group">
    {!! Form::label('name', 'Description:') !!}
    <p>{!! $products->description !!}</p>
</div>
<div class="form-group">
    {!! Form::label('name', 'Price:') !!}
    <p>{!! $products->price !!}</p>
</div>
<div class="form-group">
    {!! Form::label('name', 'Quantity:') !!}
    <p>{!! $products->quantity !!}</p>
</div>
<div class="form-group">
<img src="{{asset($products->image)}}">
</div>




