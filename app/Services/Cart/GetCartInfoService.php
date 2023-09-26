<?php

namespace App\Services\Cart;

use Illuminate\Support\Facades\Auth;

class GetCartInfoService extends BaseService
{
    public function execute()
    {
        $userId = Auth::user()->userID;
        $cart = $this->cartRepository->where("userId", $userId)->first();

        $listCartItem = $this->cartRepository->getModel()->with([
            "CartItem" => function ($q) {
                $q->with("product");
            }
        ])->where("carts.userId", "=",
            $userId)->first()->CartItem;

        $total = 0;
        foreach ($listCartItem as $item) {
            $product = $item->product;
            $total += ($product->price * (1 - ($product->discount / 100))) * ($item->quantity);
        }
        $cart->total = $total;
        $cart->save();

        return ["listCartItem" => $listCartItem->toArray(), "total" => $cart->total];

    }
}