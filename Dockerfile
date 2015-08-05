FROM alpine
MAINTAINER Anastas Dancha <anapsix@random.io>
RUN apk upgrade --update && \
    apk add php-cli
COPY index.html style.css t.js t.php favicon.ico /app/
WORKDIR /app
EXPOSE 8080
CMD ["php","-S","0.0.0.0:8080"]
