<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    // Array to store user profiles (simulating database)
    private $profiles = [];

    public function __construct()
    {
        // Example user profiles for demonstration
        $this->profiles = [
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '123-456-7890', 'address' => '123 Main St'],
            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '987-654-3210', 'address' => '456 Elm St'],
        ];
    }

    public function index()
    {
        $profiles = $this->profiles;
        return view('profiles', compact('profiles'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $profile = [
            'id' => count($this->profiles) + 1,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        $this->profiles[] = $profile;

        return redirect()->route('profiles');
    }

    public function edit($id)
    {
        $profile = collect($this->profiles)->where('id', $id)->first();
        return view('profilesedit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        foreach ($this->profiles as &$profile) {
            if ($profile['id'] == $id) {
                $profile['name'] = $request->name;
                $profile['email'] = $request->email;
                $profile['phone'] = $request->phone;
                $profile['address'] = $request->address;
                break;
            }
        }

        return redirect()->route('profiles');
    }

    public function destroy($id)
    {
        $this->profiles = array_values(array_filter($this->profiles, function ($profile) use ($id) {
            return $profile['id'] != $id;
        }));

        return redirect()->route('profiles');
    }
}
