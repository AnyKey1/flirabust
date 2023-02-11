FROM mariadb:10.5.9

VOLUME /var/lib/mysql

#COPY docker-entrypoint.sh /usr/local/bin/
#RUN ln -s usr/local/bin/docker-entrypoint.sh / # backwards compat
#ENTRYPOINT ["docker-entrypoint.sh"]

RUN echo ${MYSQL_ROOT_PASS} | mysql -u root --password -e 'CREATE DATABASE ${MYSQL_DB} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;'

RUN echo ${MYSQL_ROOT_PASS} | mysql -u root --password -e 'CREATE USER "${MYSQL_USER}"@"localhost" IDENTIFIED BY '${MYSQL_PASS}';'
RUN echo ${MYSQL_ROOT_PASS} | mysql -u root --password -e 'GRANT ALL PRIVILEGES ON ${MYSQL_DB}.* TO "${MYSQL_USER}"@"localhost";
RUN echo ${MYSQL_ROOT_PASS} | mysql -u root --password -e 'FLUSH PRIVILEGES'

EXPOSE 3306
CMD ["mysqld"]
