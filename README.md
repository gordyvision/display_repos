# display_repos
Use github API to display the most-starred public PHP projects

**Assumptions**
User knows how to use github to clone repository or download zip file and extract to a directory

User has basic knowledge of starting and stopping Docker containers

Database will not be used for multiple updates/table creations at the same time (single user app)

User has internet connection so cURL can access API URL

**Dependencies:**

**Linux:**
Docker and Docker Compose

**Debian-based:**
https://docs.docker.com/engine/install/debian/

https://docs.docker.com/compose/install/

**CentOS-based:**
https://docs.docker.com/engine/install/centos/

https://docs.docker.com/compose/install/

**Windows:**
Docker Desktop https://docs.docker.com/desktop/windows/install/

WSL 2 backend https://docs.docker.com/desktop/windows/wsl/

**Mac:**
Docker Desktop https://docs.docker.com/desktop/mac/install/

After dependencies are installed, get code from repository either by cloning or downloading and extracting zip file.
```
https://github.com/gordyvision/display_repos
```
**Linux:**
1. Open terminal
2. Navigate to directory with git code
3. sudo docker-compose up

**Windows/Mac:**
1. Open terminal
2. Navigate to directory with git code
3. docker compose up

**Platform independent:**
Please wait until everything is fully loaded and you see the following message in your terminal:
```
d: ready for connections. Version: '8.0.28'  socket: '/var/run/mysqld/mysqld.sock'  port: 3306  MySQL Community Server - GPL.
```

Open browser and go to http://127.0.0.1:8003/

The first time the app is opened, it will gather results from the github API, load the results into the database, and subsequently refresh the webpage.

Enjoy!

MySQL used for database
phpMyAdmin used for GUI support for DB

Ports used:
8003, 9906:3306, 8080:80

Web interface was implemented in PHP, Javascript/Jquery, Ajax, HTML, and Cascading Style Sheets (CSS).

