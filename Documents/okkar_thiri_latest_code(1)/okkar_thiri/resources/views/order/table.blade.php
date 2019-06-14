<table class="table table-responsive" id="products-table">
    <thead>
    <tr>
        <th>Customer Name</th>
        <th>Item</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Status</th>

        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td><a href="{!! route('users.show', [$order->users->id]) !!}" > {!! $order->users->name !!}</a></td>
            <td>{!! $order->order_name !!}</td>
            <td>{!! $order->order_price !!}</td>
            <td>{!! $order->order_quantity !!}</td>
            <td>{!! $order->order_total !!}</td>
            <td>
                @if($order->order_status == 1)
                <span class="label label-success">Delivered</span>
                    @else
                    <span class="label label-warning">Pending</span>
                    @endif

            </td>
            <td>

                    <div class='btn btn-default btn-xs complete-confirm'>Complete
                        <input type="hidden" value="{{ $order->id }}" class="id">
                        <i class="glyphicon glyphicon-edit"></i></div>
                    <!-- <div class='btn btn-default btn-xs delete-confirm'>
                        <input type="hidden" value="{{ $order->id }}" class="id">
                        <i class="glyphicon glyphicon-trash"></i></div> -->

            </td>
        </tr>
    @endforeach
    </tbody>
</table>