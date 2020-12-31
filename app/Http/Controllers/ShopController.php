<?php

namespace App\Http\Controllers;

use App\Models\UserCartItem;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public const PRODUCT_ID_EMERALD = 0;

    public static $productIdToMcItemId = [
        self::PRODUCT_ID_EMERALD => ["エメラルド", 5000, 388, 0],
    ];

    public function addToCart(Request $request){
        $data = $request->all();
        $user = $request->user();
        $validator = \Validator::make($data, [
            'product_id' => ['required', 'integer',
                function ($attribute, $value, $fail) {
                    if (!isset(self::$productIdToMcItemId[$value])) {
                        return $fail('商品情報が見つかりません');
                    }
                }
            ],
            'count' => 'required|integer|min:1|max:100',
        ]);
        if ($validator->fails()) {
            return redirect('shop')
                ->withErrors($validator)
                ->withInput();
        }

        UserCartItem::create([
                'user_id' => $user->id,
                'product_id' => (int) $data['product_id'],
                'amount' => (int) $data['count'],
            ]
        );
        return view('shop');
    }

    public function purchaseProducts(Request $request){

    }

}
