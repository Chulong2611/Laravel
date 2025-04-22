<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10); // mỗi trang 10 dòng
        return view('admin.user.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.user-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required|unique:users',
            'fullname' => 'required',
            'birth_year' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'phone' => 'nullable|string|max:20',
        ]);
    
        User::create($request->only(['username', 'fullname', 'birth_year', 'phone']));
    
        return redirect()->route('admin.users')->with('success', 'Add success!');
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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.user-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'fullname' => 'required',
            'birth_year' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'phone' => 'nullable|string|max:20',
        ]);
    
        $user = User::findOrFail($id);
        $user->update($request->only(['username', 'fullname', 'birth_year', 'phone']));
    
        return redirect()->route('admin.users')->with('success', 'Update success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('admin.users')->with('success', 'Deleted!');
}
}
