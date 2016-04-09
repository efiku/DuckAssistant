##DuckAssistant

Don't use this :D
Checkout ours personal Assistant! 

This application helps manage your tasks.

## Features
* Add new users 
* Manage users
* Create tasks with specified options
* Manage tasks, assign tasks to users
* Add categories
* Manage Categories
* .... And more!

### How to install

**Downloading project and dependencies**
```
 1. git clone https://github.com/ucze/DuckAssistant.git 
 2. $ cd ./DuckAssistant/symfony
 3. composer install
 ```

**Set privileges to var/cache and var/logs directory**

_You ned to have ACL support enabled._

*Put in console this commands:*
```sh
$ HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
$ sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var/cache var/logs
$ sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var/cache var/logs
```

**Create missing schema and database**
```sh
$ php bin/console d:d:c
$ php bin/console d:s:u --force
// fixturies->  future update to composer:
$ php bin/console d:f:l
```
**Important links:**

*[Symfony permissions](http://symfony.com/doc/current/book/installation.html)*  
*[Symfony Doctrime](http://symfony.com/doc/current/book/doctrine.html)*  
