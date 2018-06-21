# Before start project, install composer (https://getcomposer.org/)
# And see phnix for the migration (http://docs.phinx.org/en/latest/)

# enter into project
 ~/cd smartimmo

# install dependencies before start
composer install

# run dev-server port:8000
composer run server

# run new migration 
composer run migrate

# rollback migrations 
composer run rollback

# run test
composer run test