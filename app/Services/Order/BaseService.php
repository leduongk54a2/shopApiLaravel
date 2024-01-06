<?php

namespace App\Services\Order;

use App\Models\CartItem;
use App\Repositories\CartItemRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;

class BaseService
{

    protected OrderRepository $orderRepository;
    protected OrderDetailRepository $orderDetailRepository;

    protected ProductRepository $productRepository;

    protected CartItemRepository $cartItemRepository;

    /**
     * @param OrderRepository $orderRepository
     * @param OrderDetailRepository $orderDetailRepository
     * @param ProductRepository $productRepository
     * @param CartItemRepository $cartItemRepository
     */
    public function __construct(OrderRepository $orderRepository, OrderDetailRepository $orderDetailRepository, ProductRepository $productRepository, CartItemRepository $cartItemRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->productRepository = $productRepository;
        $this->cartItemRepository = $cartItemRepository;
    }


}
