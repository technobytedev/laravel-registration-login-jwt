# Project Title

Technical Exam: User Registration API and Login API

## Table of Contents

- [Introduction](#introduction)
- [Project Structure](#project-structure)
- [API Implementation](#api-implementation)
  - [User Registration API](#user-registration-api)
  - [Login API](#login-api)
- [Postman Collection](#postman-collection)
- [Sample Data](#sample-data)
- [Getting Started](#getting-started)
- [Usage](#usage)
- [Testing](#testing)

## Introduction

The project is the development of RESTful Registration API and Login API, purpose of this are for registertration of user and also login. This a backend project.

## Project Structure

The project is organized, and the codes written so that it follows the good software design principles and SOLID principles.
I have seperated the logic part from the UserController, and that makes it readable and maintainable.

## API Implementation

### User Registration API

Will run in this local link http://127.0.0.1:8000/register
this are the parameters needs to supply as raw json:
{   
    "name"   : "cedric",
    "email" : "cedricisubol@gmail.com",
    "password" : "123456"
}
expected result when succesful is:
{
    "status": 201,
    "message": "User registered successfully",
    "data": {
        "name": "cedric",
        "email": "cedricisubol@gmail.com",
        "updated_at": "2024-01-06T08:16:16.000000Z",
        "created_at": "2024-01-06T08:16:16.000000Z",
        "id": 15
    }
}
example error message:
{
    "status": 401,
    "message": {
        "email": [
            "The email has already been taken."
        ]
    }
}


### Login API

Will run in this local link http://127.0.0.1:8000/login

this are the parameters needs to supply as raw json:

{   
    "email" : "cedricisubol@gmail.com",
    "password" : "123456"
}

expected result when succesful is:
{
    "status": 200,
    "message": "Login successful",
    "data": {
        "jwt-token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9. example token",
        "user": {
            "name": "cedric"
        }
    }
}

example error message:
{
    "status": 401,
    "message": "Login failed"
}


## Postman Collection

attached in the email

## Sample Data

raw json format

For registration api
{   
    "name"   : "cedric",
    "email" : "cedricisubol@gmail.com",
    "password" : "123456"
}
For login api
{   
    "email" : "cedricisubol@gmail.com",
    "password" : "123456"
}

## Getting Started

install composer
install xampp 8
php v8.1.6
create db in phpmyadmin name as : home_buyer

using a respository:
https://github.com/technobytedev/laravel-registration-login-jwt

run composer install
run php artisan serve


## Usage

php artisan serve --to run

POST REQUEST to this API using postman or other:
http://127.0.0.1:8000/login
http://127.0.0.1:8000/register


## Testing

In postman, make a request 
http://127.0.0.1:8000/login  --for login
http://127.0.0.1:8000/register  --for registration

header should be Content-Type: application/json

refer the expected result for success and error mentioned above



thank you for reading the simple documentation.
end