<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\orderRequest;
use App\Models\user\cartModel;
use App\Models\user\orderModel;

class orderController extends Controller
{

        protected $order ; 

        protected $cart ; 


        public function construct(cartModel $cart , orderModel $order)
        {
                $this->cartModel = $cart;
                $this->orderModel =$order;
        }

        public function store($id)
        {
                $cartItem = cartModel::find($id);
                return view ("user.oder", compact("cartItem"));
        }



        public function oderTour(orderRequest $request ,$id)
        { 
                $cartItem = cartModel::find($id);
                $orderList = [
                        "fullname"=>$request->input("fullname"),
                        "address"=>$request->input("address"),
                        "sdt"=>$request->input("sdt"),
                        "nametour"=>$request->input("nametour"),
                        "price"=>$request->input("price"),
                        "quantity"=>$request->input("quantity"),
                        "total_many"=>$request->input("total_maney"),
                ];

                orderModel::oder($orderList , $id);
        }
}
