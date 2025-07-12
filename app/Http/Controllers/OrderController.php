<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('client')->get();
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('order.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:client,id',
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric|min:0',
        ]);

        Order::create($validated);

        return redirect()->route('order.index')->with('success', 'Order created successfully');
    }

    public function show(Order $order)
    {
        $order->load('client');
        return view('order.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $clients = Client::all();
        return view('order.edit', compact('order', 'clients'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:client,id',
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric|min:0',
        ]);

        $order->update($validated);

        return redirect()->route('order.index')->with('success', 'Order updated successfully');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success', 'Order deleted successfully');
    }

    public function exportPdf()
    {
        $orders = Order::with('client')->get();

        $pdf = Pdf::loadView('order.pdf', compact('orders'));
        return $pdf->download('Order Report Simpel ERD.pdf');
    }
}
