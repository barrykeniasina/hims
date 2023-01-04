FROM mcr.microsoft.com/mssql/server:2019-latest

#USER root
#RUN mkdir -p /usr/src/app
#WORKDIR /usr/src/app
#COPY . /usr/src/app
#RUN chmod +x /usr/src/app/*.sh

#USER mssql
#ENTRYPOINT /bin/bash /usr/src/app/entrypoint.sh

# Create database
#RUN /opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -Q "CREATE DATABASE ${DB_DATABASE}"
#RUN /opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -Q "CREATE LOGIN ${DB_USERNAME} WITH PASSWORD = '${DB_PASSWORD}'"
#RUN /opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -Q "ALTER SERVER ROLE sysadmin ADD MEMBER [${DB_USERNAME}]"
#RUN /opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -d "${DB_DATABASE}" -Q "CREATE USER ${DB_USERNAME} for login ${DB_USERNAME}"
#RUN /opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -d "${DB_DATABASE}" -Q "GRANT CONTROL ON DATABASE::${DB_DATABASE} TO ${DB_USERNAME} WITH GRANT OPTION"
#RUN /opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -d "${DB_DATABASE}" -Q "CREATE SCHEMA ${DB_SCHEMA}"
#RUN unset DB_DATABASE DB_USERNAME DB_PASSWORD DB_PORT DB_SCHEMA
