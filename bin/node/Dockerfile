FROM node:10.23.1-alpine
MAINTAINER #

ENV NODE_ENV dev

WORKDIR /var/www/html

# To handle 'not get uid/gid'
RUN npm config set unsafe-perm true

RUN npm install apidoc@0.26.0 -g
