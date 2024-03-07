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

### Login Endpoint:

    POST http://127.0.0.1:8000/api/login

## API Endpoints

### Users

#### Get All Users:

GET /api/users

#### Get User by ID:

#### Create User:

#### Update User:

#### Delete User:

### Products

#### Get All Products:

#### Get Product by ID:

#### Create Product:

#### Update Product:

#### Delete Product:

### Show Different Product Prices



## Usage

Register a user using the /api/register endpoint.

Login to obtain an access token using the /api/login endpoint.

Use the obtained access token to authenticate requests to protected endpoints.

Explore and interact with the API using the provided CRUD endpoints.
