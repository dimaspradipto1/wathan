<?php

namespace App\Http\Controllers;

use App\Models\Visimisi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class VisimisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Visimisi::query();
            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($item){
                $button = '';
                
                $button.= '
                    <div class="d-flex align-item-center">
                        <a href="'. route('visimisi.edit', $item->id).'" class="btn btn-sm btn-warning text-white my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form action="'.route('visimisi.destroy', $item->id).'" method="POST" class="d-inline">
                        '.csrf_field().'
                        '.method_field('delete').'
                        <button type="submit" class="btn btn-sm btn-danger my-2 mx-2" > <i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </div>
                ';
                return $button;
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.visiMisi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.visiMisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $data['visi'] = $request->visi;
        $data['misi1'] = $request->misi1;
        $data['misi2'] = $request->misi2;
        $data['misi3'] = $request->misi3;
        $data['misi4'] = $request->misi4;
        $data['misi5'] = $request->misi5;

        Visimisi::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('visimisi.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Visimisi $visimisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visimisi $visimisi)
    {
        return view('pages.visiMisi.edit', compact('visimisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visimisi $visimisi)
    {
        $visimisi = Visimisi::FindOrFail($visimisi->id);
        $visimisi->update($request->all());

        Alert::success('success', 'data berhasil diupdate')->autoclose(2000)->toToast();
        return Redirect(route('visimisi.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visimisi $visimisi)
    {
        $visimisi->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('visimisi.index'));
    }
}
