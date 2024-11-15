<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\FoodItem;
use App\Models\Setting;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::first(); 
        $foodItems = FoodItem::all();
        return view('manager.fooditems', compact('foodItems', 'settings'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manager.fooditems-new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the input fields
    $validatedData = $request->validate([
        'name' => 'required|string|max:255|unique:food_items,name',
        'price' => 'required|numeric|min:0',
        'inventory' => 'required|integer|min:0',
        'unit' => 'required|string'
    ]);


    // Save the food item to the database
    FoodItem::create([
        'name' => $validatedData['name'],
        'price' => $validatedData['price'],
        'inventory' => $validatedData['inventory'],
        'unit' => $validatedData['unit']
    ]);

    // Redirect to the food item list with success message
    return redirect()->route('manager.fooditems.index')->with('message', 'Food item created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $foodItem = FoodItem::findOrFail($id);
        return view('manager.fooditems', compact('foodItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         /**
     * Update the specified food item.
     */
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'inventory' => 'required|integer|min:0',
            'unit' => 'required|string|in:bag,cup,kg,bundle,pack,roll,carton,pcs,keg',
        ]);

        // Find the food item by ID
        $foodItem = FoodItem::findOrFail($id);

        // Update the food item with validated data
        $foodItem->update($validated);

        // Redirect back with a success message
        return redirect()->route('manager.fooditems.index')->with('message', 'Food item updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $foodItem = FoodItem::findOrFail($id);
        $foodItem->delete();

        return redirect()->route('manager.fooditems.index')->with('message', 'Food item deleted successfully.');
    
    }
}
