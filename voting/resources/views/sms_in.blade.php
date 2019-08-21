@extends('layouts.app')  
@section('content')
  <div class="container">
    <h1>Sms In</h1> 

      {!! Form::open(['route' => 'voting.search']) !!}
        <div class="row">
            <div class="col-md-2">
                <label class="pull-right" > Date From : </label>                
            </div>
             <div class="col-md-2">
                
                <div class="pull-left "><input class="form-control" type="date" required="true"  name="from" id="from"></div>
            </div>
            <div class="col-md-2">
                <label class="pull-right" > Date To : </label>
              
            </div>
            <div class="col-md-2">
               
                <div class="pull-left "><input class="form-control" type="date" required="true" name="to" id="to"></div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary pull-right">Search
                </button>
            </div>
        </div>
        {!! Form::close() !!}
   <table class="table table-responsive" id="types-table">
    <thead>
        <tr>
            <th>Callerid</th>
            <th >Keyword</th>
             <th >Date</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sms_ins as $sms_in)
        <tr>
            <td>{!! $sms_in->callerid !!}</td>
            <td>{!! $sms_in->keyword !!}</td>
            <td>{!! $sms_in->timestamp !!}</td>            
        </tr>
    @endforeach
    </tbody>
</table>
</div>


@endsection
