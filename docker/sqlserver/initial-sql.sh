##/opt/mssql-tools/bin/sqlcmd -S localhost -U sa -P Yukon900 -d master -i setup.sql

/opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -Q "CREATE DATABASE ${DB_DATABASE}"
/opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -Q "CREATE LOGIN ${DB_USERNAME} WITH PASSWORD = '${DB_PASSWORD}'"
/opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -Q "ALTER SERVER ROLE sysadmin ADD MEMBER [${DB_USERNAME}]"
/opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -d "${DB_DATABASE}" -Q "CREATE USER ${DB_USERNAME} for login ${DB_USERNAME}"
/opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -d "${DB_DATABASE}" -Q "GRANT CONTROL ON DATABASE::${DB_DATABASE} TO ${DB_USERNAME} WITH GRANT OPTION"
/opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -d "${DB_DATABASE}" -Q "CREATE SCHEMA ${DB_SCHEMA}"
/opt/mssql-tools/bin/sqlcmd -S tcp:127.0.0.1,${DB_PORT} -U sa -P "${DB_PASSWORD}" -d "${DB_DATABASE}" -Q "ALTER USER [${DB_USERNAME}] WITH DEFAULT_SCHEMA = ${DB_SCHEMA}"
##unset DB_DATABASE DB_USERNAME DB_PASSWORD DB_PORT DB_SCHEMA
