from nameko.rpc import rpc

import dependencies
import json

class RoomService:

    name = 'atraksi_service'

    database = dependencies.Database()
    
    @rpc
    def get_atraksi_info(self):
        atraksi = self.database.get_atraksi_info()
        # print(type(atraksi))
        if atraksi != None:
            atraksi['photo'] = self.database.get_atraksi_photo()
            atraksi['jam_buka'] = self.database.get_atraksi_jam_buka()
            return atraksi
        else: 
            return {
                "error": "Atraksi tidak tersedia",
            }
    
    @rpc
    def get_atraksi_paket(self):
        atraksi = self.database.get_atraksi_paket()
        # print(type(atraksi))
        return atraksi

    @rpc
    def delete_eticket(self, eticket_id):
        return self.database.delete_eticket(eticket_id)
    
    # @rpc
    # def get_all_room_type(self):
    #     room_types = self.database.get_all_room_type()
    #     return room_types

#     @rpc
#     def get_all_room(self):
#         rooms = self.database.get_all_room()
#         return rooms

#     @rpc
#     def get_room_by_num(self, num):
#         room = self.database.get_room_by_num(num)
#         return room

# # Method to add a room
#     @rpc
#     def add_room(self, room_num, room_type):
#         existRoom = self.database.get_room_by_num(room_num)
#         if existRoom != None:
#             return {
#                 'code': 400,
#                 'response': "Room sudah ada"
#             }
#         validType = self.database.check_room_type(room_type)
#         if validType['code'] != 200 :
#             return validType
        
#         room = self.database.add_room(room_num, room_type)
#         return room

# # Method to change a room's status (0 to 1, or vice versa)
#     @rpc
#     def change_room_status(self, room_num):
#         room = self.database.get_room_by_num(room_num)
#         if room == None:
#             return {
#                 'code': 404,
#                 'response': "room tidak ditemukan"
#             }
#         response = self.database.change_room_status(room_num, room['status'])
        
#         return response  

# # Method to delete a room
#     @rpc
#     def delete_room(self, room_num):
#         existRoom = self.database.get_room_by_num(room_num)
#         if existRoom == None:
#             return {
#                 'code': 400,
#                 'response': "room tidak ada"
#             }
#         response = self.database.delete_room(room_num)
#         return response

# Notes: you may replace room_num with id
