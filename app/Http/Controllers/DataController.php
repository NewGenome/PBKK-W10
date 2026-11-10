<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $data = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString();

        return view('data.index', compact('data'));
    }

    public function destroy($id)
    {
        if (!auth()->user()->hasRole('Admin')) {
            abort(403, 'Unauthorized action.');
        }
        
        User::findOrFail($id)->delete();
        
        return redirect()->back()->with('success', 'Data deleted');
    }
}