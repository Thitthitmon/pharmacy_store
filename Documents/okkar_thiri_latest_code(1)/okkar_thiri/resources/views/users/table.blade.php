<table class="table table-responsive" id="types-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>E-mail</th>
            
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->phone !!}</td>
            <td>{!! $user->address !!}</td>
            <td>{!! $user->email !!}</td>          
               
            <td>
               
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>