<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClickCount;
use Illuminate\Support\Facades\Log;

class AnalyticsController extends Controller
{
    public function updateClickCount(Request $request)
    {
        try {
           
            $clickCount = ClickCount::value('count') ?? 0;

          
            $clickCount++;

            
            ClickCount::updateOrCreate([], ['count' => $clickCount]);

            return response()->json(['success' => true, 'count' => $clickCount]);
        } catch (\Exception $e) {
            
            Log::error('Error updating click count: ' . $e->getMessage());

           
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
 
    public function showDashboard()
    {
        $count = ClickCount::value('count');

       
        dd($count);
    
        return view('admin.dashboard', compact('count'));
    }
    
}

