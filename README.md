##DuckAssistant

Simple Yellow Duck! *Work in progress...*

###How to install

**Downloading project and dependencies**
```
 1. git clone https://github.com/ucze/DuckAssistant.git 
 2. $ cd ./DuckAssistant/symfony
 3. composer install
 ```

**Set privileges to app/cache and app/logs directory**

_You ned to have ACL support enabled._

*Put in console this commands:*
```sh
$ HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
$ sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
$ sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
```

**Create missing schema and database**
```sh
$ php app/console doctrine:database:create
$ php app/console doctrine:schema:update --force
```
**Important links:**

*[Symfony permissions](http://symfony.com/doc/current/book/installation.html)*  
*[Symfony Doctrime](http://symfony.com/doc/current/book/doctrine.html)*  

### Authors:
Łukasz Micek, Krzysztof Pazdur
