<?php

namespace App\Http\Controllers;

use App\Models\Apay;
use App\Models\Colocation;
use App\Models\Depense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request->input('id'));
        // $users = Colocation::with("user")->get();
        $colocations = Colocation::whereHas('user', function ($query) {
        $query->where('user_id', Auth::id());
        })->get();
        // dd($colocations);
        return view('expence.add', compact('colocations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'user_id' => 'required',
            'category_id' => 'required|numeric',  
            'colocation_id' =>'required|numeric'
        ]);
        $depense = Depense::create($validation);
        // get list of user that in colocation
        $users = User::has('colocation', '=', 1)->get();
        $howPay = $request->input('user_id');
        $idOfUsers = [];
        foreach ($users as $user) {
            array_push($idOfUsers, $user->id);
        }
        //calcule price
        $price = $validation['price']/count($idOfUsers);
        $idOfUsers =  array_filter($idOfUsers, function($value) use ($howPay){
            return $value != $howPay;
        }); 

        // dd($depense->id);
        foreach ($idOfUsers as $value) {
            $apay = Apay::create(   [
                'title'=> $validation['title'],
                'price' => $price,
                'depense_id' => $depense->id,
                'user_id' => $value,
                'colocation_id' => $validation['colocation_id']
            ]);
        }
        return redirect()->route('colocations.index');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Depense $depense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depense $depense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depense $depense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depense $depense)
    {
        //
    }
}
