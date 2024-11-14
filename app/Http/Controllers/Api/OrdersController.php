<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Requests\Api\StatusOrderRequest;
use App\Http\Resources\Api\OrderResources;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderStatus;
use App\Models\Wallet;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    use ApiResponseTrait;
    public function get_orders()
    {

        $data = Order::where('customer_id',auth('api')->id())->paginate(20);
        $response = [
            'data' => OrderResources::collection($data),
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'first_page_url' => $data->url(1),
                'last_page_url' => $data->url($data->lastPage()),
                'next_page_url' => $data->nextPageUrl(),
                'path' => $data->path(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem()
            ]
        ];
        return $this->successResponse(data: $response, message: 'Return Data Successfully');
    }

    public function store(OrderRequest $request)
    {
        DB::beginTransaction();

        try {
            $orderData = $request->only([
                 'order_type', 'payment_type', 'customer_id',
            ]);
            $products = $request->input('products');
            $subtotal = 0;

            foreach ($products as $product) {
                $subtotal += $product['price'] * $product['quantity'];
            }

            $discountAmount = 0.00;
            $total = $subtotal;

            $couponId = $request->input('coupon_id');
            if ($couponId) {
                $couponResponse = check_coupons($couponId, $subtotal);

                if ($couponResponse->status() === 200) {
                    // Apply discount if coupon is valid
                    $discountAmount = $couponResponse->original['discount_amount'];
                    $total = $couponResponse->original['final_total'];
                } else {
                    return $couponResponse;
                }
            }

            $orderData['payment_status'] = "Unpaid";
            $orderData['status'] = "pending";
            $orderData['subtotal'] = $subtotal;
            $orderData['discount'] = $discountAmount;
            $orderData['total'] = $total;
            $orderData['coupon_id'] = $couponId;
            $orderData['customer_id'] = auth('api')->id();


            $order = Order::create($orderData);

            if ($request->payment_type == 'wallet') {
                $customerId = auth('api')->id();
                $wallet = Wallet::where('customer_id', $customerId)->first();
                if (!$wallet || (float)$wallet->amount < $total) {
                    return response([
                        'error' => 'Insufficient balance in wallet.'
                    ], 400);
                }
                $wallet->amount = (float)$wallet->amount - (float)$total;
                $wallet->status_amount = 'debit';
                $wallet->save();
            }

            $products = $request->input('products');
            foreach ($products as $product) {
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $product['product_id'],
                    'price' => $product['price'],
                    'quantity' => $product['quantity'],
                    'color' => $product['color'] ?? null,
                    'size' => $product['size'] ?? null,
                ]);
            }


            OrderStatus::create([
                'order_id' => $order->id,
                'status' => "pending",
                'customer_id' => $orderData['customer_id'],
            ]);

            DB::commit();

            return response([
                'message' => 'Order created successfully',
                'order' => new OrderResources($order)
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'error' => 'Order creation failed',
                'details' => $e->getMessage()
            ], 500);
        }
    }


    public function details(Request $request)
    {
        $checkIDOrder = Order::findorfail($request->order_id);
        if ($checkIDOrder){
            return new OrderResources($checkIDOrder);
        }else{
            return response([
                'error' => 'Order not found',
            ], 404);
        }
    }


    public function status_order(StatusOrderRequest $request)
    {

        $order = Order::find($request->order_id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $newStatus = $request->status;
        $order->status = $newStatus;
        $order->save();
        OrderStatus::create([
            'order_id' => $order->id,
            'status' => $newStatus,
            'customer_id' => auth('api')->id(),
        ]);
        return response()->json(['message' => 'Order status updated successfully']);
    }




}
