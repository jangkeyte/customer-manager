<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductRepository
{
    // Lấy thông tin sản phẩm theo mã sản phẩm
    public function getProductByID($id=0)
    {
        return Product::where('uid', $id)->first();
    }

    // Lấy thông danh sách sản phẩm
    public function getProductList()
    {
        $productList = Product::all();
        
        $san_pham = array('0' => 'Tất cả');
        if(!empty($productList)){
            foreach($productList as $product)
            {   
                $trang_thai[$product->uid] = $product->name;
            }
        }
        return $san_pham;
    }


}