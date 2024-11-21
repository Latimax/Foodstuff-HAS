<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use App\Models\Orders;
use App\Models\Setting;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = auth()->guard('auth')->user()->orders; // Fetch all orders
        $settings = Setting::first(); // Example settings object for currency
        return view('user.orders-list', compact('orders', 'settings'));
    
    }

    public function checkVoucher(Request $request)
    {

        $request->validate([
            'food_item_id' => 'required|exists:food_items,id',
            'voucher_code' => 'required|string',
        ]);

  
        $voucher = Voucher::where('code', $request->voucher_code)
            ->where('food_item_id', $request->food_item_id)
            ->where('is_redeemed', '0')
            ->first();
   

        if ($voucher) {
            return response()->json(['valid' => true, 'discount' => $voucher->amount]);
        }

        return response()->json(['valid' => false, 'message' => 'Invalid or already redeemed voucher.']);
    
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $foodItem = FoodItem::findorfail($id);
        $setting = Setting::first();
        return view('user.order', compact('foodItem', 'setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'food_item_id' => 'required|exists:food_items,id',
            'voucher_code' => 'nullable|string',
        ]);

        $foodItem = FoodItem::findOrFail($request->food_item_id);
        $voucher = null;
        $discount = 0;

        if ($request->voucher_code) {
            $voucher = Voucher::where('code', $request->voucher_code)
                ->where('food_item_id', $foodItem->id)
                ->where('is_redeemed', '0')
                ->first();

            if ($voucher) {
                $discount = $voucher->amount;
                $voucher->is_redeemed = true;
                $voucher->redeemed_at = now();
                $voucher->save();
            }
        }

        $amountPaid = $foodItem->price - $discount;
        $transactionNumber = substr(time(), -5) . random_int(10000, 99999);

        Orders::create([
            'transaction_number' => $transactionNumber,
            'user_id' => auth()->guard('auth')->id(),
            'amount' => $foodItem->price,
            'order_date' => now(),
            'food_item_id' => $foodItem->id,
            'voucher_id' => $voucher ? $voucher->id : null,
            'amount_paid' => $amountPaid,
        ]);

        return redirect(route('user.orders.index'))->with('message', 'Order placed successfully!');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
