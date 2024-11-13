<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function credit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0'
        ]);

        $wallet = (new WalletController)->creditAmount(auth('api')->id(), $request->amount);

        return response()->json(['message' => 'Amount credited successfully', 'wallet' => $wallet], 200);
    }

    public function debit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0'
        ]);

        $wallet = (new WalletController)->debitAmount(auth('api')->id(), $request->amount);

        return response()->json(['message' => 'Amount debited successfully', 'wallet' => $wallet], 200);
    }

    public function creditAmount($customerId, $amount)
    {
        $wallet = Wallet::firstOrCreate(
            ['customer_id' => $customerId],
            ['amount' => 0, 'status_amount' => 'credit']
        );
        $newAmount = (float) $wallet->amount + (float) $amount;
        $wallet->amount = (string) $newAmount;
        $wallet->status_amount = 'credit';
        $wallet->save();

        return $wallet;
    }

    public function debitAmount($customerId, $amount)
    {
        $wallet = Wallet::where('customer_id', $customerId)->first();
        if (!$wallet) {
            return response()->json(['error' => 'Wallet not found'], 404);
        }
        if ((float) $wallet->amount < (float) $amount) {
            return response()->json(['error' => 'Insufficient balance'], 400);
        }
        $newAmount = (float) $wallet->amount - (float) $amount;
        $wallet->amount = (string) $newAmount;
        $wallet->status_amount = 'debit';
        $wallet->save();

        return $wallet;
    }


}
