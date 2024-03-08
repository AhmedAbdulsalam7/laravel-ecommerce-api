# Laravel E-Commerce API

## About Project

This project is a Laravel-based E-Commerce API that includes user authentication with Laravel Passport and basic CRUD functionalities for managing users and products.

## Table of Contents

- Installation.
- Authentication.
- API Endpoints.
  Users
  Products
- Show Different Product Prices
- Usage
- Contributing


## Installation

1. Clone the repository:
   git clone AhmedAbdulsalam7/laravel-ecommerce-api
2. cd laravel-ecommerce-api
3. Install dependencies:
   composer install
4. Set up your environment file:
   you need include PASSPORT_SECRET_KEY in .env file, tou can generate secret key using openssl rand -base64 32 also you need (cp .env.example .env)
5. create database like mysql or postgreSQL then create user for the database and grant all Privilege
6. after create database you should fill the the info of connection atribute in .env file
7. php artisan passport:install
8. run php artisan serve

## Authentication

To use the API, you need to register and authenticate with Laravel Passport.

### Registration Endpoint:

POST http://127.0.0.1:8000/api/register

![image](https://github.com/AhmedAbdulsalam7/laravel-ecommerce-api/assets/89653282/841511de-8f97-44eb-acb4-3b93df7a621a)


### Login Endpoint:

POST http://127.0.0.1:8000/api/login

![image](https://github.com/AhmedAbdulsalam7/laravel-ecommerce-api/assets/89653282/f3da73a8-4b54-47f4-8ae0-544a43def47c)


## API Endpoints

### Users

#### Get All Users:

GET http://127.0.0.1:8000/api/users

![image](https://github.com/AhmedAbdulsalam7/laravel-ecommerce-api/assets/89653282/9bad405b-a6d9-4cc8-b30d-af4fc8ee1a35)


#### Get User by ID:

GET http://127.0.0.1:8000/api/users/2

![image](https://github.com/AhmedAbdulsalam7/laravel-ecommerce-api/assets/89653282/53ed2e31-6340-43d4-8d24-029aa60422ef)


#### Create User:

POST http://127.0.0.1:8000/api/users

![image](https://github.com/AhmedAbdulsalam7/laravel-ecommerce-api/assets/89653282/7be5f195-95f9-4c71-867e-8a41ecf0ff05)


#### Update User:

PUT http://127.0.0.1:8000/api/users/2

![image](https://github.com/AhmedAbdulsalam7/laravel-ecommerce-api/assets/89653282/d33a5447-e716-460f-b60a-b6001ef42688)


#### Delete User:

DELETE http://127.0.0.1:8000/api/users/3

![image](https://github.com/AhmedAbdulsalam7/laravel-ecommerce-api/assets/89653282/bead988d-919c-4755-aa94-7749504b6926)


### Products

#### Show Products: The Pricie of specific product Depend on type of user

GET http://127.0.0.1:8000/api/products

![image](https://github.com/AhmedAbdulsalam7/laravel-ecommerce-api/assets/89653282/b7c6df5e-bf94-4b06-ab8e-e81a5f633406)


#### Get Product by ID:

GET http://127.0.0.1:8000/api/products/2

![image](https://github.com/AhmedAbdulsalam7/laravel-ecommerce-api/assets/89653282/0cca84d9-d69e-439e-b208-2c06a402faf9)


#### Create Product:

POST http://127.0.0.1:8000/api/products

![image](https://github.com/AhmedAbdulsalam7/laravel-ecommerce-api/assets/89653282/a51a7957-a6f5-42a0-baca-65760e8c4a3f)


#### Update Product:

PUT http://127.0.0.1:8000/api/products/1

![image](https://github.com/AhmedAbdulsalam7/laravel-ecommerce-api/assets/89653282/dceb1c22-d2cf-465c-ac5b-8f6f4dee9fea)


#### Delete Product:

DELETE http://127.0.0.1:8000/api/products/3

![image](https://github.com/AhmedAbdulsalam7/laravel-ecommerce-api/assets/89653282/6a790ede-8827-4e85-93c9-aa9b9f13b70d)



## Usage

Register a user using the /api/register endpoint.

Login to obtain an access token using the /api/login endpoint.

Use the obtained access token to authenticate requests to protected endpoints.

Explore and interact with the API using the provided CRUD endpoints.
