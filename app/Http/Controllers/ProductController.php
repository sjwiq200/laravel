<?php
/**
 * Created by PhpStorm.
 * User: sjwiq200
 * Date: 2018. 9. 28.
 * Time: AM 12:29
 */

namespace App\Http\Controllers;


use App\Products;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;

class ProductController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listProduct() {

        $productModel = new Products();
        $selectProduct = $productModel->selectDefault()->get();

        return view('product/listProduct')->with('listProduct',$selectProduct);

    }

    public function addProduct(Request $request) {
        //return Input::all();
        $productName = $request->input('product-name');
        $productPrice = $request->input('product-price');
        $productCount = $request->input('product-count');
        $productSeller = $request->session()->get('users');

        $productModel = new Products();
        $productModel->insertProduct(['product_name'=>$productName,
            'product_price' =>$productPrice,
            'product_count' =>$productCount,
            'product_seller' =>$productSeller]);

    }



}
