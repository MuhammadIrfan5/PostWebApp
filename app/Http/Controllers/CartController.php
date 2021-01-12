<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controller\Auth;
use App\Models\Products;
class CartController extends Controller
{
    public function shop()
    {
        $products = Products::all();
        //dd($products);
        return view('Admin.shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('Admin.cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);
    }
    public function add(Request $request){

        foreach($request->img as $file)
        {
            $data[]=$file;
        }
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'details' => $request->details,
            'description' => $request->description,
            'attributes' => array(
            'image' => json_encode($data),
            'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item is Added to Cart!');
    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }
    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

    public function checkout()
    {
        $cartCollection = \Cart::getContent();
        return view('Admin.checkout')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);
        //return view('Admin.checkout');
    }



}
