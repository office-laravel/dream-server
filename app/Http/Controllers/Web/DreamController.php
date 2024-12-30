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
        $items = Dream::where('status', 1)->orderByDesc('created_at')->limit(6)->get();
        return $items;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view("admin.dream.add");
    }
    public function store(DreamRequest $request)
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
            $newObj = new Dream();
            $newObj->title = $formdata['title'];
            $newObj->content = $formdata['content'];
            $newObj->question = isset($formdata["question"]) ? $formdata['question'] : "";
            $newObj->status = $formdata["status"];
            $newObj->save();
            return response()->json("ok");
        }
    }
    /**
     * Store a newly created resource in storage.
     */

    public function storedream(Dream $post)
    {
        $tmpslug = Str::slug($post->title);
        $promodel = Dream::where('slug', $tmpslug)->first();
        if (!is_null($promodel)) {
            //error
            $tmpslug = $tmpslug . Str::random(5);
        }
        $post->slug = $tmpslug;

        $post->save();

        return $post->id;
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

        return view("admin.dream.edit", ["dream" => $item]);
    }
    public function dreambyslug(string $slug)
    {

        $item = Dream::find($slug);
        if ($item) {
            return view("site.dream.show", ["dream" => $item]);
        } else {
            abort(404, '');
        }

    }

    public function agreedreams()
    {
        $items = Dream::where('status', 1)->orderByDesc('created_at')->get();
        return view("site.dream.all", ["dreams" => $items]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DreamRequest $request, $id)
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
            Dream::find($id)->update([
                'status' => $formdata["status"],
                'title' => $formdata["title"],
                'content' => $formdata["content"],
                'question' => isset($formdata["question"]) ? $formdata["question"] : "",
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
        if (!($item === null)) {
            Dream::find($id)->delete();
        }
        return redirect()->back();
    }
}
