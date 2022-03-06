# display_repos
Use github API to display the most-starred public PHP projects

Dependencies:

Linux:
Docker and Docker Compose
Debian-based:
https://docs.docker.com/engine/install/debian/
https://docs.docker.com/compose/install/

CentOS-based:
https://docs.docker.com/engine/install/centos/
https://docs.docker.com/compose/install/

Windows:
Docker Desktop https://docs.docker.com/desktop/windows/install/
WSL 2 backend https://docs.docker.com/desktop/windows/wsl/

Mac:
Docker Desktop https://docs.docker.com/desktop/mac/install/

After dependencies are installed, grab this code from git and put in a directory.

Linux:
1. Open terminal
2. Navigate to directory with git code
3. sudo docker-compose up

Windows/Mac:
1. Open terminal
2. Navigate to directory with git code
3. docker compose up

Platform independent:
Please wait until everything is fully loaded and you see the following message in your terminal:
d: ready for connections. Version: '8.0.28'  socket: '/var/run/mysqld/mysqld.sock'  port: 3306  MySQL Community Server - GPL.

Open browser and go to http://127.0.0.1:8003/

The first time the app is opened, it will gather results from the github API, load the results into the database, and subsequently refresh the webpage.

Enjoy!
