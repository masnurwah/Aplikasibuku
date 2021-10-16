<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PenulisController extends Controller
{
    public function __construct()
    {
        // for permission
        $this->middleware(['permission:all|show penulis'])->only('index', 'show');
        $this->middleware(['permission:all|create penulis'])->only('create', 'store');
        $this->middleware(['permission:all|edit penulis'])->only('edit', 'update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penulis = Penulis::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.penulis.index', compact('penulis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.penulis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        $requestData            = $request->all();

        Penulis::create($requestData);

        $notification = array(
            'message' => 'Success add Data',
            'alert' => 'success'
        );
        return redirect(route('penulis.index'))->with($notification);
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
        $penulis = Penulis::findOrFail($id);
        return view('admin.penulis.edit', compact('penulis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        $penulis = Penulis::findOrFail($id);
        $updatetData = $request->all();
        $penulis->update($updatetData);

        $notification = array(
            'message' => 'Success Update Data',
            'alert' => 'success'
        );
        return redirect(route('penulis.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SocialMedia = Penulis::findOrFail($id);
        $SocialMedia->delete();
        $notification = array(
            'message' => 'Delete Data Success',
            'alert' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
