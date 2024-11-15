<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\FoodItem;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = Voucher::all(); // Assuming you have a Voucher model
        return view('manager.vouchers', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'food_item_id' => 'required|integer|exists:food_items,id',
            'code' => 'string|max:10|unique:vouchers,code',
            'is_redeemed' => 'required|boolean',
            'expiry_date' => 'required|date', // Ensure expiry_date is a valid date
            'amount' => 'required|numeric|min:0', // Ensure amount is a valid number and non-negative
        ]);

        // Create a new voucher using the validated data
        $voucher = Voucher::create([
            'food_item_id' => $validated['food_item_id'],
            'code' => $validated['code'],
            'is_redeemed' => $validated['is_redeemed'],
            'expiry_date' => $validated['expiry_date'], // Assign expiry_date
            'amount' => $validated['amount'], // Assign amount
        ]);

        // Redirect back with a success message
        return redirect()->route('manager.vouchers.index')->with('message', 'Voucher created successfully. Code: ' . $voucher->code);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $code = strtoupper(Str::random(6));
        $foodItems = FoodItem::all();
        return view('manager.voucher-new', compact('code', 'foodItems'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $foodItems = FoodItem::all();
        $voucher = Voucher::with('foodItem')->findOrFail($id); // Assuming you have a Voucher model with a relationship to FoodItem
        return view('manager.voucher-show', compact('voucher', 'foodItems'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'food_item' => 'required|exists:food_items,id',
            'is_redeemed' => 'required|boolean',
            'expiry_date' => 'required|date', // Ensure expiry_date is a valid date
            'amount' => 'required|numeric|min:0', // Ensure amount is a valid number and non-negative
        ]);

        // Find the voucher by ID
        $voucher = Voucher::findOrFail($id);

        // Update the voucher with the new data
        $voucher->food_item_id = $request->input('food_item');
        $voucher->is_redeemed = $request->input('is_redeemed');
        $voucher->expiry_date = $request->input('expiry_date'); // Assign expiry_date
        $voucher->amount = $request->input('amount'); // Assign amount
        $voucher->save();

        // Redirect back with a success message
        return redirect()->route('manager.vouchers.index', $voucher->id)
            ->with('message', 'Voucher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();

        return redirect()->route('manager.vouchers.index')->with('message', 'Voucher deleted successfully.');
    }
}
