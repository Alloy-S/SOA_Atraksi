import json

from nameko.rpc import RpcProxy
from nameko.web.handlers import http


class GatewayService:
    name = 'gateway'

    atraksi = RpcProxy('atraksi_service')
    
    @http('GET', '/api/atraksi')
    def get_atraksi_info(self, request):
        result = self.atraksi.get_atraksi_info()
        return json.dumps(result)
    
    @http('GET', '/api/atraksi/paket')
    def get_atraksi_paket(self, request):
        result = self.atraksi.get_atraksi_paket()
        return json.dumps(result)
    
    @http('GET', '/api/atraksi/tgl')
    def get_atraksi_tutup(self, request):
        result = self.atraksi.get_atraksi_tutup()
        return json.dumps(result)
    
    @http('GET', '/api/atraksi/paket/<int:id>')
    def get_package_details(self, request, id):
        package_details = self.package_rpc.get_package_details(id)
        if package_details is None:
            return json.dumps({'error': 'Package not found'}), 404, {'Content-Type': 'application/json'}
        return json.dumps(package_details), 200, {'Content-Type': 'application/json'}
    


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
