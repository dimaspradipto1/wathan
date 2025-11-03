<?php

namespace App\Http\Controllers;

use App\Models\DoaHarian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class DoaHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = DoaHarian::query();
            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($item){
                $button = '';
                $button .= '
                    <div class="d-flex align-align-items-center">
                        <a href="'.route('doa-harian.edit', $item->id).'" class="btn btn-sm btn-warning text-white my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i> edit</a>
                        <form action="'.route('doa-harian.destroy', $item->id).'" class="d-inline" method="POST">
                            '.csrf_field().'
                            '.method_field('delete').'
                            <button type="submit" class="btn btn-sm btn-danger my-2 mx-2"><i class="fa-solid fa-trash"></i> delete</button>
                        </form>
                    </div>
                ';
                return $button;
            })
            ->make();
        }

        return view('pages.doaHarian.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.doaHarian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['doa_harian'] = $request->doa_harian;
        DoaHarian::create($data);
        Alert::success('success', 'Data created successfully')->toToast()->autoclose(2000);
        return redirect(route('doa-harian.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(DoaHarian $doaHarian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoaHarian $doaHarian)
    {
        return view('pages.doaHarian.edit', compact('doaHarian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DoaHarian $doaHarian)
    {
        $doaHarian = DoaHarian::findOrFail($doaHarian->id);
        $doaHarian->update($request->all());
        Alert::success('success', 'Data Updated Successfully')->toToast()->autoclose(2000);
        return redirect(route('doa-harian.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoaHarian $doaHarian)
    {
        $doaHarian->delete();
        Alert::success('success', 'Data Deleted Successfully')->toToast()->autoclose();
        return redirect(route('doa-harian.index'));
    }
}
