import asyncio
import uvloop
import websockets
import json
import mongo
from concurrent.futures import ThreadPoolExecutor

asyncio.set_event_loop_policy(uvloop.EventLoopPolicy())

connected_clients = {}

async def send_message(message: str, receiver: websockets.WebSocketServerProtocol):
    await receiver.send(message)

async def new_client_connected(client_socket: websockets.WebSocketServerProtocol, path: str):
    print("New Client Connected")
    user_id = int(path.split("=")[-1]) 
    connected_clients[user_id] = client_socket
    print("Current connected users:", list(connected_clients.keys()))

    try:
        while True:
            message = await client_socket.recv()

            print("Client Message:", message)
            #menak recipientna petq :)  data vorpes argument functiayi
            data = json.loads(message)
            recipient = data.get("recipient")
            
            # namak@ to eta heto nor message save ara eti etqan karevor chi! 
            await save_message_to_mongo(data)

            if recipient in connected_clients:
                await send_message(message, connected_clients[recipient])
               
                
    except websockets.exceptions.ConnectionClosedOK:
        del connected_clients[user_id]
        print("Current connected users:", list(connected_clients.keys()))
        
async def save_message_to_mongo(data):
    recipient = data.get("recipient")
    sender = data.get("sender")
    message_text = data.get("message")
    timestamp = data.get("timestamp")

    mongo.mongo_connect.chat_messages.insert_one({"recipient": recipient, "sender": sender, "message": message_text, "timestamp": timestamp})

async def start_server():
    with ThreadPoolExecutor(max_workers=10) as executor:
        # localhost:9991
        async with websockets.serve(new_client_connected, "localhost", 9991):
            await asyncio.Future()

if __name__ == '__main__':
    asyncio.run(start_server())
