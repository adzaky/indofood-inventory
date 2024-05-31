<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index(): View
    {
        $users = User::latest()->paginate(10);

        return view('user.index', compact('users'));
    }

    /**
     * create
     * 
     * @return view
     */
    public function create(): View
    {
        return view('user.create');
    }

    /**
     * store
     * 
     * @param mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'name'           => 'required|max:10',
            'email'          => 'required',
            'role'           => 'required|in:user,admin',
            'password'       => 'required|max:255',
        ]);

        User::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'role'           => $request->role,
            'password'       => Hash::make($request->password),
        ]);

        //redirect to index
        return redirect()->route('user.index')->with(['success' => 'Successfully Created User!']);
    }

    /**
     * show
     * 
     * @param mixed $id
     * @return view
     */
    public function show(string $id): View
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * edit
     * 
     * @param mixed $id
     * @return view
     */
    public function edit(string $id): View
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * update
     * 
     * @param mixed $request
     * @param mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'name'           => 'required|max:10',
            'email'          => 'required',
            'role'           => 'required|in:user,admin',
            'password'       => 'nullable|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name'           => $request->name,
            'email'          => $request->email,
            'role'           => $request->role,
            'password'       => Hash::make($request->password),
        ]);

        //redirect to index
        return redirect()->route('user.index')->with(['success' => 'Sucessfully Updated User!']);
    }

    /**
     * destroy
     * 
     * @param mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $users = User::findOrFail($id);
        $users->delete();

        //redirect to index
        return redirect()->route('user.index')->with(['success' => 'Successfully Deleted User!']);
    }
}
