from flask import Flask, render_template
from flask_socketio import SocketIO, emit

app = Flask(__name__)
app.config['SECRET_KEY'] = 'secret!'
socketio = SocketIO(app)

@socketio.on('message')
def handle_message(message):
    print('Received message:', message)
    emit('response', message)
    
if __name__ == '__main__':
    socketio.run(app, host='localhost', port=4040, debug=True)
