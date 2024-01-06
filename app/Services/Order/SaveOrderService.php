<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Services\Cart\UpdateQuantityCartItemService;
use Illuminate\Support\Facades\DB;

class SaveOrderService extends BaseService
{
    public function execute($params)
    {
        $order = new Order();
        $order->userId = $params['userId'];
        $order->shippedDate = \DateTime::createFromFormat("Y-m-d", $params["shippedDate"]);
        $order->total = $params['total'];
        $order->customerInfo = $params['customerInfo'];
        $order->comment = $params['comment'];
        $order->address = $params['address'];


        try {
            DB::beginTransaction();
            $orderSave = Order::create($order->getAttributes());
            $orderId = $orderSave->orderId;
            foreach ($params["cartItems"] as $item) {
                $product = $this->productRepository->find($item["productId"]);
                $newQuantity = $product->quantity - $item["quantity"];
                if( $newQuantity < 0) {
                    throw  new \Exception("dont have enough quantity for this product".$item["productId"]);
                } else {
                    $product->quantity  = $newQuantity;
                    $this->productRepository->update($product->getAttributes(),$item["productId"]);
                }
                $this->cartItemRepository->where("cartId", $item["cartId"])->where("productId",
                    $item["productId"])->delete();
                $orderDetails = OrderDetail::create([
                    'orderId' => $orderId,
                    'productId' =>  $item["productId"],
                    'quantity' =>  $item["quantity"]
                ]);
            }
            DB::commit();
            return "";

        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

    }
}
