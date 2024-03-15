from flask import Flask
from flask_mysqldb import MySQL

app = Flask(__name__)

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = 'root'
app.config['MYSQL_DB'] = 'Wave_messenger'

mySql = MySQL(app)

mySqlConnect = mySql.connection

if __name__ == '__main__':
    app.run(debug=True)
