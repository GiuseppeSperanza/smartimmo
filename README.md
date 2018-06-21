# Before start project, install composer (https://getcomposer.org/)
# And see phnix for the migrations (http://docs.phinx.org/en/latest/)

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


#Credentials users to test:

#1° user:
Email: supercase@immobiliare.local
Password: agenzia1

#2° user:
Email: tophome@immobiliare.local
Password: agenzia2