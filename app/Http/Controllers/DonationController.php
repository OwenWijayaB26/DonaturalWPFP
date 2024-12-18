<?php

namespace App\Http\Controllers;

use App\Models\DonateList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DonationController extends Controller
{
    public function generateToken(Request $request,DonateList $dlist) {
        $user = Auth::user();
        $amount = $request->input('amount');
        $order = "$dlist->id-".rand();
        $params = [
            'transaction_details' => [
                'order_id' => $order,
                'gross_amount' => (int)$amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'finish_redirect_url' => null
        ];
        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));
        $resp = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->post('https://app.sandbox.midtrans.com/snap/v1/transactions',$params);
        
        $resp = json_decode($resp->body());
        return response()->json($resp);
    }
}
