# mv-bootcamp
This is the MakersValley Bootcamp  code repo. All codes from all bootcamps are stored in here and can easily be accessible. Master will always be a blank template with Laravel and AngularJS installed for the frontend and the backend.
# Frontend
## Intro
All UI/UX and other frontend related code are stored in here. Those working in the frontend will be work from here. This is preconfigured with a nodejs server.
## Tech Used
- AngularJS 1.x
- CSS3
- MaterializeCSS
- HTML5
## Requirements
To work in the backend you need to install the following:
- Node.js - https://nodejs.org/en/
## Getting Started
To start the server for the frontend:
- Navigate to the frontend folder with your terminal
- For the first time starting the server, run *npm init* then *npm install*
- Run **node index.js**
# Backend
## Intro
All logic, API codes and otehr backend related codes are storeid in here. Those working in the backend will work from here. This is preconfigured with homestead ready to create an nginx.
## Tech Used
- Laravel
- Homestead
- MySQL
## Requirements
- VirtualBox - https://www.virtualbox.org/wiki/Downloads
- Vagrant - https://www.vagrantup.com/
- MySQL Workbench - https://dev.mysql.com/downloads/workbench/
## Getting Started
To start the server for the backend:
- For the first time only, update your hosts file with this line- **192.168.30.10  bootcamp.mv** (Read about updating hosts file here https://www.howtogeek.com/howto/27350/beginner-geek-how-to-edit-your-hosts-file/)
- Navigate tot he backend folder with your terminal
- Run **vagrant up**
To work from the virtual machine to run server commands
- Run **vagrant ssh**

## Possible Issue I: Missing Homestead
If your first vagrant up returns "missing homestead files", you might need to download Composer manually. 
- https://getcomposer.org/doc/00-intro.md (If you don't have them installed, you might need to install Visual C++ as and download PHP as well).
- After installing Composer, from termin in the backend folder run
**composer require laravel/homestead --dev**
Then run
**php vendor/bin/homestead make**
for Windows/Linux
**vendor\\bin\\homestead make**

at this point you should be able to vagrant up your folder and continue 

## Possible Issue II: Missing SSH Key or Private Keys
If running vagrant up you cannot continue because you miss private keys, it's possible you need to generate them.
- From terminal run **ssh-keygen -t rsa -b 4096 -C "your_email@example.com"** 
use enter to generate them in the default path.
after you have them, vagrant up and vagrant ssh to check if your page is loading at bootcamp.mv.

In case you don't, you might still have issue mapping your keys. 
- In the backend folder, change the env.example file into .env using notepad (or similar)
from terminal run **php artisan key:generate**
- it should return a message telling you private keys were generated correctly.
Now from terminal on the backend folder run: vagrant roload, vagrant up, vagrant ssh and check bootcamp.mv


## Connect MySQL Workbench to Homestead
Use these parameters to connect MySQL workbench to the homestead database:
- Hostname: 192.168.30.10
- Username: homestead
- Password: secret
# Current Mach: I
All development must happen in the branch of the current mach. The mach represents the bootcamp generation.
