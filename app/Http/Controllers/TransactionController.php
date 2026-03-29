<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('kasir.index', compact('products'));
    }

public function store(Request $request)
{
    $data = json_decode($request->getContent(), true);
    $cart = $data['cart'] ?? [];

    if (empty($cart)) {
        return response()->json(['error' => 'Cart kosong'], 400);
    }

    $total = 0;

    foreach ($cart as $item) {
        $total += $item['price'] * $item['qty'];
    }

    $transaction = Transaction::create([
        'user_id' => Auth::id(),
        'total_price' => $total,
        'payment_method' => 'cash',
    ]);

    foreach ($cart as $item) {
        TransactionItem::create([
            'transaction_id' => $transaction->id,
            'product_id' => $item['id'],
            'qty' => $item['qty'],
            'price' => $item['price'],
            'subtotal' => $item['price'] * $item['qty'],
        ]);
    }

return response()->json([
    'success' => true,
    'transaction_id' => $transaction->id
]);
}

public function show($id)
{
    $transaction = Transaction::with('items.product')->findOrFail($id);

    return view('transactions.show', compact('transaction'));
}

}
