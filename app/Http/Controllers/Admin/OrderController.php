<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusOrderFormRequest;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        if($order->status !== 'Новый') {
            return redirect()->back();
        }
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Order $order, ChangeStatusOrderFormRequest $request)
    {
        $request->validated();
        if($request->status === 'В обработке' && !$request->comment) {
            return redirect(route('admin.orders.change-status-order', $order))->withErrors([
                'comment' => 'Заполните данное поле.'
            ])->withInput();
        } else {
            $order->status = $request->status;
            $order->comment = $request->comment;
            $order->save();
            return redirect(route('admin.orders.index'))->with(['orderStatusChanged' => 'Статус изменен.']);
        }
    }
}
