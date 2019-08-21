@extends('layouts.app')  
@section('content')
<div class="container"> 
{!! Form::open(['route' => 'detail.search']) !!}


        <div class="row">
            
             <div class="col-md-1">
             <br>                
                    <a href="{{route('home')}}" class="btn btn-info">
                    Back</a>
            </div>

           
             <div class="col-md-3">             
                 
                <p>From:<br> <input type="date" name="from"  value="{!! !empty($from) ? $from : 'variable does not exist' !!}" class="form-control"></p>
             </div>
            
            <div class="col-md-3">  
                           
                <p>To: <br> <input type="date" name="to" value="{!! !empty($to) ? $from : 'variable does not exist' !!}" class="form-control"></p>

            </div>
            <div class="col-md-1">
                <br>
                <button type="submit" class="btn btn-primary pull-right">Search
                </button>
            </div>
             

        </div>
{!! Form::close() !!}

{!! Form::open(['route' => 'export'








]) !!}
<input type="text" name="from" value="{!! !empty($from) ? $from : 'variable does not exist' !!}" class="form-control">


<input type="text" name="to" value="{!! !empty($to) ? $to : 'variable does not exist' !!}" class="form-control">


 <div class="col-md-2"> 
            <br>               
                   <button type="submit" class="btn btn-primary pull-right">Export Excel
                </button> 
                   
            </div>

{!! Form::close() !!}
</div>



<div class="container">
<hr>


<table class="display" id="table_id">
    <thead>
        <tr>
            <th>Waist number </th>            
            <th >Count</th>
        </tr>
    </thead>
    <tbody>
        @foreach($missVotings as $missVoting)
        <tr>
            <td>{!! $missVoting->keyword !!}</td>
            <td>{!! $missVoting->voting_count !!}</td>                      
        </tr>
        @endforeach
    </tbody>
</table>

</div>

<script type="text/javascript">

$(document).ready( function () {
    $('#table_id').DataTable();
} );
    
</script>
@endsection                             