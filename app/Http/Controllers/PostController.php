<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controller\Auth;
use App\Models\Posts;
use App\Models\User;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.AddPost');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return "saved";
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
            'description' => 'required|max:500',
            'filenames' => 'required',
            'filenames.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
       if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
               // $filename=sprintf("profileImage_%s",random_int(1, 1000));
                $name = auth()->id().sprintf("PostImage%s_",random_int(1, 1000)).time().'.'.$file->extension();
                $file->move(public_path().'/PostImages/', $name);  
                $data[] = $name;
            }
        }
        $postobj=new Posts();
        $postobj->user_id=auth()->id();
        $postobj->description=$request->description;
        $postobj->filenames=json_encode($data);
        $postobj->save();
        /*Posts::create([
            'user_id' => auth()->id(),
            'description' => $request->description
        ]);*/
        //this is same as Posts::create method but it will automatically fill userid in posts table which we created a relationship in user model that user hasmany posts
        /*$request->User()->Posts()->create([
            'description' => $request->description,
            'filenames' => $myfile
        ]);*/
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $posts= Posts::with(['user','like'])->paginate(1);
        return view('Admin.viewpost',compact('posts'));
    }
    public function myposts()
    {
       $posts= Posts::where('user_id',auth()->id())->paginate(1);
        return view('Admin.viewpost',compact('posts'));
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

    public function destroy(Posts $post,Request $request)
    {
        //Posts::find($id)->delete();
        $post->delete();
        $request->user()->likes()->where('posts_id',$post->id)->delete();
        return redirect()->back();
    }
}
