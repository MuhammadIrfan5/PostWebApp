<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.addproduct');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Productname' => '',
            'slug' => '',
            'shippingcost' => '',
            'price' => '',
            'details' => '',
            'description' => 'required|max:500',
            'image_path' => 'required',
            'image_path.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);

           $product =new Products();
           if($request->hasFile('image_path'))
           {
                foreach($request->file('image_path') as $file)
                {
                    $filename=$product->image_path.uniqid().'.'.$file->extension();
                        $file->move(public_path().'/BooksImages/',$filename);
                    $data[] = $filename;
                }
            }
                $product->name = $request->productname;
                $product->slug= $request->slug;
                $product->details= $request->details;
                $product->price= $request->price;
                $product->shipping_cost= $request->shipping_cost;
                $product->description= $request->description;
                $product->image_path = json_encode($data);
                $product->save();
            return back()->with('status','Successfully Uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
