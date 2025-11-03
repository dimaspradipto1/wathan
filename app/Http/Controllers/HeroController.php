<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Hero::query();

            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('image', function($item){
                return '
                    <img src="'.Storage::url($item->image).'" style="width:100px">
                ';
            })
            ->addColumn('action', function($item){
                $button = '';

                $button .='
                    <div class="d-flex align-item-center">
                    <a href="'.route('hero.edit', $item->id).'" class="btn btn-sm btn-warning my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i>  Edit</a>
                    <form action="'.route('hero.destroy', $item->id).'" class="d-inline" method="POST">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <button type="submit" class="btn btn-sm btn-danger my-2 mx-2"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                ';
                return $button;
            })
            ->rawColumns(['action', 'image'])
            ->make();
        }
        return view('pages.hero.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['judul']= $request->judul;
        $data['deskripsi']=$request->deskripsi;
        $file=$request->file('image');
        $data['image']= $file->storeAs('public/hero', $file->getClientOriginalName());

        Hero::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('hero.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        return view('pages.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        $hero = Hero::FindOrFail($hero->id);
        $file = $request->file('image');
        Storage::delete($hero->image);
        $data['image'] = $file->storeAs('public/hero', $file->getClientOriginalName());

        $hero->update($data);

        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('hero.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {
        $filePath = $hero->image;
        Storage::delete($filePath);
        $hero->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('hero.index'));
    }
}
