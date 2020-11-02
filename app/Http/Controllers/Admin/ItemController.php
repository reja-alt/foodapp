<?php

namespace App\Http\Controllers\Admin;


use App\Item;
use App\Category;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::all();
        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.item.create',compact('categories'));
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
            'category'=>'required',
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required |mimes:jpeg,jpg,png',
        ]);

        $image=$request->file('image');
        $slug= Str::slug($request->name);
        
        

        if(isset($image))
        {
          $currentDate=Carbon::now ()->toDateString();
          $imagename=$slug.'-'.$currentDate.'-'.'.'.
          $image->getClientOriginalExtension();
          if(!file_exists('uploads/item'))
          {
              mkdir('uploads/item',0777,true);
          }
          $image->move('uploads/item',$imagename);
        }else{
            $imagename="default.png";
        }

        $item=new Item();
        $item->category_id=$request->category;
        $item->name=$request->name;
        $item->description=$request->description;
        $item->price=$request->price;
        $item->image=$imagename;
        $item->save();
        return redirect()->route('item.index')->with('successMsg','Slider updated Successfully');
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
        $item=Item::find($id);
        $categories=Category::all();
        return view('admin.item.edit',compact('item','categories'));
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
        $this->validate($request,[
            'category'=>'required',
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required |mimes:jpeg,jpg,png',
        ]);

        $image=$request->file('image');
        $slug= Str::slug($request->name);
        
        

        if(isset($image))
        {
          $currentDate=Carbon::now ()->toDateString();
          $imagename=$slug.'-'.$currentDate.'-'.'.'.
          $image->getClientOriginalExtension();
          if(!file_exists('uploads/item'))
          {
              mkdir('uploads/item',0777,true);
          }
          $image->move('uploads/item',$imagename);
        }else{
            $imagename=$item->image;
        }

        $item=Item::find($id);
        $item->category_id=$request->category;
        $item->name=$request->name;
        $item->description=$request->description;
        $item->price=$request->price;
        $item->image=$imagename;
        $item->save();
        return redirect()->route('item.index')->with('successMsg','Item updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::find($id);
        
           
            unlink('uploads/item/' . $item->image);
        
        $item->delete();
        return redirect()->back()->with('successMsg','Item deleted Successfully');
    }
}
