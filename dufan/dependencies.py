from nameko.extensions import DependencyProvider

import mysql.connector
from mysql.connector import Error
from mysql.connector import pooling
from datetime import datetime
import string
import random

class DatabaseWrapper:

    connection = None
    atraksi_id = 1

    def __init__(self, connection):
        self.connection = connection
    
    def get_atraksi_photo(self):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        # print(self.atraksi_id)
        sql = "SELECT placeholder, image FROM photos WHERE atraksi_id={0}".format(self.atraksi_id)
        cursor.execute(sql)
        for row in cursor.fetchall():
            data = row
            result.append(data)
        cursor.close()
        return result
    
    def get_ticket_type(self, type_id):
        cursor = self.connection.cursor(dictionary=True)
        result = None
        # print(self.atraksi_id)
        sql = "SELECT name FROM types WHERE id={0}".format(type_id)
        cursor.execute(sql)
        result = cursor.fetchone()
        cursor.close()
        return result
    
    def get_atraksi_jam_buka(self):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        # print(self.atraksi_id)
        sql = "SELECT hari, waktu, is_open FROM jam_bukas WHERE atraksi_id={0}".format(self.atraksi_id)
        cursor.execute(sql)
        for row in cursor.fetchall():
            data = row
            result.append(data)
        cursor.close()
        return result
    
    def get_atraksi_info(self):
        cursor = self.connection.cursor(dictionary=True)
        result = None
        sql = "SELECT id AS atraksi_id, title, slug, deskripsi, info_penting, highlight, provinsi, kota, lowest_price, discount_price, is_active FROM atraksis WHERE id={0} AND is_active=true".format(self.atraksi_id)
        # print(sql)
        cursor.execute(sql)
        for row in cursor.fetchall():
            data = row
            # data['photo'] = get_atraksi_photo(4)
            # result.append(data)
            result = data
        cursor.close()
        return result
    
    def get_atraksi_paket(self):
        cursor = self.connection.cursor(dictionary=True)
        result = {}
        paket = []
        sql = "SELECT id AS paket_id, atraksi_id, type_id, title, deskripsi, fasilitas, cara_penukaran, syarat_dan_ketentuan, harga,kuota, is_refundable FROM pakets WHERE atraksi_id={0}".format(self.atraksi_id)
        cursor.execute(sql)
        for row in cursor.fetchall():
            data = row
            paket.append(data)
        cursor.close()
        result['paket'] = paket
        return result
    
    def get_atraksi_paket_id(self, id_paket):
        cursor = self.connection.cursor(dictionary=True)
        result = {}
        paket = None
        sql = "SELECT id AS paket_id, atraksi_id, type_id, title, deskripsi, fasilitas, cara_penukaran, syarat_dan_ketentuan, harga,kuota, is_refundable FROM pakets WHERE id={0}".format(id_paket)
        cursor.execute(sql)
        paket = cursor.fetchone()
        cursor.close()
        result['paket'] = paket
        return result
    
    def get_atraksi_tutup(self):
        cursor = self.connection.cursor(dictionary=True)
        sql =  "SELECT `tgl` FROM `tgl_tutups`"
        rows = cursor.fetchall()
        tutup = [row['tgl'] for row in rows]
        cursor.close()
        return tutup
    
    def generate_random_string(self, length=6):
        letters = string.ascii_uppercase + string.digits
        result = ''.join(random.choice(letters) for i in range(length))
        # print(result)
        return result
    
    def create_eticket(self, paket_id, jml_ticket, booking_code, jenis, tgl_booking):
        cursor = self.connection.cursor(dictionary=True)
        created_at = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
        valid_at = tgl_booking
        ticket_code = self.generate_random_string()
        response = None
        try:
            sql = "INSERT INTO etickets (booking_code, ticket_code, paket_id, jenis, created_at, valid_at, check_in) VALUES ('{0}', '{1}', {2}, '{3}', '{4}', '{5}', NULL);".format(booking_code, ticket_code, paket_id, jenis, created_at, valid_at)
            # print(sql);
            cursor.execute(sql)
            self.connection.commit()
            
            response = {
                'ticket_code': ticket_code,
                'booking_code': booking_code,
                'paket_id': paket_id,
                'jenis': jenis,
                'created_at': created_at,
                'valid_at': valid_at,
            }
        except mysql.connector.Error as e:
            
            self.connection.rollback()
            response = {
                'code': 400,
                'response': e
            }
            
        return response
    
    def __del__(self):
        self.connection.close()


class Database(DependencyProvider):

    connection_pool = None

    def __init__(self):
        try:
            self.connection_pool = mysql.connector.pooling.MySQLConnectionPool(
                pool_name="database_pool",
                pool_size=10,
                pool_reset_session=True,
                host='localhost',
                database='atraksi_soa',
                user='root',
                password=''
            )
        except Error as e :
            print ("Error while connecting to MySQL using Connection pool ", e)

    def get_dependency(self, worker_ctx):
        return DatabaseWrapper(self.connection_pool.get_connection())
