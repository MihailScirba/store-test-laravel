<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = CartItem::all();
        return view('shop.cart', compact('cartItems'));
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
        $cartItem = CartItem::find($request->product_id);
        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + 1
            ]);
        } else {
            $cartItem = new CartItem();
            $cartItem->product_id = $request->product_id;
            $cartItem->quantity = 1;
            $cartItem->save();
        }
        return redirect()->route('products.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CartItem::destroy($id);
        return redirect()->back();
    }


    public function quantityManager(Request $request, int $id)
    {
        $item = CartItem::find($id);
        $action = $request->input('action');
        if ($action ===  'increment') 
        {
            $item->increment('quantity');
        }
        elseif ($action == 'decrement') 
        {
            $item->decrement('quantity');
        }
        
        return redirect()->back();
    }
}
