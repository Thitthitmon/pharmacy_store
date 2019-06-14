@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                       <!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <input type="text" name="name"  class="form-control" required>

</div>
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Code:') !!}
    <input type="text" name="code"  class="form-control" required>

</div>
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Price:') !!}
    <input type="text" name="price"  class="form-control" required>

</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Description:') !!}
   <input type="text" name="description"  class="form-control" required>

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
    <input type="number" name="quantity" class="form-control" required>

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <a href="{!! route('products.index') !!}" class="btn btn-default">Back</a>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}


</div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
