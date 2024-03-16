import asyncio
import websockets
import json
import mongo

# active users List
connected_clients = {}

async def send_message(message: str, receiver: websockets.WebSocketServerProtocol):
    await receiver.send(message)

async def new_client_connected(client_socket: websockets.WebSocketServerProtocol, path: str):
    print("New Client Connected")
    # Получаем идентификатор пользователя из пути запроса
    user_id = path.split("=")[-1]  # Извлекаем только числовой идентификатор из пути запроса
    # Добавляем соединение в словарь, используя user_id в качестве ключа
    connected_clients[user_id] = client_socket
    # Печатаем текущий список пользователей
    print("Current connected users:", list(connected_clients.keys()))

    try:
        while True:
            message = await client_socket.recv()

            print("Client Message:", message)
            data = json.loads(message)
            recipient = data.get("recipient")
            sender = data.get("sender")
            message_text = data.get("message")

            mongo.mongo_connect.chat_messages.insert_one({"recipient": recipient, "sender": sender, "message": message_text})
            # Отправляем сообщение всем клиентам, кроме отправителя
            for user, socket in connected_clients.items():
                if socket != client_socket:
                    await send_message(message, socket)
    except websockets.exceptions.ConnectionClosedOK:
        # Если соединение закрыто, удаляем клиента из словаря
        del connected_clients[user_id]
        # Печатаем обновленный список пользователей
        print("Current connected users:", list(connected_clients.keys()))

async def start_server():
    # Запускаем сервер WebSocket на localhost:9991
    await websockets.serve(new_client_connected, "localhost", 9991)

if __name__ == '__main__':
    # Запускаем цикл событий asyncio
    asyncio.get_event_loop().run_until_complete(start_server())
    asyncio.get_event_loop().run_forever()
