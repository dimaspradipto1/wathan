<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = User::query();

            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($item){
                $button = '';

                $button .= '
                  <div class="d-flex align-item-center">
                   <a href="'.route('user.updatePassword', $item->id).'" class="btn btn-sm btn-primary my-2 mx-2"><i class="fa-solid fa-key"></i> </a>
                    <a href="'.route('user.edit', $item->id).'" class="btn btn-sm btn-warning text-white my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="'.route('user.destroy', $item->id).'" class="d-inline" method="POST">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <button type="submit" class="btn btn-sm btn-danger my-2 mx-2">
                    <i class="fa-solid fa-trash"></i>
                    </button>
                    </form>
                </div>
                ';
                return $button;
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
     //   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = User::FindOrFail($user->id);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['is_admin'] = $request->has('is_admin') ? 1 : 0;
        $data['is_guru'] = $request->has('is_guru') ? 1 : 0;
        
        $user->update($data);
        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('user.index'));
    }

    public function showUpdatePasswordForm($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.updatePassword', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $users = User::FindOrFail($id);
        $users->password = Hash::make($request->password);
        $users->save();
        Alert::success('success', 'password berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('user.index'));
    }
}
