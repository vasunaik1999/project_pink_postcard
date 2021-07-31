<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all()->sortByDesc('id');
        //dd($orders);
        return view('backend.orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        //dd($request);
        if ($request['order_type'] == "shipping_type_1") {
            $request->validate([
                'card_from' => 'required',
                'card_to' => 'required',
                'message1' => 'required',
                'address1' => 'required',
                'email' => 'required',
                'phone' => 'required|digits:10',
                'pincode1' => 'required'
            ]);

            $order = new Order();
            $order->type = 'Send to someone';
            $order->postcard_id = $request->postcard_id;
            $order->phone = $request->input('phone');
            $order->email = $request->input('email');
            $order->name = $request->input('card_from');
            $order->to_name = $request->input('card_to');
            $order->message = $request->input('message1');
            $order->address = $request->input('address1');
            $order->pincode = $request->input('pincode1');
            $order->status = 'Pending';
            $order->order_by = Auth::user()->id;

            //dd($order);
            $order->save();
            $order_id = $order->id;

            return view('frontend.postcard.confirmPayment', compact('order'));
        } elseif ($request['order_type'] == "shipping_type_2") {
            $request->validate([
                'name2' => 'required',
                'address2' => 'required',
                'pincode2' => 'required',
                'email' => 'required',
                'phone' => 'required|digits:10'
            ]);

            $order = new Order();
            $order->postcard_id = $request->postcard_id;
            $order->type = 'Receive yourself';
            $order->phone = $request->input('phone');
            $order->email = $request->input('email');

            $order->name = $request->input('name2');
            $order->address = $request->input('address2');
            $order->pincode = $request->input('pincode2');
            $order->status = 'Pending';
            $order->order_by = Auth::user()->id;
            //dd($order);
            $order->save();
            $order_id = $order->id;
            return view('frontend.postcard.confirmPayment', compact('order'));
        } else {
            $request->validate([
                'name3' => 'required',
                'email' => 'required',
                'phone' => 'required|digits:10'
            ]);

            $order = new Order();
            $order->postcard_id = $request->postcard_id;
            $order->type = 'Pick up';
            $order->phone = $request->input('phone');
            $order->email = $request->input('email');
            $order->name = $request->input('name3');
            $order->status = 'Pending';
            $order->order_by = Auth::user()->id;
            //dd($order);
            $order->save();
            $order_id = $order->id;

            return view('frontend.postcard.confirmPayment', compact('order'));
        }
    }

    public function updateStatus(Request $request)
    {
        //dd($request);
        $order = Order::where('id', '=', $request->order_id)->first();
        $order->note = $request->note;
        $order->status = $request->status;

        $order->update();
        return redirect()->back();
    }
}
