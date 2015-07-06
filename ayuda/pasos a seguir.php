sudo add-apt-repository ppa:ondrej/php5-oldstable
sudo apt-get update
sudo apt-get upgrade
sudo apt-get install apache2 -y
sudo apt-get install mysql-server mysql-client
     sudo gedit /etc/mysql/my.cnf
sudo apt-get install php5 -y
     sudo apt-cache search php
sudo apt-get install php5-curl php-pear php5-imagick php5-imap php5-mcrypt libssh2-php php5-dev php5-gd php5-mcrypt -y

sudo apt-get install php-pear
sudo apt-get install php5-dev
sudo apt-get install php5 libapache2-mod-php5

sudo apt-get install php5-xcache
sudo apt-cache search php5
sudo apt-get install php-fpm
sudo apt-get install php5-curl php-pear php5-imagick php5-imap php5-mcrypt libssh2-php php5-dev php5-gd php5-mcrypt -y
sudo apt-get install phpmyadmin                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             

  ----------------------------------------------------------------------------------------------
     
*Instalar redis-server

		  NONONO **** sudo apt-get install redis
	  
	  sudo apt-add-repository ppa:chris-lea/redis-server
	  sudo apt-get update
	  sudo apt-get install redis-server
	  sudo /etc/init.d/redis-server stop
	  sudo /etc/init.d/redis-server start

*Instalar igbinary
	http://www.calinrada.com/installing-redis-php-redis-extension-igbinary-in-ubuntu-12-04/
	 sudo add-apt-repository ppa:chris-lea/redis-server
	 sudo apt-get update
	 sudo apt-get install python-software-properties
	 sudo pecl install igbinary


*Install PHP Redis extension
	 cd
	 git clone git://github.com/nicolasff/phpredis.git
	 cd phpredis/
	 phpize
	 ./configure --enable-redis-igbinary
         make
         sudo make install

  *Configurar phpredis
    ls /usr/lib/php5/20121212/
    sudo gedit /etc/php5/apache2/php.ini 
    sudo gedit /etc/php5/cli/php.ini
	---------	
	  extension=/usr/lib/php5/20121212/igbinary.so
  	  extension=/usr/lib/php5/20121212/redis.so

    sudo service apache2 stop
    sudo service apache2 start
  


* instalar npm y nodejs (https://www.digitalocean.com/community/tutorials/how-to-install-node-js-on-an-ubuntu-14-04-server)
  
	  sudo apt-get update
	  sudo apt-get install npm
	  curl -sL https://deb.nodesource.com/setup | sudo bash -

	  sudo apt-get install nodejs
	  sudo apt-get install build-essential

		     No lo probe pero debe resultar(http://www.sysads.co.uk/2014/05/install-latest-node-js-npm-ubuntu-14-04-13-10/)
		  sudo add-apt-repository ppa:chris-lea/node.js
		  sudo apt-get update
		  sudo apt-get install nodejs
		  sudo npm install -g npm





-----------------------crear sitios virtuales----------------------------------------------------------------------

      ls /etc/apache2/sites-available/000-default.conf
      sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf_original

      sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/inventarios.dev.com.conf





sudo gedit /etc/apache2/sites-available/000-default.conf

/****       /etc/apache2/sites-available/000-default.conf               ***///
<VirtualHost *:80>
  DocumentRoot "/var/www/html"
  ServerName localhost
  ServerAlias localhost
  <Directory /var/www/html>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order allow,deny
    Allow from all
  </Directory>
  ErrorLog ${APACHE_LOG_DIR}/error.log
  CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

sudo gedit /etc/apache2/sites-available/inventarios.dev.com.conf

/****       /etc/apache2/sites-available/inventarios.dev.com.conf               ***///
<VirtualHost *:80>
  DocumentRoot /var/www/html/inventarios
  ServerName inventarios.dev.com
  ServerAlias www.inventarios.dev.com
  <Directory /var/www/html/inventarios>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order allow,deny
    Allow from all
  </Directory>
  ErrorLog ${APACHE_LOG_DIR}/error.log
  CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>



sudo a2ensite 000-default.conf
sudo a2ensite inventarios.dev.com.conf
sudo ls /etc/apache2/sites-available
sudo ls /etc/apache2/sites-enabled/
sudo a2enmod rewrite


** ********************otro
      sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/motolinia.dev.com.conf
      sudo gedit /etc/apache2/sites-available/motolinia.dev.com.conf


<VirtualHost *:80>
  DocumentRoot /var/www/html/motolinia
  ServerName motolinia.dev.com
  ServerAlias www.motolinia.dev.com
  <Directory /var/www/html/motolinia>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order allow,deny
    Allow from all
  </Directory>
  ErrorLog ${APACHE_LOG_DIR}/error.log
  CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

sudo a2ensite motolinia.dev.com.conf

sudo ls /etc/apache2/sites-available
sudo ls /etc/apache2/sites-enabled/

sudo a2enmod rewrite

       **********************************************************


sudo gedit /etc/apache2/apache2.conf
/****      /etc/apache2/apache2.conf   ****/////////


<Directory /var/www/html/>
  Options Indexes FollowSymLinks
  AllowOverride None
  Require all granted
</Directory>

<Directory /var/www/html/inventarios/>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>


<Directory /var/www/html/motolinia/>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>



   ********************************************

sudo pico /etc/hosts

/****       /etc/hosts               ***///

127.0.0.1 localhost
127.0.1.1 genaro    ***(este es el nombre de la PC)
127.0.0.1 inventarios.dev.com

#127.0.0.3  

# The following lines are desirable for IPv6 capable hosts
::1     ip6-localhost ip6-loopback
fe00::0 ip6-localnet
ff00::0 ip6-mcastprefix
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters



***************************Configurar el php******************************     

 sudo gedit /etc/php5/apache2/php.ini 

file_uploads = On
upload_tmp_dir = "C:\xampp\tmp"

upload_max_filesize = 200M
post_max_size = 180M

max_execution_time = 360
max_input_time = 120
memory_limit = 128M



config-inc.php 
$cfg['ExecTimeLimit'] = 300;     


***************************sublime******************************     

http://www.taringa.net/post/linux/17250975/Como-instalar-Sublime-Text-3-en-Ubuntu.html
http://www.taringa.net/post/linux/17895625/Instalar-Sublime-Text-3-en-ubuntu-12-04-y-14-04.html

sudo add-apt-repository ppa:webupd8team/sublime-text-3 
sudo apt-get update 
sudo apt-get install sublime-text-installer

***************************Instalar .RAR ******************************     

SUDO apt-get install rar

***************************Instalar FILEZILLA ******************************     

sudo apt-get install filezilla     
***************************bajar el inventarios******************************     
   

     git clone https://github.com/estrategasdigitales/Chansey inventarios
     chmod -R +777 inventarios/


----------------------------INSTALAR FOREVER--------------------------------------------------------
	  https://github.com/foreverjs/forever

sudo npm install forever -g
npm install forever-monitor
	cd /var/www/html/nodejs
	forever start -l forever.log -o out.log -e err.log  cisockServer.js

	forever list

	*nota: cambiarle de nombre a los “.log”, porque los q están señalados ya se usaron, para el seguimiento de los acontecimientos de notificaciones anteriores.

*********************Accesos a server y BD
Clave del server.
sftp://45.55.85.45
PORT: 22
user: root
clave: iniciativa5458

Acceso de BD
http://45.55.85.45/phpmyadmin
user: root
clave: root
----------------------------------------------------------------------------------------

git@github.com:estrategasdigitales/Chansey.git

16:27:ac:a5:76:28:2d:36:63:1b:56:4d:eb:df:a6:48 (type ssh-rsa)



forever
smart git
grunt
gulp

************************smart-git*******************************************************

https://github.com/GeoRemindMe/GeoRemindMe_Web/wiki/How-to-set-up-your-repository
https://help.github.com/articles/generating-ssh-keys/

cd ~/.ssh
ssh-keygen -t rsa -C "osmel_calderon@yahoo.com.ar"



http://rooteando.com/git-smartgit-repositorios-remotos/
http://www.syntevo.com/smartgit/download?file=smartgit/smartgit-6_5_9.deb

http://www.syntevo.com/smartgit/
http://es.slideshare.net/MoatMerlinSoft/tutorial-git-y-smart-git
Este **https://stringinarray.wordpress.com/2014/02/06/uso-basico-de-smartgit/

generar clave ssh
	https://git-scm.com/book/es/v1/Git-en-un-servidor-Generando-tu-clave-p%C3%BAblica-SSH

		cd ~/.ssh
		ls
			authorized_keys2  id_dsa       known_hosts
			config            id_dsa.pub


		id_dsa: es tu clave privada
		id_dsa.pub: es tu clave pública.
			NOTA ('ssh-keygen'):
				Si no tienes esos archivos (o no tienes ni siquiera la carpeta '.ssh'), has de crearlos; 
				utilizando un programa llamado 'ssh-keygen', que viene incluido en el paquete SSH de los sistemas Linux/Mac 
				o en el paquete MSysGit en los sistemas Windows:



ssh-keygen

	6a:a6:33:6b:36:1f:da:8d:9b:a0:b8:8a:a4:6d:29:85 estrategas@estrategas5
	The key's randomart image is:
	+--[ RSA 2048]----+
	|                 |
	|                 |
	|                 |
	|                 |
	| .      S        |
	|E .    .         |
	| o .. =          |
	|=oo.*B =         |
	|B+oo+**..        |
	+-----------------+
cat ~/.ssh/id_rsa.pub
ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCq++6H36myK1ONWj/vPI56aOJOS8yVEpGnmMG1xC+hZgnDK71YX/txFQwC4tTC9Pbf8vGDq0ph8ESlkfNkkKCSlBY09CGcGd89lF51NDZDKl0RToLsYT2ojo7mAsQemyI4eHNOjaRbvYLN2UYCK6NdR0TH5OFgcuxrGVbmFRtA5Xuu9Fts67PVjQ8tQGigXLvgzsXbEL0q/LZXU/92/bLzAZAUrtmNcJPRc5mVd1HJM60Eu0CDOarlZ/eCFnLaUciSKR9fxB9nZpMUqgr4qvxe1MIl/N4Njd4qgUHev8EP/SKHdAgcqDVMZXjK7u8qL0fmjNQaulW4RgkwpIL4G8Jx estrategas@estrategas5


54:e5:5b:7c:47:73:ca:0a:b4:14:f7:c9:b4:f5:cf:34 osmel_calderon@yahoo.com.ar

https://github.com/estrategasdigitales/Chansey.git
git@github.com:estrategasdigitales/Chansey.git

ssh://osmel_calderon@yahoo.com.ar:estrategasdigitales/Chansey.git
https://osmel_calderon@yahoo.com.ar:estrategasdigitales/Chansey.git
https://osmel@github.com:estrategasdigitales/Chansey.git
*******************************************************************************

sudo npm install forever -g
sudo npm install forever-monitor
sudo forever start -l forever.log -o out.log -e err.log cisockServer.js
*******************************************************************************

npm install socket.io
npm install redis



Problemas con "mcrypt"   http://aryo.lecture.ub.ac.id/easy-install-php-mcrypt-extension-on-ubuntu-linux/
    apt-get --reinstall install php5-mcrypt
    sudo gedit /etc/php5/apache2/php.ini 
    sudo gedit /etc/php5/cli/php.ini 
        /usr/lib/php5/20121212/mcrypt.so
        /usr/lib/php5/20121212/igbinary.so


los ficheros tienen obligatoriamente q tener todos los permisos
  sudo chmod -R +777 qr_code/
  sudo chmod -R +777 app/logs/


104.236.91.215

/**************  cambio de configuraciones *************//
    js/socket.js   104.236.91.215:8080

app/config/config.php   104.236.91.215:8080


*****************************

    cd /var/www/html/inventarios/nodejs/
    ls
    cd node_modules/
    ls
    cd ..
    node cisockServer.js 
    sudo node cisockServer.js 
    clear
    history 





https://underc0de.org/foro/programacion-web-247/redis-como-session-handler-en-php/
http://iferminmontilla.com/usando-redis-como-backend-de-sesiones-en-php.html
https://sonnguyen.ws/install-php-redis-ubuntu/



