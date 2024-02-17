<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('index', compact('cars'));
        // return view('index');
    }
    public function index2()
    {
        $cars = Car::all();
        return view('profile', compact('cars'));
        // return view('index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('detail', compact('car'));
    }
    public function rental($id)
    {
        $car = Car::findOrFail($id);
        // return Auth::id();
        return view('rental', compact('car'));
    }
    public function editPop(Request $request, $id)
    {
        // الحصول على سجل السيارة من قاعدة البيانات
        $car = Car::findOrFail($id);

        $car->update(
            [
                'days_rental' => $request->days_rental,
                'end_date_rental' => Carbon::now()->addDays($request->days_rental),
                'bill' => $car->price * $request->days_rental,
                'user_id' => auth()->id(),
            ]
        );
        $car->save();
        $user = User::findOrfail(auth()->id());
        return view('profile', compact(['car', 'user']));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
