@extends('layouts.app')

@section('content')

<section class="ftco-section ftco-appointment">
    <div class="overlay"></div>
<div class="container">
    <div class="row d-md-flex align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="appointment-info text-center p-5">
                <div class="mb-4">
                    <h3 class="mb-3">Address</h3>
                    <p> No 12. High-level Road, Nugegoda, Sri Lanka</p>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3">Phone</h3>
                    <p class="day"><strong>+94 112 807 979</strong> or <strong>+94 777 605 000</strong></p>
                </div>
                <div>
                    <h3 class="mb-3">Opening Hours</h3>
                    <p class="day"><strong>Monday - Friday</strong></p>
                    <span>08:00am - 08:00pm</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 appointment pl-md-5 ftco-animate">
            <h3 class="mb-3">Appointments</h3>
            <form action="#" class="appointment-form">
        <div class="row form-group d-flex">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="row form-group d-flex">
            <div class="col-md-6">
                <style>
                    select:hover option {
                        background-color: #f8f9fa;
                        color:black;
                    }
                 </style>

                <select class="form-control" id="services" name="services">
                    <option value="" disabled selected>Services</option>
                    <option value="Eyebrow Waxing">Eyebrow Waxing</option>
                    <option value="Upper Lip Waxing">Upper Lip Waxing</option>
                    <option value="Chin Waxing">Chin Waxing</option>
                    <option value="Full Face Waxing">Full Face Waxing</option>
                    <option value="Underarm Waxing">Underarm Waxing</option>
                    <option value="Basic Pedicure">Basic Pedicure</option>
                    <option value="Deluxe Pedicure">Deluxe Pedicure</option>
                    <option value="Spa Pedicure">Spa Pedicure</option>
                    <option value="Gel Pedicure">Gel Pedicure</option>
                    <option value="French Pedicure">French Pedicure</option>
                    <option value="Basic Manicure">Basic Manicure</option>
                    <option value="Deluxe Manicure">Deluxe Manicure</option>
                    <option value="Spa Manicure">Spa Manicure</option>
                    <option value="Gel Manicure">Gel Manicure</option>
                    <option value="French Manicure">French Manicure</option>
                    <option value="Collagen Facial">Collagen Facial</option>
                    <option value="Hydrating Facial">Hydrating Facial</option>
                    <option value="Anti-Aging Facial">Anti-Aging Facial</option>
                    <option value="Gold Facial">Gold Facial</option>
                    <option value="Exfoliating Facial">Exfoliating Facial</option>
                    <option value="Prenatal Massage">Prenatal Massage</option>
                    <option value="Hot Stone Massage">Hot Stone Massage</option>
                    <option value="Couples Massage">Couples Massage</option>
                    <option value="Sports Massage">Sports Massage</option>
                    <option value="Swedish Massage">Swedish Massage</option>
                    <option value="Collagen Facial">Collagen Facial</option>
                    <option value="Hydrating Facial">Hydrating Facial</option>
                    <option value="Anti-Aging Facial">Anti-Aging Facial</option>
                    <option value="Gold Facial">Gold Facial</option>
                    <option value="Exfoliating Facial">Exfoliating Facial</option>
                    <option value="On-Site Services">On-Site Services</option>
                    <option value="Airbrush Makeup">Airbrush Makeup</option>
                    <option value="Event Makeup">Event Makeup</option>
                    <option value="Everyday Makeup">Everyday Makeup</option>
                    <option value="Group Makeup">Group Makeup</option>
                    <option value="Pre-Wedding Trial">Pre-Wedding Trial</option>
                    <option value="Multi-event Prep">Multi-event Prep</option>
                    <option value="On-Site Service">On-Site Service</option>
                    <option value="Bride & Mother">Bride & Mother</option>
                    <option value="Bride & Group">Bride & Group</option>
                    <option value="High Arch">High Arch</option>
                    <option value="Flat Brow">Flat Brow</option>
                    <option value="Full Brow">Full Brow</option>
                    <option value="Angular Brow">Angular Brow</option>
                    <option value="Layered cut">Layered cut</option>
                    <option value="Pixie cut">Pixie cut</option>
                    <option value="Bob cut">Bob cut</option>
                    <option value="Curtain Bangs">Curtain Bangs</option>
                    <option value="Feathered cut">Feathered cut</option>
                    <option value="Straight Hair">Straight Hair</option>
                    <option value="Wavy Hair">Wavy Hair</option>
                    <option value="Ponytail">Ponytail</option>
                    <option value="Bun">Bun</option>
                    <option value="Braids">Braids</option>
                    <option value="Hair Mask">Hair Mask</option>
                    <option value="Keratin Treatment">Keratin Treatment</option>
                    <option value="Hot Oil Treatment">Hot Oil Treatment</option>
                    <option value="Protein Treatment">Protein Treatment</option>
                    <option value="Scalp Treatment">Scalp Treatment</option>
            </div>
          
    
    <select class="form-control" id="timeslot" name="timeslot">
     
     
    </select>

    <div class="row form-group d-flex">
        <div class="col-md-6">
            <select class="form-control" id="timeslot" name="timeslot">
                <option value="" disabled selected>Time</option>
                <option value="8am-10am">8am-10am</option>
                <option value="10am-12pm">10am-12pm</option>
                <option value="12pm-2pm">12pm-2pm</option>
                <option value="2pm-4pm">2pm-4pm</option>
                <option value="4pm-6pm">4pm-6pm</option>
                <option value="6pm-8pm">6pm-8pm</option>
            </select>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" id="date" name="date" placeholder="Date" onfocus="(this.type='date')" onblur="(this.type='text')">
        </div>
    </div>
    
            
                
    <div class="row form-group d-flex">
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Phone" pattern="\d{10}" title="Please enter exactly 10 digits">
    </div>
</div>
<div class="row form-group d-flex">
    <div class="form-group">
        <input type="submit" value="Order" class="btn btn-white btn-outline-white py-3 px-4">
    </div>
</form>

    
</section>


     
</section>
@endsection