# RetBul 

[RetBul](https://retbul.sniafas.eu) (Retrieval Building) is an online image retrieval platform for building recognition in urban environments. The platform is implemented as a demo application aside of the MSc dissertation in terms of master-isicg http://master-isicg.teiath.gr/ program.

### Installation ###
  
**Retbul** is a Laravel 5.2 project, while the image retrieval engine is implemented with [OpenCV](http://opencv.org/)

* `git clone https://github.com/sniafas/Retbul.git projectname`
* `cd projectname`
* `composer install`
* `php artisan key:generate`
* Create a database and inform *.env*
* `php artisan migrate --seed` to create and populate tables

**Note** You have to install the project only in the Apache */var/www/* directory, not in a *virtual* one, in order to execute the python scripts.
