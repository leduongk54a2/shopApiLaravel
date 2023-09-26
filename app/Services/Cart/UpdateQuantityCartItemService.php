<?php

namespace App\Services\Cart;

class UpdateQuantityCartItemService extends BaseService
{

    public function execute($params)
    {
        if ($params["quantity"] !== 0) {
            $this->cartItemRepository->where("cartId", $params["cartId"])->where("productId",
                $params["productId"])->update(["quantity" => $params["quantity"]]);

        } else {
            $this->cartItemRepository->where("cartId", $params["cartId"])->where("productId",
                $params["productId"])->delete();
        }
    }

}