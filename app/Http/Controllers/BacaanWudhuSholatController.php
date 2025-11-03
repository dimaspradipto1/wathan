<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bacaanWudhuSholat;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class BacaanWudhuSholatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = bacaanWudhuSholat::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    $button = '';
                    $button .= '
                    <div class="d-flex align-item-center">
                        <a href="' . route('bacaan-wudhu-sholat.edit', $item->id) . '" class="btn btn-sm btn-warning text-white my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form action="' . route('bacaan-wudhu-sholat.destroy', $item->id) . '" class="d-inline" method="POST">
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
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.bacaanWudhuSholat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.bacaanWudhuSholat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['bacaan'] = $request->bacaan;
        bacaanWudhuSholat::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('bacaan-wudhu-sholat.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(bacaanWudhuSholat $bacaanWudhuSholat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bacaanWudhuSholat $bacaanWudhuSholat)
    {
        return view('pages.bacaanWudhuSholat.edit', compact('bacaanWudhuSholat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bacaanWudhuSholat $bacaanWudhuSholat)
    {
        $bacaanWudhuSholat = bacaanWudhuSholat::FindOrFail($bacaanWudhuSholat->id);
        $bacaanWudhuSholat->update($request->all());
        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('bacaan-wudhu-sholat.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bacaanWudhuSholat $bacaanWudhuSholat)
    {
        $bacaanWudhuSholat->delete();
        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('bacaan-wudhu-sholat.index'));
    }
}
