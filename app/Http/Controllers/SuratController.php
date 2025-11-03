<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Contracts\DataTable;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Surat::query();
            
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    $button = '';
                    // Menambahkan tombol action untuk edit dan delete
                    $button .= '
                        <a href="'. route('surat.edit', $item->id).'" class="btn btn-sm btn-warning text-white my-2 mx-3"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form action="'. route('surat.destroy', $item->id) .'" class="d-inline" method="POST">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit" class="btn btn-sm btn-danger my-2 mx-2">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </form>
                    ';
                    return $button; 
                })
                ->rawColumns(['action'])  
                ->make(true);
        }
    
        return view('pages.surat.index'); 
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =[
            'nama_surah' => $request->nama_surah,
            'jumlah_ayat' =>$request->jumlah_ayat,
        ];

        Surat::create($data);

        Alert::success('success', 'data created successfully')->autoclose(2000)->toToast();
        return redirect(route('surat.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        return view('pages.surat.edit', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        $surat->update($request->all());

        Alert::success('success', 'data updated successfully')->autoclose(2000)->toToast();
        return redirect(route('surat.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        $surat->delete();

        Alert::success('success', 'data deleted successfully')->autoclose(2000)->toToast();
        return redirect(route('surat.index'));
    }
}
