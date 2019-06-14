<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Repositories\TypeRepository;
use Laracasts\Flash\Flash;
use App\Repositories\ProductRepository;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $productRepository;
    private $typeRepository;


    public function __construct(TypeRepository $typeRepo,ProductRepository $productRepo)
    {
        $this->typeRepository = $typeRepo;
        $this->productRepository = $productRepo;
    } 

    public function index()
    {
        $products = Product::with('types')->paginate(10);
        return view('products.index',compact('products'))->withId('');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    $types  =Type::pluck('name', 'id');
    return view('products.create',compact('types'));       
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'description' => 'required',
            'type' => 'required',
            'price' => 'required',
             'image' => 'required',
              'quantity' => 'required'
        ]);
        $image = $request->file('image');
        $destinationPath = 'uploads';
        $img_path=$image->move($destinationPath,$image->getClientOriginalName());

        $data = [
            'name'       => $request->get('name'),
            'code'       => $request->get('code'),
            'description'=> $request->get('description'),
            'type_id'    => $request->get('type'),
            'price'      => $request->get('price'),
            'image'      => $img_path,
            'quantity'  => $request->get('quantity')

        ];
        $this->productRepository->create( $data );
        return redirect()->route('products.index')->with(['flash_success' => 'Successfully created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $products = $this->productRepository->getById($id);

        return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = $this->productRepository->getById($id);
        $types  =Type::pluck('name', 'id');
        return view('products.edit',compact('types', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateProductRequest $request)
    {

        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }
        $image = $request->file('image');
        $destinationPath = 'uploads';
        $img_path=$image->move($destinationPath,$image->getClientOriginalName());

        $data = [
            'name'       => $request->get('name'),
            'code'       => $request->get('code'),
            'description'=> $request->get('description'),
            'type_id'    => $request->get('type'),
            'price'      => $request->get('price'),
            'image'      => $img_path,
            'quantity'  => $request->get('quantity')

        ];

        $category = $this->productRepository->update($data, $id);

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = $this->productRepository->find($id);


        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }

    public function search(Request $request)
        {          
   
            $input = $request->all();
                
            $products = Product::where('name', 'LIKE', '%' . $input['search'] . '%')->paginate(10);
             return view('products.index',compact('products'))->withId('');             


            }
}
