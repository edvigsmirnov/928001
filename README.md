This API is secured with a key authentication. It stores 4 main methods:
1. Get all users with their music
2. Get music of a one user by user ID
3. Update music information of a selected album by ID
4. Delete piece of music and all of its relations to other users.

Migrations and seeders generate three tables with many-to-many relations and a mock data.
Users table, Music table and Pivot table. Mock data is generated randomly.
Access to data is organized through Repository pattern.

To setup the project you need to install Docker

Open the project and run
./vendor/bin/sail up

To update/regenerate mock data run
./vendor/bin/sail artisan migrate:fresh --seed

laravel_api_test.postman_collection.json is an exported collection of API methods in Postman.

Authentication is made simple, using custom made Middleware and a token that is stored if a config/services/api. To access API put it into parameters of a query as a "token" parameter. Or add a header "Bearer=$token".


