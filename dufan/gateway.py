import json

from nameko.rpc import RpcProxy
from nameko.web.handlers import http
from requests import Response
from werkzeug.wrappers import Response


class GatewayService:
    name = 'gateway'
    header = {
        "Access-Control-Allow-Origin": "*",
        "Access-Control-Allow-Methods": "GET, POST, OPTIONS, PUT, DELETE",
        "Access-Control-Allow-Headers": "Content-Type, Authorization",
        "Access-Control-Allow-Credentials": "true", 
    }
    atraksi = RpcProxy('atraksi_service')
    
    @http('GET', '/api/atraksi')
    def get_atraksi_info(self, request):
        result = self.atraksi.get_atraksi_info()
        return json.dumps(result)
    
    @http('GET', '/api/atraksi/paket/<int:id_paket>')
    def get_atraksi_paket_id(self, request, id_paket):
        result = self.atraksi.get_atraksi_paket_id(id_paket)
        return json.dumps(result)
    
    @http('GET', '/api/atraksi/paket')
    def get_atraksi_paket(self, request):
        result = self.atraksi.get_atraksi_paket()
        return json.dumps(result)
    
    @http('GET', '/api/atraksi/tutup/<string:tgls>')
    def get_atraksi_tutup(self, request, tgls):
        result = self.atraksi.get_atraksi_tutup(tgls)
        return json.dumps(result)

    @http('POST', '/api/eticket')
    def create_eticket(self, request):
        data = request.get_data(as_text=True)
        data = json.loads(data)
        paket_id = None
        jml_ticket = None
        booking_code = None
        tgl_booking = None
        try:
            paket_id = data['paket_id']
            jml_ticket = data['jml_ticket']
            booking_code = data['booking_code']
            tgl_booking = data['tgl_booking']
        except:
            return 400, "invalid format input"
        
        result = self.atraksi.create_eticket(paket_id, jml_ticket, booking_code, tgl_booking)
        return json.dumps(result)
    
    @http('PUT', '/api/eticket/<string:ticket_code>')
    def check_in(self, request, ticket_code):
        print(ticket_code)
        response = self.atraksi.check_in(ticket_code)
        return json.dumps(response)
        

    @http('DELETE', '/api/eticket/<int:eticket_id>')
    def delete_eticket(self, request, eticket_id):
        result = self.atraksi.delete_eticket(eticket_id)
        print(result)
        if "error" in result:
            return 400, json.dumps(result)
        else:
            return json.dumps(result)
        
    # @http('GET', '/room')
    # def get_rooms(self, request):
    #     rooms = self.hotel_rpc.get_all_room()
    #     return json.dumps(rooms)

    # @http('GET', '/room/<int:room_num>')
    # def get_room(self, request, room_num):
    #     room = self.hotel_rpc.get_room_by_num(room_num)
    #     if room == None:
    #         return 404, "Room Not Found"
    #     return json.dumps(room)
    # # # get info details of a particular room (identified by room_num)

    # # create a new room
    # @http('POST', '/room')
    # def create_room(self, request):
    #     data = request.get_data(as_text=True)
    #     data = json.loads(data)
    #     room_num = None
    #     room_type = None
    #     try:
    #         room_num = data['room_num']
    #         room_type = data['room_type']
    #     except:
    #         return 400, "invalid format input"
        
    #     response = self.hotel_rpc.add_room(data['room_num'], data['room_type'])
    #     return response['code'], response['response']
    
    # # toggle the status (0 to 1, or vice versa) of a particular room (identified by room_num)
    # @http('PUT', '/room/<int:room_num>')
    # def chage_status_room(self, request, room_num):
    #     response = self.hotel_rpc.change_room_status(room_num)
    #     return response['code'], response['response']

    # # delete a particular room (identified by room_num)
    # @http('DELETE', '/room/<int:room_num>')
    # def delete_room(self, request, room_num):
    #     response = self.hotel_rpc.delete_room(room_num)
    #     return response['code'], response['response']
