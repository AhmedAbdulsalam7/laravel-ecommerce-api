<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProductController extends Controller
{

    // This function its retrieve all products depend on type of the user
    public function index(){

    // Get The Loged in user...
    $loggedInUser = Auth::user();


    // Retrieve the type of user from database...
    $userType = $loggedInUser->type;
    


    // Fetch all products
    $products = Product::all();

    // Modify product pricing based on user type
    $products = $this->editProductPricing($products, $userType);

    return response()->json([
        "success" => true,
        "message" => "Product List for $userType user",
        "data" => $products,
    ]);
}

protected function editProductPricing($products, $userType)
{
    foreach ($products as $product) {
        // Calculate pricing based on user type
        $product->price = $this->calculatePrice($product->price, $userType);
    }

    return $products;
}

protected function calculatePrice($originalPrice, $userType)
{
    
    switch ($userType) {
        case 'gold':
            return $originalPrice * 0.9; // 10% discount for gold users
        case 'silver':
            return $originalPrice * 1.1; // 10% markup for silver users
        default:
            return $originalPrice; // No change for normal users
    }
}


    // This function for create product in the database...

    public function store(Request $request){

        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Failed...",
                "data" => $validator->errors(),
            ]);
        }
        $product = Product::create($input);
        return response()->json([
            "success" => true,
            "message" => "Product Created Successfully...",
            "data" => $product,
        ]);
    }



    // This function for update product from the database depend on id of product...

    public function update(Request $request, Product $product){

        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Failed...",
                "data" => $validator->errors(),
            ]);
        }

        $product->name = $input['name'];
        $product->description = $input['description'];
        $product->image = $input['image'];
        $product->price = $input['price'];
        $product->slug = $input['slug'];
        $product->is_active = $input['is_active'];
        $product->save();


        return response()->json([
            "success" => true,
            "message" => "Product Updated Successfully...",
            "data" => $product,
        ]);
    }

    // This function for get the specific product from the database depend on id of this product...

    public function show($id){

        $product = Product::find($id);

        if(is_null($product)) {
            return response()->json([
                "success" => false,
                "message" => "Not Found...",
            ]);
        }
        return response()->json([
            "success" => true,
            "data" => $product,
        ]); 
    }


    // This function for delete product from the database depend on id of product...

    public function destroy(Product $product){

        $product->delete();


        return response()->json([
            "success" => true,
            "message" => 'Product Deleted Successfully...',
            "data" => $product,
        ]); 
    }
}
