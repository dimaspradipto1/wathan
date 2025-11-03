<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Video::query();

            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($item){
                $button ='';

                $button .='
                    <div class="d-flex align-item-center">
                    <a href="'.route('video.edit', $item->id).'" class="btn btn-sm btn-warning text-white my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <form action="'.route('video.destroy', $item->id).'" class="d-inline" method="POST">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <button type="submit" class="btn btn-sm btn-danger my-2 mx-2">
                    <i class="fa-solid fa-trash"></i> Delete
                    </button>
                    </form>
                    </div>
                ';
                return $button;
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.video.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['judul'] = $request->judul;
        $data['link'] = $request->link;
        $data['deskripsi'] = $request->deskripsi;

        Video::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('video.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('pages.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $vide = Video::FindOrFail($video->id);
        $video->update($request->all());

        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('video.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('video.index'));
    }
}
