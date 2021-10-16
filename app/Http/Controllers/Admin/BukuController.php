<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Buku;
use App\Penulis;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    public function __construct()
    {
        // for permission
        $this->middleware(['permission:all|show buku'])->only('index', 'show');
        $this->middleware(['permission:all|create buku'])->only('create', 'store');
        $this->middleware(['permission:all|edit buku'])->only('edit', 'update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penulis = Penulis::all();
        return view('admin.buku.create', compact('penulis'));
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
            'penulis_id' => 'required',
            'image' => 'mimes:jpg,png,jpeg',
            'judul_buku' => 'required|string|max:255'
        ]);

        $requestData = $request->all();
        if(!is_null($request->image))
        {
            // Image
            $images = $request->image;
            $image = 'sampul_buku_'.date('dmY').'_'.rand(1000,9999).'.'.$images->getClientOriginalExtension();
            $path = 'upload/' . $image;
            Image::make($images->getRealPath())
            // ->resize(150, 80)
            ->save($path);
            $requestData['image'] = $image;
        }

        Buku::create($requestData);

        $notification = array(
            'message' => 'Success add Data',
            'alert' => 'success'
        );
        return redirect(route('buku.index'))->with($notification);
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
        $penulis = Penulis::all();
        $buku = Buku::findOrFail($id);
        return view('admin.buku.edit', compact('buku', 'penulis'));
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
            'image' => 'mimes:jpg,png,jpeg',
            'format_css' => 'max:255',
            'link' => 'required|string|max:255'
        ]);

        $buku = Buku::findOrFail($id);
        $updatetData = $request->all();
        // Image
        if(!is_null($request->image))
        {
            // delete file before change
            $image_path = app_path("../upload/{$buku->image}");
            if (File::exists($image_path))
            {
                unlink($image_path);
            }
            $images = $request->image;
            $image = 'judul_buku_'.date('dmY').'_'.rand(1000,9999).'.'.$images->getClientOriginalExtension();
            $path = 'upload/' . $image;
            Image::make($images->getRealPath())
            // ->resize(150,
            ->save($path);
            $updatetData['image'] = $image;
        }
        $buku->update($updatetData);

        $notification = array(
            'message' => 'Success Update Data',
            'alert' => 'success'
        );
        return redirect(route('buku.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        $notification = array(
            'message' => 'Delete Data Success',
            'alert' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
