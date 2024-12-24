<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dream;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Requests\Dream\DreamRequest;
class DreamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Dream::orderByDesc('created_at')->get();

        return view("admin.dream.show", [
            "dreams" => $items,
        ]);
    }

    public function lastdreams()
    {
        $items = Dream::where('status',1)->orderByDesc('created_at')->limit(6)->get();
        return $items;
        
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
        //
    }
    public function storedream(Dream $post )
    {
            $tmpslug = Str::slug($post->title);     
        $promodel=Dream::where('slug', $tmpslug )->first();
        if (!is_null($promodel)) {
          //error
          $tmpslug =  $tmpslug . Str::random(5);                
          }      
          $post->slug =$tmpslug; 
   
          $post->save();   
        
          return  $post->id;  
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $item = Dream::find($id);
       
        return view("admin.dream.edit", ["dream" => $item ]);
    }
    public function dreambyslug(string $slug)
    {
       
        $item = Dream::where('slug',$slug)->first();       
        return view("site.dream.show", ["dream" => $item ]);
    }
    
    public function agreedreams()
    {
        $items = Dream::where('status',1)->orderByDesc('created_at')->get();
        return view("site.dream.all", ["dreams" => $items ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DreamRequest $request,$id)
    {
        $formdata = $request->all();
        $validator = Validator::make(
          $formdata,
          $request->rules(),
          $request->messages()
        );
        if ($validator->fails()) {
    
          return response()->json($validator);
    
        } else {
          
          //reset all to 0
          Dream::find($id)->update([      
            'status' => $formdata["status"] ,
    
          ]);
      
          return response()->json("ok");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Dream::find($id);
        if (!( $item  === null)) {
          
          Dream::find($id)->delete();
        }
        return redirect()->back();
    }
}