<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use DB;
use App\Models\Cart;
use App\Models\Appointment;
use Carbon\Carbon;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */

     // 01 Testing Registration 

    public function testRegistration()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test1@example.com',
            'telephone' => '1234567890',
            'skin_type' => 'Dry',
            'allergies' => 'None',
            'address' => '123 Test Street',
            'date_of_birth' => '2000-01-01',
            'password' => 'Senu@123$',
            'password_confirmation' => 'Senu@123$',
        ]);
    
        $response->assertStatus(302);
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }

// 02 Testing Login

    public function testUserLogin()
{
   
    $credentials = [
        'email' => 'test1@example.com',
        'password' => 'Senu@123$',
    ];

  
    $response = $this->post('/login', $credentials);

    $response->assertRedirect('/');  
    $this->assertAuthenticated();
}

// 03 Testing appointments

public function testAppointmentBooking() 
{
    
    $credentials = [
        'email' => 'test1@example.com',
        'password' => 'Senu@123$',
    ];

    
    $response = $this->post('/login', $credentials);

    
    $response->assertRedirect('/'); 
    $this->assertAuthenticated();

   
    $appointmentDetails = [
        'name' => 'Test User',
        'service' => 'Test Service',
        'timeslot' => '10:00 AM - 11:00 AM',
        'date' => '2024-01-01',
        'phone' => '1234567890',
    ];

  
    $response = $this->post('/appointments', $appointmentDetails);


    $response->assertRedirect('/');
    $this->assertDatabaseHas('appointments', ['name' => 'Test User']);
}

// 04 Testing appointment history

public function testAppointmentHistory()
{
    
    $credentials = [
        'email' => 'test1@example.com',
        'password' => 'Senu@123$',
    ];

    $this->post('/login', $credentials)->assertRedirect('/');

    $response = $this->get('/appointmenthistory');

  
    $response->assertStatus(200);
}


// 05 Beauty Manager accepting appointments
public function testAcceptAppointment()
{
    
    $user = new User;
    $user->name = 'Test User';
    $user->email = 'test2@example.com';
    $user->password = bcrypt('password');
    $user->save();

   
    $this->actingAs($user);

    
    $appointment = new Appointment;
    $appointment->name = 'Test Name';
    $appointment->service = 'Test Service';
    $appointment->timeslot = '10:00 - 11:00';
    $appointment->date = '2024-01-30';
    $appointment->phone = '1234567890';
    $appointment->user_id = $user->id;
    $appointment->status = 'PENDING';
    $appointment->save();

    
    $response = $this->post(route('appointments.accept', ['id' => $appointment->id]));

   
    $this->assertDatabaseHas('appointments', [
        'id' => $appointment->id,
        'status' => 'ACCEPTED',
    ]);
 }

// 06 Beauty Manager declining appointments
public function testDeclineAppointment()
{
   
    $user = new User;
    $user->name = 'Test User';
    $user->email = 'test3@example.com';
    $user->password = bcrypt('password');
    $user->save();

    
    $this->actingAs($user);

    $appointment = new Appointment;
    $appointment->name = 'Test Name';
    $appointment->service = 'Test Service';
    $appointment->timeslot = '10:00 - 11:00';
    $appointment->date = '2024-01-30';
    $appointment->phone = '1234567890';
    $appointment->user_id = $user->id;
    $appointment->status = 'PENDING';
    $appointment->save();

    
    $response = $this->post(route('appointments.decline', ['id' => $appointment->id]));

    
    $this->assertDatabaseHas('appointments', [
        'id' => $appointment->id,
        'status' => 'DECLINED',
    ]);
}

// 07 Beauty Manager dispatching carts

public function testDispatchedCartItem()
{
    $user = new User;
    $user->name = 'Test User';
    $user->email = 'test4@example.com';
    $user->password = bcrypt('password');
    $user->save();
    $this->actingAs($user);
    $cartItem = new Cart;
    $cartItem->price = 3000;  
    $cartItem->cart_data = json_encode([
        [
            "name" => "LuxeVelvet Cream",
            "quantity" => 1,
            "price" => 3000
        ]
    ]);
    $cartItem->status = 'PENDING';
    $cartItem->user_id = $user->id;
    $cartItem->save();

    $response = $this->get(route('carts.acceptCartItem', ['id' => $cartItem->id]));

    $this->assertDatabaseHas('carts', [
        'id' => $cartItem->id,
        'status' => 'DISPATCHED',
    ]);
}

// 08 Testing cart history

public function testShowCart()
{
    $user = new User;
    $user->name = 'Test User';
    $user->email = 'test5@example.com';
    $user->password = bcrypt('password');
    $user->save();
    $this->actingAs($user);

    $cartItem = new Cart;
    $cartItem->price = 3000;  
    $cartItem->cart_data = json_encode([
        [
            "name" => "LuxeVelvet Cream",
            "quantity" => 1,
            "price" => 3000
        ]
    ]);
    $cartItem->status = 'PENDING';
    $cartItem->user_id = $user->id;
    $cartItem->save();

    $response = $this->get(route('carthistory.show'));

    $response->assertStatus(200);
    $response->assertViewHas('cartItems');
    $this->assertDatabaseHas('carts', [
        'id' => $cartItem->id,
        'user_id' => $user->id
    ]);
}

//09 Testing services page

public function testServices()
{
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test7@example.com',
        'password' => bcrypt('password'),
    ]);
    $this->actingAs($user);
    $response = $this->get('/services');
    $response->assertStatus(200);
    $response->assertViewIs('services');
    $response->assertViewHas('services');
}

// 10 Testing profile page

public function testShow()
{
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test8@example.com',
        'password' => bcrypt('password'),
    ]);
    $this->actingAs($user);
    $response = $this->get('/profileinfo');
    $response->assertStatus(200);
    $response->assertViewIs('profile');
    $response->assertViewHas('user');
}

// 11 Testing if user can update profile page

public function testUpdate()
    {
        
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test9@example.com',
            'password' => bcrypt('password'),
        ]);

        
        $this->actingAs($user);

       
        $response = $this->put(route('user.update', ['user' => $user]), [
            'name' => 'Updated User',
            'date_of_birth' => '2000-02-02',
            'address' => 'Updated Address',
            'telephone' => '0987654321',
            'skin_type' => 'Oily',
        ]);

        
        $response->assertStatus(302);

        
        $response->assertRedirect();
        $response->assertSessionHas('success', 'Profile created successfully');

      
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated User',
            'date_of_birth' => '2000-02-02',
            'address' => 'Updated Address',
            'telephone' => '0987654321',
            'skin_type' => 'Oily',
        ]);
    }


}



