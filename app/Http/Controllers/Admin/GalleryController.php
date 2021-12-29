<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Models\Gallery;
use App\Models\TravelPackage;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Str;

use function PHPUnit\Framework\returnSelf;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::with('travel_package')->get();
        return view('pages.galleries.index', compact(['galleries']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travel_packages = TravelPackage::all();
        return view('pages.galleries.create', compact(['travel_packages']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {

        $file = $request->file('image');
        $name = Str::random(32);
        $extention = $file->getClientOriginalExtension();
        $fileName = time() . '-' . $name  . '.' . $extention;
        $path = public_path('assets/galleries');
        $file->move($path, $fileName);
        Gallery::create([
            'travel_package_id' => $request->travel_package_id,
            'image' => $fileName
        ]);
        return redirect()->route('galleries.index')->with('status', 'Galleries created!');
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
    public function edit(Gallery $gallery)
    {
        $gallery = Gallery::findOrFail($gallery->id);
        $travel_package = $gallery->travel_package;
        return view('pages.galleries.edit', compact(['travel_package', 'gallery']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        $file = $request->file('image');
        $name = Str::random(32);
        $extention = $file->getClientOriginalExtension();
        $fileName = time() . '-' . $name  . '.' . $extention;
        $path = public_path('assets/galleries');
        if (!$gallery->image && file_exists($path . '/' . $gallery->image)) {
            $file->move($path, $fileName);
        } else {
            $file->move($path, $fileName);
            unlink($path . '/' . $gallery->image);
        }

        $gallery->update(['image' => $fileName]);
        return redirect()->route('galleries.index')->with('status', 'Galleries updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $path = public_path('assets/galleries');
        if ($gallery->image) {
            unlink($path . '/' . $gallery->image);
        }
        $gallery->delete();
        return redirect()->route('galleries.index')->with('status', 'Galleries deleted!');
    }
}
