FROM nginx:latest
#MAINTEINER AnyKey <makc@webmonet.ru>

ARG NGINX_BACKEND_HOST
ADD default.conf /etc/nginx/conf.d/default.conf
#RUN env
#RUN sed -i 's/app/'"$NGINX_BACKEND_HOST"'/g' /etc/nginx/conf.d/default.conf
#RUN cat /etc/nginx/conf.d/default.conf
#USER www-data
WORKDIR /var/www/html
