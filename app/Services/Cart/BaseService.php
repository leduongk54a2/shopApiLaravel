<?php

namespace App\Services\Cart;

use App\Repositories\CartItemRepository;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;

class BaseService
{
    protected CartRepository $cartRepository;

    protected CartItemRepository $cartItemRepository;

    protected ProductRepository $productRepository;

    /**
     * @param CartRepository $cartRepository
     * @param CartItemRepository $cartItemRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(
        CartRepository $cartRepository,
        CartItemRepository $cartItemRepository,
        ProductRepository $productRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->cartItemRepository = $cartItemRepository;
        $this->productRepository = $productRepository;
    }


}