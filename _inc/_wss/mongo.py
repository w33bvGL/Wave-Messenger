import pymongo

client = pymongo.MongoClient("mongodb://localhost:27017/")
mongo_connect = client["Wave_messenger"]

print(client.list_database_names())
