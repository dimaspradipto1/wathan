<?php

namespace App\Http\Controllers;

use App\Models\Fasilita;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class FasilitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Fasilita::query();
            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($item){
                $button = '';

                $button.= '
                    <div class="d-flex align-item-center">
                        <a href="'.route('fasilitas.edit', $item->id).'" class="btn btn-sm btn-warning text-white mx-2 my-2"><i class="fa-solid fa-pen-to-square"></i>  Edit</a>
                        <form action="'.route('fasilitas.destroy', $item->id).'" method="POST" class="d-inline">
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
        return view('pages.fasilitas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['judul'] = $request->judul;
        $data['subjudul'] = $request->subjudul;
        $data['deskripsi1'] = $request->deskripsi1;
        $data['deskripsi2'] = $request->deskripsi2;
        $data['deskripsi3'] = $request->deskripsi3;

        Fasilita::create($data);
        Alert::success('success', 'data berhasil ditambah')->autoclose(2000)->toToast();
        return redirect(route('fasilitas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Fasilita $fasilita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fasilita $fasilita)
    {
        return view('pages.fasilitas.edit', compact('fasilita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fasilita $fasilita)
    {
        $fasilta = Fasilita::FindOrFail($fasilita->id);

        $fasilita->update($request->all());
        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('fasilitas.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fasilita $fasilita)
    {
        $fasilita->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose(20000)->toToast();
        return redirect(route('fasilitas.index'));
    }
}
