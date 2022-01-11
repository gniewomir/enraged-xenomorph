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

Term "Interactions" is used as replacement for "User Interface", which I consider a bit misleading.

## Dependency graph 

![Architecture](/docs/architecture.png?raw=true "Architecture")
(disclaimer: graph is generated automatically, skips some elements for readability and shows present dependencies - not intended)

# Installation

The project is dockerized and configured to work with docker-compose

 - to run application 
   - `docker-compose up -d`
   - connect to application container `docker-compose exec application bash`
     - inside run `composer project:reset`
     - inside run `composer test`
 - app should be accessible on `http://localhost:3160`
 - play with it running `composer quality` from time to time

# TODO

* Setup branching to not work on main
* Figure out docker layer caching in Github actions
  * [Build images on GitHub Actions with Docker layer caching](https://evilmartians.com/chronicles/build-images-on-github-actions-with-docker-layer-caching)
* Setup Github action for testing 
* Setup Github action for deployment
* Replace examples with ie. ISIN fetching to get a better feel on what works and what not 
* Implement security to get a better feel on what works and what not