# Enraged Xenomorph - DDD/CQRS Symfony Application Boilerplate

This project is very opinionated attempt to compile a bit of experience, few good practices, some practical solutions to common problems & automation to create robust boilerplate for bootstrapping of domain-driven Symfony applications.   

* Layered architecture 
* CQRS
* DDD
* Symfony 6.0
* PHP 8.1
* Docker
* php-cs-fixer, phpstan, psalm, deptrac

# Architecture

Described in architecture.yaml (deptrac configuration)

## Dependency graph 

![Architecture](/docs/architecture.png?raw=true "Architecture")
(disclaimer: graph is generated automatically and defined not only by deptrac configuration but also by what dependencies are present at this time - not intended)

## Installation

The project is dockerized and configured to work with docker-compose

 - to run application 
   - `docker-compose up -d`
   - connect to application container `docker-compose exec application bash`
     - inside run `composer project:reset`
     - inside run `composer test`
 - app should be accessible on `http://localhost:3160`
 - play with it running `composer quality` from time to time
