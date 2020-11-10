You have an upcoming meetup where you need the participants to RSVP so that you can prepare appropriate accommodations and transport facilities. The participants can bring up to two guests along with them.

You also need an admin screen that contains list of all the participants which can be searched based on their names and locality

The task is to build below 3 apis preferably using Java SpringBoot, Aps .Net Core, Go Lang frameworks (Gin, Revel, Beego), PHP frameworks (Laravel, Lumen, Code Ignitor) or any other framework. You could build your own database schema using Mysql or sqlite for the below entities

Register API
/participants POST

Name
Age
D.O.B (JS Date object)
Profession (can be Employed/Student)
Locality
Number of Guests (0-2)
Address (multiline input upto 50 characters)
It takes this data to register a participant and stores in the database and return success or failure basis the execution.

List API
/participants GET

This API should return the list of participants registered. You can also look at building pagination to support a long list

Update API
/participants PUT

This API will help us update the data for a certain participant.