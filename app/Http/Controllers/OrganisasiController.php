<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Organisasi::query();

            return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('image', function($item){
                return '
                    <img src="'.Storage::url($item->image).'" alt="image" width="100px">
                ';
            })
            ->addColumn('action', function($item){
                $button = '';

               $button .='
                <div class="d-flex align-item-center">
                    <a href="'.route('organisasi.edit', $item->id).'" class="btn btn-sm btn-warning my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i>  Edit</a>
                    <form action="'.route('organisasi.destroy', $item->id).'" method="POST" class="d-inline">
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
        return view('pages.Organisasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Organisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $data['image'] = $file->storeAs('public/organisasi', $file->getClientOriginalName());

        Organisasi::create($data);

        Alert::Success('success', 'data berhasil ditambah')->autoclose(2000)->toToast();
        return redirect(route('organisasi.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisasi $organisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisasi $organisasi)
    {
        return view('pages.Organisasi.edit', compact('organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisasi $organisasi)
    {
        $organisasi = Organisasi::FindOrFail($organisasi->id);
        $file = $request->file('image');
        Storage::delete($organisasi->image);
        $data ['image'] = $file->storeAs('public/organisasi', $file->getClientOriginalName());

        $organisasi->update($data);

        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('organisasi.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisasi $organisasi)
    {
        $filePath = $organisasi->image;
        Storage::delete($filePath);
        $organisasi->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('organisasi.index'));
    }
}
