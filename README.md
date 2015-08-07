## FWRD.in

Track click-through from social media to third-party destination with GA.

#### Problem and Solution

Creating good content to share on social media platforms to drive traffic to your site is an art form. From technical perspective things are pretty straight forward (most of the time), i.e.: during creation of the post  the platform [Facebook / Twitter / LinkedIn] picks up content from link destination, users see the post, link is clicked, user visits the site, GA fires a pageview event attributing the visit to your campaign and social platform.  
Trouble is, when you want to share a Wired.com article about your revolutionary new product with the world, you do not own the landing page (e.g. Wired.com) and thus cannot put your GA code there to track visits and success of your campaign. In GA you'll see traffic from Wired.com, but you wouldn't know if your post/share/tweet generated any part of it.
[FWRD.in](http://fwrd.in) let's you do that by generating a link, which when visited by [supported social media platforms](#supported-social-media-platforms) will 302-redirect it to the destination site (allowing it to scrape [open graph tags](http://ogp.me/) and the content of the article). Yet when human visits the generated link, it quickly sends a GA pageview event to a configured property (e.g. UA-1234567-1) and sends user to the destination.  
Of course, you could pay some advertising agency for use of their platform to get this insight. Or you can roll out your own service that does same thing for [$5/month running on Digital Ocean](https://www.digitalocean.com/?refcode=85a36e97d86a).  
Feel free to use [FWRD.in](http://fwrd.in) to try things out and for low volume tracking, but assume no uptime/SLA guarantees.

### Usage

php:

    php -S 0.0.0.0:8080



### Docker

[![](https://badge.imagelayers.io/anapsix/fwrd.in:latest.svg)](https://imagelayers.io/?images=anapsix/fwrd.in:latest)

[![](https://img.shields.io/badge/docker%20hub-ready-green.svg?style=flat-square)](https://hub.docker.com/r/anapsix/fwrd.in/)

run:

    docker pull anapsix/fwrd.in
    docker run -it -p 8080:8080 fwrd.in


build:

    docker build --no-cache -t fwrd.in github.com/anapsix/fwrd.in

### Supported Social Media Platforms

- Facebook
- Twitter
- LinkedIn
- Google+

### Credits

created by [@dysfunct](https://github.com/dysfunct), adapted by [@anapsix](https://github.com/anapsix)
