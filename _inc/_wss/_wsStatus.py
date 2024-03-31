import asyncio
import uvloop
import websockets
import json

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
            data = json.loads(message)
           
            if "friends" in data:
                await notify_online_friends(user_id)
                await select_all_online_users(user_id, data)
    except websockets.exceptions.ConnectionClosedOK:
        del connected_clients[user_id]
        print(f"User {user_id} disconnected.")
        await notify_offline_friends(user_id)
        print("Current connected users:", list(connected_clients.keys()))

async def notify_online_friends(user_id):
    status_message = {str(user_id): "online"}
    print("User is online:", status_message)
    
    for friend_id, friend_socket in connected_clients.items():
        if friend_id != user_id:
            await send_message(json.dumps(status_message), friend_socket)

async def notify_offline_friends(user_id):
    status_message = {str(user_id): "offline"}
    print("User is offline:", status_message)
    
    for friend_id, friend_socket in connected_clients.items():
        if friend_id != user_id:
            await send_message(json.dumps(status_message), friend_socket)

async def select_all_online_users(user_id, data):
    friends = data.get("friends", [])
    online_status = {}
    for friend in friends:
        friend_id = friend.get("friendId")
        if friend_id is not None:
            online_status[str(friend_id)] = "online" if friend_id in connected_clients else "offline"
    await send_message(json.dumps(online_status), connected_clients[user_id])


async def start_server():
    async with websockets.serve(new_client_connected, "192.168.1.4", 9992):
        await asyncio.Future()

if __name__ == '__main__':
    asyncio.run(start_server())
