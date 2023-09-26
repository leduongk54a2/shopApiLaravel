<?php

namespace App\Services\Cart;

use Illuminate\Support\Facades\Auth;

class AddCartService extends BaseService
{


    public function execute($params)
    {
        $user = Auth::user();
        $cart = $this->cartRepository->getModel()->where("userId", $user->userID)->first();
        $listCartItem = $params["listCartItem"];
        $total = 0;
        foreach ($listCartItem as $item) {
            $cartItem = $this->cartItemRepository->where("cartId", $cart->cartId)->where("productId",
                $item["productId"])->first();
            if ($cartItem === null) {


                $cartItem = $this->cartItemRepository->create([
                    "cartId" => $cart->cartId,
                    "productId" => $item["productId"],
                    "quantity" => $item["quantity"]
                ]);
            } else {
                $this->cartItemRepository->where("cartId", $cart->cartId)->where("productId",
                    $item["productId"])->update(["quantity" => $cartItem->quantity + $item["quantity"]]);
            }
            $product = $this->productRepository->find($item["productId"]);
            $total += $product->price * (1 - ($product->discount / 100)) * $item["quantity"];
        }

        $cart->save();

    }

}