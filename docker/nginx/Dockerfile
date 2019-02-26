FROM debian:jessie

RUN apt-get update && apt-get install -y \
    nginx

ADD nginx.conf /etc/nginx/
ADD testg.conf /etc/nginx/sites-available/
ADD upstream.conf /etc/nginx/conf.d/

RUN ln -s /etc/nginx/sites-available/testg.conf /etc/nginx/sites-enabled/testg
RUN rm /etc/nginx/sites-enabled/default

RUN usermod -u 1000 www-data

CMD ["nginx"]

EXPOSE 80
EXPOSE 443
