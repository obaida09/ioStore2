<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderTransaction;
use App\Models\User;
use App\DataTables\OrderDatatable;
use App\Notifications\Admin\Orders\OrderNotification;
use App\Services\OmnipayService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(OrderDatatable $order)
    {
        if (!auth()->user()->ability('admin', 'manage_orders, show_orders')) {
            return redirect('admin/index');
        }
        
        $title = 'Control Order';
        return $order->render('admin.orders.index', compact('title'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_orders')) {
            return redirect('admin/index');
        }

        // return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->ability('admin', 'create_orders')) {
            return redirect('admin/index');
        }

        //
    }

    public function show(Order $order)
    {
        if (!auth()->user()->ability('admin', 'display_orders')) {
            return redirect('admin/index');
        }

        $order_status_array = [
            '0' => 'New order',
            '1' => 'Paid',
            '2' => 'Under process',
            '3' => 'Finished',
            '4' => 'Rejected',
            '5' => 'Canceled',
            '6' => 'Refund requested',
            '7' => 'Returned order',
            '8' => 'Refunded',
        ];

        $key = array_search($order->order_status, array_keys($order_status_array));
        foreach ($order_status_array as $k => $v) {
            if ($k < $key) {
                unset($order_status_array[$k]);
            }
        }

        return view('admin.orders.show', compact('order', 'order_status_array'));
    }

    public function edit(Order $order)
    {
        if (!auth()->user()->ability('admin', 'update_orders')) {
            return redirect('admin/index');
        }

        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        if (!auth()->user()->ability('admin', 'update_orders')) {
            return redirect('admin/index');
        }
        $customer = User::find($order->user_id);

        if ($request->order_status == Order::REFUNDED){
            $omniPay = new OmnipayService('PayPal_Express');
            $response = $omniPay->refund([
                'amount' => $order->total,
                'transactionReference' => $order->transactions()->where('transaction', OrderTransaction::PAYMENT_COMPLETED)->first()->transaction_number,
                'cancelUrl' => $omniPay->getCancelUrl($order->id),
                'returnUrl' => $omniPay->getReturnUrl($order->id),
                'notifyUrl' => $omniPay->getNotifyUrl($order->id),
            ]);

            if ($response->isSuccessful()) {
                $order->update(['order_status' => Order::REFUNDED]);
                $order->transactions()->create([
                    'transaction' => OrderTransaction::REFUNDED,
                    'transaction_number' => $response->getTransactionReference(),
                    'payment_result' => 'success'
                ]);

                $customer->notify(new OrderNotification($order));
                
                toast('Refunded updated successfully', 'success');
                return back();
            }

        } else {

            $order->update(['order_status'=> $request->order_status]);

            $order->transactions()->create([
                'transaction' => $request->order_status,
                'transaction_number'=> null,
                'payment_result'=> null,
            ]);

            $customer->notify(new OrderNotification($order));
            
            toast('updated successfully', 'success');
            return back();

        }

    }

    public function destroy(Order $order)
    {
        if (!auth()->user()->ability('admin', 'delete_orders')) {
            return redirect('admin/index');
        }
        $order->delete();

        toast('Deleted successfully', 'success');
        return redirect()->route('admin.orders.index');
    }
}
