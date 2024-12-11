<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Slider;
use App\Models\Order;
use App\Models\Status;
use App\Models\Item;
use App\Models\Role;
use Auth;
use Carbon\Carbon;

class AdminController extends Controller
{   

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status_code' => 422,
            ], 200);
        }

        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return redirect()->route('admin.dashbaord')->with('success', 'login successful');
        } else {
            return redirect()->back()->with('error', 'login error');
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect()->route('home')->with('success', 'Logout successful');
    }



    public function adminDashboard(Request $request)
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $dates = [];
        for ($date = $startOfMonth; $date->lte($endOfMonth); $date->addDay()) {
            $dateString = $date->format('Y-m-d');
            $orders = Order::whereDate('order_booking_date', $dateString)->get();

            // Determine color based on order statuses
            $allSuccessful = $orders->every(fn($order) => $order->status->name === 'Successful');
            $dates[] = [
                'date' => $dateString,
                'color' => $allSuccessful ? 'green' : ($orders->isNotEmpty() ? 'red' : 'gray'),
            ];
        }

        $total_orders = Order::count();
        $total_employee = User::with('role')->get();
        $total_job_role = Role::count();
        $total_status = Status::count();

        return view('admin.dashboard', compact('dates', 'total_orders', 'total_employee', 'total_job_role', 'total_status'));
    }

    


    public function getOrdersByDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);
    
        $orders = Order::whereDate('created_at', $request->date)
                    ->with(['user', 'status'])
                    ->get();
    
        return view('admin.orders', compact('orders', 'request'));
    }
    
    
    
    
    public function dashboardCalendar(Request $request)
    {
        $datesWithColors = [];
        $orders = Order::select('created_at', 'status_id')
            ->with('status')
            ->get()
            ->groupBy('created_at');
        
        foreach ($orders as $date => $orderGroup) {
            $formattedDate = \Carbon\Carbon::parse($date)->format('d-m-Y');
            $allSuccessful = $orderGroup->every(function ($order) {
                return $order->status->name === 'success';
            });
            $color = $allSuccessful ? 'green' : 'red';
            
            $datesWithColors[] = [
                'date' => $formattedDate,
                'color' => $color,
            ];
        }
        return response()->json([
            'status_code' => 200,
            'data' => $datesWithColors,
        ]);
    }


    


}
