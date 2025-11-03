<?php

namespace App\Http\Controllers;

use App\Models\Legalita;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class LegalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Legalita::query();

            return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('action', function($item){
                $button = '';

                $button .='
                    <div class="d-flex align-item-center">
                        <a href="'.route('legalitas.show', $item->id).'" class="btn btn-sm btn-primary my-2 mx-2"><i class="fa-solid fa-eye"></i> preview</a>
                        <a href="'.route('legalitas.edit', $item->id).'" class="btn btn-sm btn-warning my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form action="'.route('legalitas.destroy', $item->id).'" class="d-inline" method="POST">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <button type="submit" class="btn btn-sm btn-danger my-2 mx-2"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                    </div>
                ';
                return $button;
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.legalitas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.legalitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['perusahaan'] = $request->perusahaan;
        $data['pimpinan'] = $request->pimpinan;
        $data['notaris'] = $request->notaris;
        $data['akta_notaris'] = $request->akta_notaris;
        $data['ahu_nomor'] = $request->ahu_nomor;
        $data['skep_ppjk'] = $request->skep_ppjk;
        $data['alamat'] =$request->alamat;
        $data['kontak'] = $request->kontak;
        $data['email'] = $request->email;

        Legalita::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('legalitas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Legalita $legalita)
    {
        return view('pages.legalitas.show', compact('legalita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Legalita $legalita)
    {
        return view('pages.legalitas.edit', compact('legalita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Legalita $legalita)
    {
        $legalita = Legalita::FindOrFail($legalita->id);
        $legalita->update($request->all());

        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('legalitas.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Legalita $legalita)
    {
        $legalita->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('legalitas.index'));
    }
}
