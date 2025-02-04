HNG12 Stage 0 Public API

Description

This is a simple public API built for the HNG12 Stage 0 task. It returns basic information such as the registered email, current date and time (ISO 8601 format), and the GitHub URL of the project.

Setup Instructions

Prerequisites

PHP (>=8.1)

Composer

Laravel 10+

Installation Steps

### Clone the repository

git clone https://github.com/adetola-dotbat/hng-stag-0

### Navigate into the project directory

cd your-repo

### Install dependencies

composer install

### Start the Laravel development server

php artisan serve

## The API will be available at:

http://127.0.0.1:8000/api/info

API Documentation

Documentation link: https://documenter.getpostman.com/view/20742399/2sAYX2NQ8B

Endpoint

GET /api/info

Response Format (200 OK)

{
"email": "adewolenoah3@gmail.com",
"current_datetime": "2025-01-31T05:05:05Z",
"github_url": "https://github.com/adetola-dotbat/hng-stag-0"
}
Looking for skilled PHP developers? Check out: - [Skilled Laravel Developer](https://hng.tech/hire/php-developers).
