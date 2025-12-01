<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['dataUser'] = User::paginate(10)->withQueryString();
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['name']                  = $request->name;
        $data['email']                 = $request->email;
        $data['role']     = $request->role;
        $data['password']              = Hash::make($request->password);
        $data['password_confirmation'] = $request->password_confirmation;

        User::create($data);

        return redirect()->route('user.create')->with('success', 'Penambahan Data Berhasil!');
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
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    $user->name  = $request->name;
    $user->email = $request->email;

    if ($request->hasFile('profile_picture')) {
        $path = $request->file('profile_picture')->store('profile', 'public');
        $user->profile_picture = $path;
    }

    $user->save();

    return redirect()->route('user.index')->with('success', 'User updated!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
