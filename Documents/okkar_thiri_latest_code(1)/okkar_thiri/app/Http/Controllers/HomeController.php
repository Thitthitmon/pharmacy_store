<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Cart\Cart;
use App\Repositories\CartRepository;
use App\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\TypeRepository;
use Illuminate\Support\Facades\Input;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $productRepository;
    private $typeRepository;


    public function __construct(TypeRepository $typeRepo,ProductRepository $productRepo )
    {
        $this->typeRepository = $typeRepo;
        $this->productRepository = $productRepo;
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Initialize cart object
        $cart = new Cart([
            // Maximum item can added to cart, 0 = Unlimited
            'cartMaxItem' => 0,

            // Maximum quantity of a item can be added to cart, 0 = Unlimited
            'itemMaxQuantity' => 5,

            // Do not use cookie, cart items will gone after browser closed
            'useCookie' => false,
        ]);
        Session::forget('login');
        $total = $cart->getTotalItem();
        $products = Product::with('types')->get();
        $types    = Type::get();
        return view('home.index',compact('total','products','types'))->withId('');

    }

    public function show($id)

    {
         $products = $this->productRepository->getById($id);
                 // dd($products);

        return view('home.detail', compact('products'));
    }

     public function category($id)

    {
        // dd('aa');
         

                 // Initialize cart object
        $cart = new Cart([
            // Maximum item can added to cart, 0 = Unlimited
            'cartMaxItem' => 0,

            // Maximum quantity of a item can be added to cart, 0 = Unlimited
            'itemMaxQuantity' => 5,

            // Do not use cookie, cart items will gone after browser closed
            'useCookie' => false,
        ]);
        Session::forget('login');
        $total = $cart->getTotalItem();
        $products = Product::where('type_id',$id)->with('types')->get();
        $types    = Type::get();
        return view('home.category',compact('total','products','types'))->withId('');

    }
    public function search(Request $request){
        // Initialize cart object
        $cart = new Cart([
            // Maximum item can added to cart, 0 = Unlimited
            'cartMaxItem' => 0,

            // Maximum quantity of a item can be added to cart, 0 = Unlimited
            'itemMaxQuantity' => 5,

            // Do not use cookie, cart items will gone after browser closed
            'useCookie' => false,
        ]);
        Session::forget('login');
        $total = $cart->getTotalItem();
        $types    = Type::get();
        $search = $request->product;
        $products = Product::with('types')->where('name','LIKE', '%'.$search.'%')->get();
        return view('home.search',compact('total','products','types'))->withId('');
    }
    public function useredit(Request $request)
    {
        // Initialize cart object
        $cart = new Cart([
            // Maximum item can added to cart, 0 = Unlimited
            'cartMaxItem' => 0,

            // Maximum quantity of a item can be added to cart, 0 = Unlimited
            'itemMaxQuantity' => 5,

            // Do not use cookie, cart items will gone after browser closed
            'useCookie' => false,
        ]);
        Session::forget('login');
        $total = $cart->getTotalItem();
        $user = User::where('id', $request->id)->first();
//        dd($user);
        return view('home.user_edit')->with(['total' => $total, 'user' => $user]);
    }
    public function userupdate(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;

        $user->save();

        return redirect('/')->with(['update' => 'Update Successfully']);
    }
}
