FROM alpine
MAINTAINER Anastas Dancha <anapsix@random.io>
RUN apk upgrade --update && \
    apk add nginx
COPY www/* /app/
COPY config/fwrd.nginx /etc/nginx/conf.d/fwrd
COPY config/nginx.conf /etc/nginx/nginx.conf
WORKDIR /app
EXPOSE 8080
CMD ["nginx","-c","/etc/nginx/nginx.conf"]
