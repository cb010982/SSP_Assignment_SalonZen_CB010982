## Salon Zen

<img width="1251" alt="image" src="https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/c95172a1-2780-408d-bf60-e7216bcf1ec6">

# Problem and domain

The domain I choose the personal care industry, where beauty related services are provided. 
Most talented salons in Sri Lanka, don’t maintain an online based system, which would attract a larger customer base, and inform customers of their products and services. A salon usually attracts a young and middle-aged crowd, who spend most of their time on online services and are too busy to manually make calls to salons to ask them about their services, location, products and so on.

Another problem that salon managers face is the lack of record management. Most Sri Lankan salons would usually answer calls and then either record it on books or sometimes, do not maintain any record at all. This way there are chances of missed appointments leading to bad reputation and customer service. Hence, possibilities of bad word of mouth directly impacting the revenue of such businesses.

If customers have questions to ask regarding the salon, they will have to make many calls, hoping that the salon managers might pick up. The lack of AI chat bots in a world evolving with Artificial Intelligence, makes salons less competitive in a highly competitive market locally as well as on a global scale.

Salons usually do not maintain any analytical record, which would support in their decision making process for the owners of the salon on even pricing, service management, product management and so on.

<img width="1241" alt="image" src="https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/0e38a747-ee9c-4a57-b35b-98178c2a5ca3">

# Solution
Having an online system will mean at anytime, anywhere in the world, users can access the salon, it’s details and maintain a relationship with the salon itself. When all information are present in the website itself, customers don’t miss out on anything. 

By maintaining details of the customer such as their allergies, the salon is able to personally cater to their needs and likings. Services can be customed to avoid allergic reactions and having records of the customer’s appointment patters, will give an idea for the salon staff on how to cater to the customer personally.

The solution has an AI chatbot, that will answer questions the user asks regarding the salon on the spot. Then no user has to be manually dedicated to respond to the questions or inquiries asked by the customers.
Analytics are maintained in the system, so that an overall understanding of the performance of the web application can be grasped via the visual and numerical representation of statistics.

# Future Upgrade Plan Report

The first step of my future upgrade plan would be collecting as much feedback from the users, which will be the most successful form of improving a system. As they are the direct-end users and therefore, if they face issues, regarding any service within the platform, I can use these points to improve my application and have a competitive advantage in the market. Therefore, weekly reviews or emails sent asking feedback on maybe a monthly basis depending on the user’s interactive period can help me track their preferences and negative points to try and improve the system to make it a SaaS solution.

For this purpose I have to make the reviews as engaging as possible for them to fill in, also focusing on minimizing the length of the review as it demotivates a person to fill such a lengthy review.
My next step is to have promotions based on the user’s demographic information like age or birthday etc. Personalized promotions via SMS, would make the customers happy and more motivated to revisit the salon, which will thus increase the revenue of the salon, again making my software competitive in the market. Eg: Sending promotions on birthday’s of the customers and monitoring the customer’s buying patterns and reminding them of a new stock arrival. Even, after a service like manicure is requested, after a period of about 2 weeks after the service, reminding the customer to re-coat their nails. These reminders personalized for their beauty needs is what a customer prefers. My motive in this case is to let the customer go stress free, without having to track her appointments when the system will just remind her. Even on appointment dates, messages like “Don’t forget your appointment scheduled for today from 1pm to 3pm!”, would reduce the stress of customers putting effort to remember their appointments.

<img width="1217" alt="image" src="https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/e1537698-9471-479c-a11a-cb308d1e1768">

Currently I do maintain analytics regarding the website, but a step for upgrading would be sending financial statistical reports based on revenue to the beauty manager on a monthly basis as well as on an annual basis. Most salons in Sri Lanka, manually record their appointments and so they don’t exactly prepare their reports in a proper manner. It would be less stress even for a manager to manually note these incomes, when it will be automatically generated, which would be great for the user. The main aim of my application is to reduce work on the user’s side, which is what any customer of my application would require.

The system currently has security like encryption of passwords, token management, role based systems, email verification, middleware etc. But more security like encrypting the entire database, and having a super admin who is the only authorized person to access the database, would be a safer strategy than the admin handing many functions regarding the database. Furthermore, more verification methods other than email verification like SMS verification would be a good security implementation to reduce the threat level to the system. Finally having an incident response plan is needed to mitigate potential issues that may arise in the system.

<img width="1194" alt="image" src="https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/2a2339ae-6403-4ebc-9d60-a33db71cead6">

Making the system scalable is another important factor before marketing this application. More secure and stable databases should be maintained to reduce downtime of the system. Cloud based databases and load balancing techniques should be used to fix this issue, so that the system can even access a global scale.
Commit to a schedule for regular software updates and maintenance to address bugs, maintaining documentation and maintaining backup is crucial for this type of a system.
With the evolving technology, and the competitive market, I will have to implement AI integrated solutions. Customers should be able to use mobile wallets and any form of contact-less payment strategy rather than the boring form filling for payments. For the customer’s ease I would prefer if virtual try-ons can be used when the client selects a service, maybe like a haircut, they will see what it looks like on them, real-time, so the customers won’t make decisions that would disappoint them. 

Maintaining social media platforms like Instagram, Facebook, TikTok to promote the products and services maintained within the platform, would be an added advantage to the buyer of this software as they have an extra marketing advantage.

<img width="1197" alt="image" src="https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/00a947bc-498d-483e-8a11-e408be528e15">


# Code Implementation

I have used  Laravel, Bootstrap, and AlpineJS for the  user interface and as my database I used SQLite, with the PHP backend.

# Functional requirements
1.	User Authentication and Access Control:

•	Implement user authentication for salon admin, clients and staff separately.
•	Define user roles and permissions to control access to system features and data.

# 2.	Appointment Scheduling:

•	Provide a user-friendly interface for clients to book appointments online.
•	Allow staff to schedule or cancel appointments.
•	Support multiple appointment services (haircut, manicure, massage, etc.).

# 3.	Inventory Management:

•	Manage salon inventory - beauty products.
•	Allow adding, editing, or removing products from the system.

# 4.	Payment Processing:

•	Process payments for products.
•	Calculate and display itemized bills.

# 5.	Manage client details
•	Maintain detailed client profiles with contact information, appointment history, purchasing history and preferences.
•	Clients should be able to change or edit their details.
•	Enable staff to view client records.

# 6.	Questions and Rating:
•	Collect and store client reviews.
•	Use chat bots to answer customer questions.

# Non-functional requirements
1.	Security and Data Protection:
•	Implement security measures to protect client. 

# 2.	Usability:
•	Usability requirements ensure that the system is user-friendly and intuitive:
•	The user interface should be visually appealing and easy to navigate.
•	Response times for user interactions (e.g. appointment booking) should be swift, typically within a few seconds.
•	The system should provide clear and informative error messages to help users understand issues and how to resolve them.

# 3.	Mobile Accessibility/Compatibility:
•	Provide mobile access to the system useful for staff and clients to manage appointments on the go.

# 4.	Availability and Reliability:
•	Ensure that the system is accessible and dependable:
•	The system should have a high level of uptime, with minimal planned downtime for maintenance.
•	Redundancy and failover mechanisms should be in place to ensure system availability even in case of hardware or software failures.

# 5.	Scalability
•	Scalability requirements ensure that the system can handle increased data volume.

# Scope

The domain I chose for this assignment is personal care services, where I took a beauty salon as the scope of my project. I have developed this system in such a way that I have  targeted only people above 18 years of age. This website will cater to the sale of products as well as services.

# Security Features
# Email verification 

1.	Registration of users

	The user’s when registered, will receive, an email verification via mail trap, when the user opens the mail an confirms that it was he/she who registered into the system, then the user can enter the website. 

2.	Password control

	Moreover, even when password reset happens, the user will be sent an email to confirm this action as demonstrated in the pages above. All passwords even in the database, would be encrypted, therefore, even if an unauthorized user get’s access to the database, due to the password being encrypted, the user is not able to get all the user related information and/or manipulate them, which would lead to certain vulnerabilities and data leakages.

# Form Validation
All forms will have necessary validations like required fields, maximum length (eg: mobile number), minimum length. Date validations ,eg: date of birth entered should be at least 18 years from the current date. This ensures, that the user cannot come finalize their action unless it is valid and accurate. Error messages would pop up on the fields.

# User roles and management
Admin and beauty manager have separate credentials that no normal customer can use, as they are saved in the database as received records in the users table. This way, no customer can directly manipulate the database in anyway. Moreover, only the admin has the power and control over deleting records in the database. Furthermore, only the admin has the power of changing the role of the user in any case of maybe adding another admin or maybe another beauty manager.

# Middleware protection
Necessary middleware, redirects users to login page, preventing them accessing webpages that are not directed to them or must be registered to use. Eg: Only admin can handle the admin related pages, likewise no customer can.

# Token authentication
Only the admin has token management powers where when they generate a token, that token will be only be able to use once, if the admin regenerates, this token will be a different one, that is not similar to the one generated before.

# Admin Credentials 

Email : admin02@gmail.com
Password: Senu@123$


# Beauty Manager Credentials

Email: beautymanager@gmail.com
Password: Senu@123$

## Web Pages
# Customer
# Services Page

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/2cefd2d1-8f40-4a4e-960c-67e05e2aeede)

# Products Page

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/22672308-7bb8-40b7-a145-d141d5371c4c)

# Staff Page

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/888c2b2d-894f-494e-b6cf-798a3ee420b2)

# Profile Page

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/b89f7679-cf04-4902-9d7c-6d5956923634)

# Pricing Page

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/3a824162-6c8c-4d78-ab49-d5f6231f2244)

# Appointment history

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/8b186acd-cf02-4c10-9d0b-3f42ace53815)

# Appointments page

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/1abe2566-086f-4a37-b389-76fc7cd94d43)

# Cart page 

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/0f69abc1-c14f-4126-a9d9-1d9059ea3642)


![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/ad78e3ac-06a6-445e-8b35-c17e12e63b4a)

# Cart Histoy 

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/9e3ef0a3-113f-4eba-85c8-6864735d0ef0)

# Chat page

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/5878157e-30c8-4d2c-9e8a-d493e1caef7e)



# Beauty Manager View
# Appointment Management 

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/fa5170c5-ebb7-49dc-a734-cae953b47b97)

# Cart Management 

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/e59c0f3e-df1b-4855-912c-10915a837918)

# Administrator View
# Address Book

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/746746a9-c691-415a-8215-75bf4f34322e)

# Product Management

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/73292299-8aad-4cb0-a4f1-13c1b4f1a327)

# Service Management

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/c1f711ea-5be0-46a8-9210-b54b0185e076)

# Appointment Management

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/f330c5d7-088a-4079-877e-24bed6b6f784)

# Analytics Board

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/30fde3aa-78ca-40dd-ba3f-02642e12811d)

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/cdf584e9-ceac-404a-97f5-7696396cfc7a)

# Mail trap was used for this system

![image](https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/6922a98d-5721-4021-beb6-1023b154f2f2)

# Target Market Analysis

<img width="524" alt="image" src="https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/a95f0674-4369-4a0e-a4e9-81e2470fadde">


Characteristics
•	Sally leads a hectic life with a demanding job and a busy social calendar.
•	She values convenience and efficiency in all aspects of her life.
•	Sally prefers services that save her time and can be scheduled during lunch breaks or after work.

Needs and Goals
•	Convenient online booking for salon appointments.
•	Access to express beauty services, such as quick blowouts or 30-minute facials.
•	An upscale salon environment with a focus on relaxation.

Obstacles
•	Finding answers to the questions she might have regarding the salon and its services within limited time.
•	Easy clicks within the system to get tasks done as she is very busy
•	Sally values her relaxation during salon visits but may find it challenging to achieve this in a busy salon environment.
 
Desires
•	Convenience: Sally desires a convenient efficient and a faster way with fewer steps to book salon appointments online, saving her time and effort.
•	Flexibility: She wishes for flexible scheduling options, including the ability to book appointments during her lunch break or after work (allowing appointment booking access 24/7).
•	Answer Questions: Sally wants to clarify her doubts before deciding her purchase.
•	Privacy and Relaxation: Sally desires a salon environment that prioritizes privacy and relaxation, allowing her to unwind during her beauty treatments.

<img width="565" alt="image" src="https://github.com/cb010982/ssp1_assignment_salon_zen/assets/113625267/eadd2adc-bb60-48e4-acff-c698f07a7be3">

Characteristics
•	Taylor is highly fashion-conscious and always wants to look her best.
•	She enjoys experimenting with the latest beauty trends and products.
•	Taylor often shares her salon experiences on social media to her followers.

Needs and Goals
•	Trendy and creative hairstyling and makeup services.
•	Access to a wide range of high-quality beauty products.
•	A salon with a stylish and Instagram-worthy interior for photo opportunities.
•	Friendly and knowledgeable staff who can offer beauty tips and advice.

Obstacles
•	Staying up-to-date with the constantly evolving beauty trends can be challenging for Taylor.
•	While Taylor enjoys experimenting with beauty trends, she may lack access to expert advice on the latest techniques and products.
•	Taylor may face difficulties in finding salons that provide the aesthetic and ambiance suitable for her social media content.

Desires

•	Trendy Services: Taylor desires access to trendy and creative hairstyling and makeup services that keep her looking fashion-forward.
•	Product Selection: She wishes to access a wide range of high-quality beauty products to enhance her beauty routine.
•	Instagram-Worthy Salon: Taylor wants a salon with a stylish and Instagram- worthy interior for creating visually appealing content.
•	Expert Guidance: She desires friendly and knowledgeable salon staff who can offer beauty tips, advice, and recommendations on the latest trends.
•	Social Media Promotions: Taylor would appreciate promotions and discounts for sharing her salon experiences on her social media platforms, helping her maintain her influencer status.


# Internal and external stakeholders 
# Internal stakeholders

Salon Owner
•	Role: The owner would provide the vision and direction for the salon, make strategic decisions, manage finances, and monitor the overall operations.
•	Expectations: Owners expect profitability, a strong and loyal customer base, effective management and marketing strategies.

Beauty Manager / Employer
•	Role: Manage appointments and carts of the clients, maintain client relationships, and contribute to the salon's success.
•	Expectations: Employees expect fair pay for what they do, opportunities for professional development, a safe and supportive work environment, and ability to view and conveniently manage customer appointments.

Administrator
•	Role: Handling inquiries, maintaining web platform, users and their roles to ensure the smooth operation of the system.
•	Expectations: They expect fair pay, a web platform for the administrator to work on with admin roles and powers and clear communication from management.


# External stakeholders

Clients
•	Role: Clients are the primary source of revenue for the salon. They receive various beauty and grooming services.
•	Expectations: Clients expect high-quality services, a pleasant and clean environment, skilled and friendly staff, reasonable pricing, appointment availability and awareness of promotion.


Suppliers
•	Role: Suppliers provide beauty products, equipment, and supplies essential for salon services.
•	Expectations: They expect regular orders and timely payments.


Competitors
•	Role: Identifying new and existing salons and their level of competition in the same geographic area.
•	Expectations: They expect fair competition, adherence to industry standards, and respect for each other's businesses.

# Installation
# You should already have these to run the project

Composer
Node.js
NPM
PHP
Sqlite (or you can use )MySQL
XAMPP or WAMP server can be used for PHP and MySQL.

# Clone the repo
git clone https://github.com/cb010982/ssp1_assignment_salon_zen

cd to where you downloaded the folder

# Run the following 
Composer Install
npm install
Create a new .env file and copy the .env.example file and past it to the .env file
Create a database and add the database credentials to the .env file
If you are using sqlite use laravel docs and follow the instructions https://laravel.com/docs/10.x/database#sqlite-configuration

# Run the migrations
php artisan migrate

# Run the project
php artisan serve
Type http://127.0.0.1:8000 on the url Of your web browser
