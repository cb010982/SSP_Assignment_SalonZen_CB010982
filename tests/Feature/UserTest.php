<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testRegistration()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
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
    public function testUserLogin()
{
   
    $credentials = [
        'email' => 'test@example.com',
        'password' => 'Senu@123$',
    ];

  
    $response = $this->post('/login', $credentials);

    $response->assertRedirect('/');  
    $this->assertAuthenticated();
}

public function testAppointmentBooking()
{
    
    $credentials = [
        'email' => 'test@example.com',
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


    $response->assertRedirect('/appointments');
    $this->assertDatabaseHas('appointments', ['name' => 'Test User']);
}
public function testAppointmentHistory()
{
    
    $credentials = [
        'email' => 'test@example.com',
        'password' => 'Senu@123$',
    ];

    $this->post('/login', $credentials)->assertRedirect('/');

    $response = $this->get('/appointmenthistory');

  
    $response->assertStatus(200);
}

public function testAddToCart()
{
  
    $credentials = [
        'email' => 'test@example.com',
        'password' => 'Senu@123$',
    ];


    $this->post('/login', $credentials)->assertRedirect('/');

    $cartDetails = [
        'price' => '11600',
        'cart_data' => json_encode([
            ['name' => 'ColorSplash Nail Polish', 'quantity' => 1, 'price' => 600],
            ['name' => 'LuxeVelvet Cream', 'quantity' => 1, 'price' => 3000],
            ['name' => 'JewelDew Hair Oil', 'quantity' => 1, 'price' => 8000],
        ]),
    ];

 
    $response = $this->post('/cart', $cartDetails);

    
    $response->assertRedirect('/cart');
    $this->assertDatabaseHas('carts', ['user_id' => Auth::id()]);
}


}
