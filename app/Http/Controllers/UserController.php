<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partner;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.detail', compact('user'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|in:admin,sales,salesperson',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt('password'),
            'role' => $validated['role'],
        ]);

        return redirect()->route('page.users')->with('success', 'Felhasználó létrehozva.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:admin,sales,salesperson',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        $user->role = $validated['role'];
        $user->save();

        return redirect()->route('page.users')->with('success', 'Felhasználó frissítve.');
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $hasInvoices = Partner::where('user_id', $user->id)->exists();
        // dd($hasInvoices);
        try {
            if ($hasInvoices) {
                return redirect()->route('page.users')->with('error', 'A felhasználó nem törölhető, mert kapcsolódó partnerei vannak.');
            }else {
                $user->delete();
            }
            return redirect()->route('page.users')->with('success', 'Felhasználó törölve.');
        } catch (\Exception $e) {
            return redirect()->route('page.users')->with('error', 'Hiba történt a felhasználó törlése során.');
        }

    }
}
