# GUVI-TASK

https://github.com/SUHAS202/GUVI-TASK/assets/93062491/4e425400-f5c2-493f-9fe7-91dd1b8086c2

The new users should register themselves before logging in to view the profile. During the register process, the data will be stored both in MySQL and MongoDB. The user should register with a unique email and username.
Upon the submission if the details are correct a success response will be displayed. After successful registration, the user can now proceed with the login process. When the user enters the username and password
it will be checked with the username and password entered in the MySQL database. If it matches then the session of the user will be stored in the browser's local storage by generating a unique auth token. On successful
login, the user can see the profile. Based on the entered username the details of the user will be fetched from the MongoDB and displayed in the user profile page. By clicking the edit button the user can edit the profile data, which will also be updated in the MongoDB. After updating the profile the user can logout the profile by clicking the logout button. The session will be terminated in the local browser storage by clicking the logout button and the page will be redirected to the login page.
