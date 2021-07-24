## Exocolony

### Getting Started
1. Install virtualbox and vagrant
2. `vagrant up`
3. `vagrant ssh`
4. `composer install`
5. `php artisan key:generate`
6. `sudo vi /etc/apache2/sites-available/000-default.conf`
7. Change both instances of `/var/www/public` to `/var/www/exo/public`
8. `sudo service apache2 restart`
9. import exo.sql db via heidisql and ssh tunnel.  See scotchbox.md for connection details.
10. Install `google-chrome` to export cards
11. visit `http://192.168.33.10`

See scotchbox.md and laravel 5.3 docs for more details
