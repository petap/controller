[![Build Status](https://travis-ci.org/petap/controller.svg?branch=master)](https://travis-ci.org/petap/controller)
[![codecov.io](http://codecov.io/github/petap/controller/coverage.svg?branch=master)](http://codecov.io/github/petap/controller?branch=master)

#MVC controller implementation

This is an implementation of MVC controller which is suitable for most tasks.
It is next level of [petap/crud](https://github.com/petap/crud).

## Installation

Installation of petap/controller uses composer.

```sh
php composer.phar require petap/controller
```

or add to your composer.json
```json
"require" : {
  "petap/controller": "^0.0.1"
}
```

## Quick start

Almost all controllers have similar workflow:

- Validate request
- Validate data
- Run Domain service
- Build response
That solution provide this

Go to [petap/laminas-mvc-controller](https://github.com/petap/laminas-mvc-controller) to see controller implementation for Laminas MVC.

##Dev

####Build
```bash
docker build --build-arg UID=$(id -u) --build-arg GID=$(id -g) -t controller:latest .
```
####Enter to container
```bash
docker run -ti -v $(pwd):/var/www/controller controller su --shell=/bin/bash www-data
```

####Run test

```bash
docker run -ti -v $(pwd):/var/www/controller controller su --shell=/bin/bash www-data -c "composer install --no-scripts --no-interaction --optimize-autoloader && ./vendor/bin/phpunit"
```

