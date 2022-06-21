# Perfect Numbers

Small REST API developed in Laravel that recibes an array [start, end] and returns all the perfect numbers in that range.


## Installation

For the installation you need docker and git previously installed.

1. Clone this repository

```bash
git clone https://github.com/FacundoSanabria/PerfectNumbers.git
```

2. Change directory to the newly created one
```bash
cd PerfectNumbers
```

3. build docker container 
```bash
COMPOSE_DOCKER_CLI_BUILD=1 DOCKER_BUILDKIT=1 docker-compose build
```

3. run docker container
```bash
docker-compose up
```

## Usage

Docker will create an Apache service listening to port 80 by default.

Exposed endpoint will be on /api/perfect_numbers

This  endpoint accepts a GET request with one parameter: a "range" array containing exactly 2 elements: the start and the end of the desired range:


> range = ['start'=5 , 'end'=6] 


For example a valid request will be:

> http://localhost/api/perfect_numbers?range%5Bstart%5D=6&range%5Bend%5D=600

range[start] and range[end] only accept positive, integer numbers.

## Autor
Sanabria Facundo