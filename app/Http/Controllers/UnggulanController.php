<?php

namespace App\Http\Controllers;

use App\Models\unggulan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class UnggulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Unggulan::query();

            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($item){
                $button = '';

                $button .='
                    <div class="d-flex align-item-center">
                    <a href="'.route('unggulan.edit', $item->id).'" class="btn btn-sm btn-warning my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i>  Edit</a>
                    <form action="'.route('unggulan.destroy', $item->id).'" class="d-inline" method="POST">
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
        return view('pages.unggulan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.unggulan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['deskripsi'] = $request->deskripsi;

        Unggulan::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('unggulan.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(unggulan $unggulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(unggulan $unggulan)
    {
        return view('pages.unggulan.edit', compact('unggulan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, unggulan $unggulan)
    {
        $unggaulan = Unggulan::FindOrFail($unggulan->id);
        $unggulan->update($request->all());

        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('unggulan.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(unggulan $unggulan)
    {
        $unggulan->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('unggulan.index'));
    }
}
