<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
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
            
    ]);


      if($validator->fails()){
        $data = [

            'status' => 400,
            'message' => $validator->errors()

          ];

        return response()->json($data,400
        );




      }

     $category = new category();
     $category-> name = $request->name;
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            
    ]);


      if($validator->fails()){
        $data = [

            'status' => 400,
            'message' => $validator->errors()

          ];

        return response()->json($data,400
        );




      }

     $category = Product::find($id);
     $category-> name = $request->name;
     $product-> save();

     $data = [

        'status' => 400,
        'message' => 'Category Created Successfully'

      ];

    return response()->json($data,400
    );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);

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
