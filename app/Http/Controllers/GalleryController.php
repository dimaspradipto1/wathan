<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Gallery::query();
            return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('image', function($item){
                return '
                    <img src="'.Storage::url($item->image).'" alt="image" width="100px">
                ';
            })
            ->addColumn('action', function($item){
                $button ='';

                $button.= '
                <div class="d-flex align-item-center">
                    <a href="'.route('gallery.edit', $item->id).'" class="btn btn-sm btn-warning my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i>  Edit</a>
                    <form action="'.route('gallery.destroy', $item->id).'" class="d-inline" method="POST">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <button type="submit" class="btn btn-sm btn-danger my-2 mx-2"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </div>
                ';
                return $button;
            })
            ->rawColumns(['action', 'image'])
            ->make();
        }
        return view('pages.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $data['image'] = $file->storeAs('public/gallery', $file->getClientOriginalName());

        Gallery::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('gallery.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(gallery $gallery)
    {
        return view('pages.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, gallery $gallery)
    {
        $gallery = Gallery::FindOrFail($gallery->id);
        $file = $request->file('image');
        Storage::delete($gallery->image);
        $data['image'] = $file->storeAs('public/gallery', $file->getClientOriginalName());

        $gallery->update($data);

        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('gallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(gallery $gallery)
    {
        $filePath = $gallery->image;
        Storage::delete($filePath);
        $gallery->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return Redirect(route('gallery.index'));
    }
}
