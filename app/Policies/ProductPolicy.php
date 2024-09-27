<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user,Product $product)
    {
        return $user->id === $product->user_id;
    }

    public function delete(User $user,Product $product)
    {
        return $user->id === $product->user_id;
    }
}
