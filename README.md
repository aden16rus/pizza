## Install environment

_docker folder structure placed into ```docker-structure``` folder_
- copy project files to ```www``` folder
- configure ports and bd settings into docker-compose ```.env``` file
- terminal command ```docker-compose up -d``` to download and run containers

## Project installation

- copy project ```git clone https://github.com/aden16rus/pizza.git .``` 
- terminal command ```composer install```
- terminal command ```cp.env.example .env```
- terminal command ```php artisan key:generate```
- edit database connection credentials into ```.env``` file 
- migrate db tables and seed data by terminal command ```php artisan migrate:fresh --seed```
- create symbolic links for storage ```php artisan storage:link```
- it should works

```/admin``` - admin panel

login data to admin panel  
login: ```admin@admin.com``` 

password: ```password```

