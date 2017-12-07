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
- For the first time starting the server, run *npm install*
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
## Connect MySQL Workbench to Homestead
Use these parameters to connect MySQL workbench to the homestead database:
- Hostname: 192.168.10.10
- Username: homestead
- Password: secret
# Current Mach: I
All development must happen in the branch of the current mach. The mach represents the bootcamp generation.
