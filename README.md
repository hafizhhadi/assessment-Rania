# Rania Assessment

Project Description : 
### Tasks
- Develop simple Laravel To Do List that consist CRUD (Create, Read, Update, Delete)
- On this simple project you may create model, create view, update view, register view, list to do view, create controller, create route
- You may using MySQL to store data
- You may feel to use any kind of front end framework, such as bootstrap, tailwind, etc
- There have button can add new to do list
- There have button to remove and edit to do list from listing
- There have button that change status to do list
- There have button that can update to do list

## Implementation
- Laravel default bootstrap Scaffold - Authentication
- Integrate Jobick template - Fancy css template
- CRUD - Create, Read, Update, Delete
- Form Request Validation - Complex validation scenarios
- Language file - Dynamic messages
- Seeder - Generate dummy data
- Enums - Getting all keys and values or constant
- ORM Relation - Managing relationship with tables
- Scope - Encapsulate the syntax used to execute a query 
- Accessors - Format Eloquent attributes when retrieving them from a model
- Observer - Listening for many events on a given model
- Uuid route - Not expose default incrementing IDs
- Policy - Organized authorization logic around a particular model or resource
- Queue - Defer the processing of a time consuming task of email

## Live Test
https://rania.hafizhadi.cloud/

- Deploy with AWS EC2 (LEMP Stack)
- Database by AWS RDS
- Subdomain managed by Cloudflare

## Local Test
### Getting Started Setup the project
### Clone the project
https://github.com/hafizhhadi/assessment-Rania.git

### Dependency
#### Windows
- Laragon
- > PHP 8.1
- MYSQL 5 > Greater

#### Mac
- Homebrew
- > PHP 8.1
- MYSQL 5 > Greater

### Installation
#### via Terminal
- composer install
- cp .env.example .env
- php artisan key:generate
- go to mysql > create db
- go .env > DB_DATABASE = 'PUT DB THAT YOU CREATED IN PREVIOUS STEP'
- php artisan migrate:fresh -seed
- php artisan serve
- setup SMTP Mailtrap (for finished task notification)
- credentials - username: user@user.com password: password

#### Setup Mailtrap
- https://mailtrap.io/
- Login or register mailtrap
- Add project 
- Select created project
- Select SMTP settings and go to integrations
- Select Laravel 7+ 
- Copy the values and paste in the .env file in the root directory of your project.
