<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
          $data = [

            'status' => 200,
            'products' => $product

          ];

        return response()->json($data,200
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'name' => 'required',
                'price' => 'required|numeric'
        ]);


          if($validator->fails()){
            $data = [

                'status' => 400,
                'message' => $validator->errors()
    
              ];
    
            return response()->json($data,400
            );




          }

         $product = new Product();
         $product-> name = $request->name;
         $product-> description = $request->description;
         $product-> price = $request->price;
         $product-> save();
  
         $data = [

            'status' => 400,
            'message' => 'Product Created Successfully'

          ];

        return response()->json($data,400
        );





    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'price' => 'required|numeric'
    ]);


      if($validator->fails()){
        $data = [

            'status' => 400,
            'message' => $validator->errors()

          ];

        return response()->json($data,400
        );




      }

     $product = Product::find($id);
     $product-> name = $request->name;
     $product-> description = $request->description;
     $product-> price = $request->price;
     $product-> save();

     $data = [

        'status' => 200,
        'message' => 'Product Updated Successfully'

      ];

    return response()->json($data,200
    );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $product = Product::find($id);

     if(!$product){

        $data = [

            'status' => 400,
            'message' => 'Product not Found'
    
          ];
    
        return response()->json($data,400
        );


     }

     $product->delete();
     $data = [

        'status' => 400,
        'message' => 'Product deleted Successfully'

      ];

    return response()->json($data,400
    );


    }
}
