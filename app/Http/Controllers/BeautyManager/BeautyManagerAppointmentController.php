<?php

namespace App\Http\Controllers\BeautyManager;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Cart;
use App\Models\User;
use App\Models\Service;
use App\Models\Product;
use App\Models\ClickCount;
use Carbon\Carbon;

class BeautyManagerAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all(); 
        return view('beautymanager.appointments.index', compact('appointments'));
    }
    public function accept($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'ACCEPTED';
        $appointment->save();
        return redirect()->back()->with('success', 'Appointment accepted successfully.');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'timeslot' => 'required|string|max:255',
            'date' => 'required|date',
            'phone' => 'required|digits:10',
        ]);

        $userId = Auth::id();

        $appointment = new Appointment;
        $appointment->name = $validatedData['name'];
        $appointment->service = $validatedData['service'];
        $appointment->timeslot = $validatedData['timeslot'];
        $appointment->date = $validatedData['date'];
        $appointment->phone = $validatedData['phone'];
        $appointment->user_id = $userId;
        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully');
    }
    public function decline($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'DECLINED';
        $appointment->save();
        return redirect()->back()->with('error', 'Appointment declined successfully.');
    }
    public function showCartDetails()
    {
        $cartItems = Cart::all(); 
        return view('beautymanager.cart.index', compact('cartItems'));
    }

    public function showAnalyticsDetails()
    {
        $count = ClickCount::pluck('count')->first();
        $cartItems = Cart::all(); 
        $appointments = Appointment::all(); 
        $users = User::all(); 
        $products = Product::all(); 
        $services = Service::all(); 

        $totalSales = 0;
        foreach ($cartItems as $item) {
            if (!empty($item->cart_data)) {
                $totalSales += $item->price;
            }
        }
    
        $futureAppointmentsCount = Appointment::where('date', '>', Carbon::now())->count();
        $completedAppointmentsCount = Appointment::where('date', '<', Carbon::now())->count();
        $totalCartcount = Cart::count();
    
        $productsCount = Product::count();
        $servicesCount = Service::count();

        $totalAppointmentsCount = Appointment::count();
    
        $totalcustomers = User::whereNotIn('role', ['admin', 'beauty_manager'])->count();
    
        $acceptedAppointmentCount = Appointment::where('status', 'ACCEPTED')->count();
        $declinedAppointmentCount = Appointment::where('status', 'DECLINED')->count();
        $pendingAppointmentCount = Appointment::where('status', 'pending')->count();
       
        $acceptedCartCount = Cart::where('status', 'DISPATCHED')->count();
        $pendingCartCount = Cart::where('status', 'PENDING')->count();
    
        return view('admin.dashboard', compact('cartItems', 'totalSales', 'futureAppointmentsCount', 'totalAppointmentsCount',
         'totalcustomers', 'totalCartcount', 'acceptedCartCount','pendingCartCount','acceptedAppointmentCount',
          'declinedAppointmentCount','pendingAppointmentCount','productsCount', 'servicesCount','completedAppointmentsCount','count'));
    }
    
    public function acceptCartItem($id)
    {
        $cartItem = Cart::find($id);
        $cartItem->status = 'DISPATCHED';
        $cartItem->save();
        return redirect()->back()->with('success', 'Cart item dispatched successfully.');
    }
    

    
}
