## FWRD.in

For when you need to transparently 302 redirect social bots to original content, yet want record pageviews in GA.

### Usage

php:

    php -S 0.0.0.0:8080



### Docker

run:

    docker pull anapsix/fwrd.in
    docker run -it -p 8080:8080 fwrd.in


build:

    docker build --no-cache -t fwrd.in github.com/anapsix/fwrd.in


### Credits

created by [@dysfunct](https://github.com/dysfunct), adapted by [@anapsix](https://github.com/anapsix)
