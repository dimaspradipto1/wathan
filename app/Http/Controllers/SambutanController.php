<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Contracts\DataTable;

class SambutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Sambutan::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('image', function ($item) {
                    if ($item->image) {
                        return '<img src="' . asset('storage/' . str_replace('public/', '', $item->image)) . '" style="width:100px">';
                    }
                    return '-';
                })
                ->addColumn('action', function ($item) {
                    $button = '';

                    $button .= '
                    <div class="d-flex align-item-center">
                        <a href="' . route('sambutan.edit', $item->id) . '" class="btn btn-sm btn-warning text-white mx-2 my-2"><i class="fa-solid fa-pen-to-square"></i>  Edit</a>
                        <form action="' . route('sambutan.destroy', $item->id) . '" method="POST" class="d-inline">
                        ' . csrf_field() . '
                        ' . method_field('delete') . '
                        <button type="submit" class="btn btn-sm btn-danger my-2 mx-2">
                         <i class="fa-solid fa-trash"></i> Delete
                        </button>
                        </form>
                    </div>
                ';
                    return $button;
                })
                ->rawColumns(['action', 'image'])
                ->make();
        }
        return view('pages.sambutan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sambutan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data['deskripsi1'] = $request->deskripsi1;
        $data['deskripsi2'] = $request->deskripsi2;
        $data['deskripsi3'] = $request->deskripsi3;
        $data['deskripsi4'] = $request->deskripsi4;
        $data['deskripsi5'] = $request->deskripsi5;
        $data['deskripsi6'] = $request->deskripsi6;
        $data['deskripsi7'] = $request->deskripsi7;
        $data['deskripsi8'] = $request->deskripsi8;
        $data['deskripsi9'] = $request->deskripsi9;
        $data['deskripsi10'] = $request->deskripsi10;
        $data['nama_pemilik'] = $request->nama_pemilik;
        $data['jabatan'] = $request->jabatan;
        $file = $request->file('image');
        if ($file) {
            $data['image'] = $file->storeAs('sambutan', $file->getClientOriginalName(), 'public');
        } else {
            $data['image'] = null;
        }

        Sambutan::create($data);
        Alert::success('success', 'data berhasil ditambah')->autoclose(2000)->toToast();
        return redirect(route('sambutan.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Sambutan $sambutan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sambutan $sambutan)
    {
        return view('pages.sambutan.edit', compact('sambutan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sambutan $sambutan)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($sambutan->image) {
                Storage::disk('public')->delete(str_replace('public/', '', $sambutan->image));
            }
            $file = $request->file('image');
            $data['image'] = $file->storeAs('sambutan', $file->getClientOriginalName(), 'public');
        } else {
            // Keep existing image
            unset($data['image']);
        }

        $sambutan->update($data);

        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('sambutan.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sambutan $sambutan)
    {
        if ($sambutan->image) {
            Storage::disk('public')->delete(str_replace('public/', '', $sambutan->image));
        }
        $sambutan->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('sambutan.index'));
    }
}
