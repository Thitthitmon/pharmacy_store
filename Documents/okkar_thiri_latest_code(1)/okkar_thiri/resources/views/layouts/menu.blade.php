

<li class="{{ Request::is('types*') ? 'active' : '' }}">
    <a href="{!! route('types.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>


<li class="{{ Request::is('products*') ? 'active' : '' }}">
    
    <a href="{!! route('products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>


<li class="{{ Request::is('orders*') ? 'active' : '' }}">

    <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Order</span></a>

</li>

<li>

    <a href="{!! route('customers.index') !!}"><i class="fa fa-edit"></i><span>Customers</span></a>
    
</li>

