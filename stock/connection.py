import psycopg2
import os
import bcrypt


def check_password(password):
    salt = b'$2b$12$Djf8e6we2/mi4WFiU0tybO'
    hashed = b'$2b$12$Djf8e6we2/mi4WFiU0tybOLGHNx6.qCeL8Wnh9YBROhD3jY0W9ZEa'

    password = password.encode('utf-8')
    hash = bcrypt.hashpw(password, salt)

    if hash == hashed:
        print("Access granted")
    else:
        print("Access denied")

def connection(password):

    host = 'localhost' 
    dbname = 'postgres'
    user = 'postgres' 
    port = 5432

    try:
        conn = psycopg2.connect(
            host = host,
            dbname = dbname,
            user = user,
            password = password,
            port = port
        )

        conn.autocommit = True 
        
        return conn

    except Exception as error:
        print(error)
        return None

