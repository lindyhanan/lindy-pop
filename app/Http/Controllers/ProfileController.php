<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'profile_picture' => 'nullable|image|max:2048'
    ]);

    if ($request->hasFile('profile_picture')) {
        $validated['profile_picture'] = $request->file('profile_picture')
            ->store('users', 'public');
    }

    User::create($validated);

    return redirect()->route('user.index')->with('success', 'User berhasil disimpan!');
}


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'profile_picture' => 'nullable|image|max:2048'
    ]);

    if ($request->hasFile('profile_picture')) {

        // hapus foto lama jika ada
        if ($user->profile_picture && file_exists(storage_path('app/public/' . $user->profile_picture))) {
            unlink(storage_path('app/public/' . $user->profile_picture));
        }

        $validated['profile_picture'] = $request->file('profile_picture')
            ->store('users', 'public');
    }

    $user->update($validated);

    return redirect()->route('user.index')->with('success', 'User berhasil diupdate!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $user = Auth::user();

        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
            $user->profile_picture = null;
            $user->save();
        }

        return redirect()->route('profile.edit')->with('success', 'Profile picture deleted successfully!');
    }
}
