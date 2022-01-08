# Xenomorph - DDD/CQRS Symfony Application Boilerplate

This project is very opinionated attempt to compile a bit of experience, few good practices, some practical solutions to common problems & automation to create robust boilerplate for bootstrapping of domain-driven Symfony applications.   

* Layered architecture 
* CQRS
* DDD
* Symfony 6.0
* PHP 8.1
* Docker
* php-cs-fixer, phpstan, psalm, deptrac

# Architecture [work in progress]

Described in depfile.yaml (deptrac configuration)

## Installation

The project is dockerized and configured to work with docker-compose

 - to run application 
   - `docker-compose up -d`
   - connect to application container `docker-compose exec application bash`
     - inside run `composer project:reset`
     - inside run `composer test`
 - app should be accessible on `http://localhost:3160`
 - 
