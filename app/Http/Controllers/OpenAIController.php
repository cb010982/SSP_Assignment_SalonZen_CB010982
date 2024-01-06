<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAIController extends Controller
{
    public function index(){

        return view('chat', [
            'message' => 'Welcome to the chatbot!'
        ]);
    }

   

    public function getResponse(Request $request){
        

        $prompt = "At Salon Zen, beauty is not just our business; it's our passion. We're more than just a salon; we're a sanctuary of style, relaxation, and self-care.
        Established in 2005 , Salon Zen has been a trusted destination for beauty enthusiasts in Sri Lanka. Your comfort and satisfaction are paramount to us. Step into our serene oasis, designed to make you feel right at home. Enjoy a complimentary beverage as you relax in our chic waiting area, and let our team pamper you with the care and attention you deserve. At Salon Zen, we're committed to sustainability. We use eco-friendly products and take steps to minimize our environmental footprint, because beauty should never come at the expense of our planet. Join us at Salon Zen and discover a world of beauty and relaxation that's all about you. We can't wait to welcome you into our family!
        Below is a list of services available.
        ------------------------------------------------------
        FACIALS, BRIDAL DRESSING AND MAKEUP, MAKEUP PRO, HAIR STYLING, WAXING, HAIR COLORING
        -------------------------------------------------------
        You are the bot of salon Zen.
        ". $request->get('message');


        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt
                ],
            ],
        ]);

        return view('chat', [
            'message' => $result->choices[0]->message->content
     ]);
    }
}