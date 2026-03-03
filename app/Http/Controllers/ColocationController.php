<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colocations = Colocation::whereHas('user', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
        // dd($colocations);
        return view('colocation.colocation' , compact('colocations'));
    }

    /**
     * Show the form for eating a new resource.
     */
    public function create()
    {
        return view('colocation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->input());
        $validation = $request->validate([
            'title' => 'required|string|max:255',
            'discription' => 'required|string|min:10',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
        $colocation  = Colocation::create($validation);
        $colocation->user()->sync([Auth::id()]);
        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     */
    public function show(Colocation $colocation)
    {
        return view('colocation.show', compact('colocation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colocation $colocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colocation $colocation)
    {
        //
    }
}
