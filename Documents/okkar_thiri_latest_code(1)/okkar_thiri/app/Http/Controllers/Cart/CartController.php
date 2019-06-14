<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Cart\Cart;
use App\Models\Order;
use App\Models\Type;
use App\User;
use App\Models\Product;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $oderRepo;

    public function __construct(OrderRepository $oderRepo)
    {
        $this->oderRepo = $oderRepo;
    }

    public function addTocart(Request $request)
    {

        $a = (isset($request->a)) ? $request->a : 'home';

        $products = Product::get();


// Initialize cart object
        $cart = new Cart([
            // Maximum item can added to cart, 0 = Unlimited
            'cartMaxItem' => 0,

            // Maximum quantity of a item can be added to cart, 0 = Unlimited
            'itemMaxQuantity' => 5,

            // Do not use cookie, cart items will gone after browser closed
            'useCookie' => false,
        ]);

// Shopping Cart Page
        if ($a == 'cart') {
            $cartContents = '
    <div class="alert alert-warning">
        <i class="fa fa-info-circle"></i> There are no items in the cart.
        
        <a href="/home" class="btn btn-primary">Continue Shopping</a>
    </div>';

            // Empty the cart
            if (isset($request->empty)) {
                $cart->clear();
            }

            // Add item
            if (isset($request->add)) {


                foreach ($products as $product) {
                    if ($request->id == $product->product_id) {
                        break;
                    }
                }

                $cart->add($request->id, $_POST['qty'], [
                    'name' => $request->name,
                    'price' => $request->price,
                    'color' => (isset($request->color)) ? $request->color : '',
                ]);
            }

            // Update item
            if (isset($request->update)) {
                foreach ($products as $product) {
                    if ($request->id == $product->product_id) {
                        break;
                    }
                }
                $cart->update($request->id, $request->qty, [
                    'price' => '1000',
                    'color' => (isset($request->color)) ? $request->color : '',
                ]);
            }

            // Remove item
            if (isset($request->remove)) {
                foreach ($products as $product) {
                    if ($request->id == $product->product_id) {
                        break;
                    }
                }

                $cart->remove($request->id, [
                    'price' => $request->price,
                    'color' => (isset($request->color)) ? $request->color : '',
                ]);
            }

            if (!$cart->isEmpty()) {
                $allItems = $cart->getItems();
                $cartContents = '
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="col-md-7">Product</th>
                    <th class="col-md-3 text-center">Quantity</th>
                    <th class="col-md-2 text-right">Price</th>
                </tr>
            </thead>
            <tbody>';

                foreach ($allItems as $id => $items) {
                    foreach ($items as $item) {
                        foreach ($products as $product) {
                            if ($id == $product->product_id) {
                                break;
                            }
                        }

                        $cartContents .= '
                <tr>
                    <td>' . $item['attributes']['name'] . ((isset($item['attributes']['color'])) ? ('<p><strong>Color: </strong>' . $colors[$item['attributes']['color']] . '</p>') : '') . '</td>
                    <td class="text-center"><div class="form-group"><input type="number" value="' . $item['quantity'] . '" class="form-control quantity pull-left" style="width:100px"><div class="pull-right"><button class="btn btn-default btn-update" data-id="' . $id . '" data-color="' . ((isset($item['attributes']['color'])) ? $item['attributes']['color'] : '') . '"><i class="fa fa-refresh"></i> Update</button><button class="btn btn-danger btn-remove" data-id="' . $id . '" data-color="' . ((isset($item['attributes']['color'])) ? $item['attributes']['color'] : '') . '"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div></div></td>
                    <td class="text-right">' . $item['attributes']['price'] . 'Ks</td>
                </tr>';
                    }
                }

                $cartContents .= '
            </tbody>
        </table>

        <div class="text-right">
            <h3>Total:<br />' . number_format($cart->getAttributeTotal('price') ) . 'Ks</h3>
        </div>

        <p>
            <div class="pull-left">
                <button class="btn btn-danger btn-empty-cart">Empty Cart</button>
            </div>
            <div class="pull-right text-right">
                <a href="/home" class="btn btn-primary">Continue Shopping</a>
                <a href="/cartToOrder" class="btn btn-success">Order Now</a>
            </div>
        </p>';
            }
        }
        $total = $cart->getTotalItem();

        return view('cart.index')->with(['cartContents' => $cartContents, 'total' => $total]);
    }


    public function cartToOrder()
    {
        if (!Auth::check()) {
            
            return redirect('login')->with('info', 'To Continue Order You Need To login First.');

        } else {
            Session::put('login', 'You can order your item now');
            $user_id = Auth::user()->id;
        }
        $cart = new Cart([
            // Maximum item can added to cart, 0 = Unlimited
            'cartMaxItem' => 0,

            // Maximum quantity of a item can be added to cart, 0 = Unlimited
            'itemMaxQuantity' => 5,

            // Do not use cookie, cart items will gone after browser closed
            'useCookie' => false,
        ]);

        $products = $cart->getItems();

        foreach ($products as $key => $value) {
            foreach ($value as $product) {
                $order_status = 0;
                $order_name = $product['attributes']['name'];
                $order_price = $product['attributes']['price'];
                $order_qty = $product['quantity'];
                $order_total = $order_price * $order_qty;
                $product_id = $product['id'];

                $data = [
                    'user_id' => $user_id,
                    'order_price' => $order_price,
                    'order_quantity' => $order_qty,
                    'order_status' => $order_status,
                    'order_total' => $order_total,
                    'order_name' => $order_name,
                ];
                $create = $this->oderRepo->create($data);
                $product = Product::find($product_id);
                $product->decrement('quantity', $order_qty);
            }
        }
        $total =  number_format($cart->getAttributeTotal('price') ) . 'Ks';
//dd($products);
        $cart->clear();
//dd($products);
        $cart = new Cart([
            // Maximum item can added to cart, 0 = Unlimited
            'cartMaxItem' => 0,

            // Maximum quantity of a item can be added to cart, 0 = Unlimited
            'itemMaxQuantity' => 5,

            // Do not use cookie, cart items will gone after browser closed
            'useCookie' => false,
        ]);

        $types    = Type::get();
        $products_types = Product::with('types')->get();
        Session::forget('login');
        return view('home.order_success')->with(['products'=> $products_types, 'types' => $types, 'total'=>$total, 'orders'=> $products]);
    }

    public function order()
    {

        $orders = Order::with('users')->get();
        $users  = User::get();

        return view('order.index', compact('orders','users'))->withId('');

    }

    public function complete(Request $request)
    {
        Order::where('id', $request->id)->update(['order_status' => 1]);
    }

    public function delete(Request $request)
    {
        Order::where('id', $request->id)->delete();
    }
}
