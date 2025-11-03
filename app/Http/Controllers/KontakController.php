<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Kontak::query();

            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($item){
                $button = '';

                $button .='
                    <div class="d-flex align-item-center">
                    <a href="'.route('kontak.edit', $item->id).'" class="btn btn-sm btn-warning my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i>  Edit</a>
                    <form action="'.route('kontak.destroy', $item->id).'" class="d-inline" method="POST">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <button type="submit" class="btn btn-sm btn-danger my-2 mx-2"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                ';
                return $button;
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.kontak.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['alamat'] = $request->alamat;
        $data['hp'] = $request->hp;
        $data['email'] = $request->email;

        Kontak::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('kontak.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(kontak $kontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kontak $kontak)
    {
        return view('pages.kontak.edit', compact('kontak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kontak $kontak)
    {
        $kontak = Kontak::FindOrFail($kontak->id);
        $kontak->update($request->all());

        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('kontak.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kontak $kontak)
    {
        $kontak->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('kontak.index'));
    }
}
