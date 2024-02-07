<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class AdminLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::all();
        return view("admin.links", ["links"=>$links]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.add_link");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "url" => "required|url",
            "point"=>"nullable|integer",
            "status"=>"required|boolean"
        ]);

        $link = new Link();

        $link->value = $request->input("url");
        // $link->value = $request->input("url");
        $link->active = $request->input("status");
        if($link->save()){
            return back()->with(['success'=>"New Link Added"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view("admin.add_link", ["link"=>$link]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        $request->validate([
            "url" => "required|url",
            "point"=>"nullable|integer",
            "status"=>"required|boolean"
        ]);

        $link->value = $request->input("url");
        $link->active = $request->input("status");

        if($link->save()){
            session()->forget('link');
            session()->flush();
            return redirect()->intended(route("links.index"))->with(["success"=>"Link updated successfully"]);
        }else{
            return back()->with(["error"=>"Link failed"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        if($link->delete()){
            return back()->with(["success"=>"Link deleted successfully"]);
        }else{
            return back()->with(["error"=>"Link deletion failed"]);
        }
    }
}
