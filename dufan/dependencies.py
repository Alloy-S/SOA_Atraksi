from nameko.extensions import DependencyProvider

import mysql.connector
from mysql.connector import Error
from mysql.connector import pooling

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
        sql = "SELECT id AS paket_id, atraksi_id, type_id, title, deskripsi, fasilitas, cara_penukaran, syarat_dan_ketentuan, harga, harga_discount,kuota, masa_berlaku, is_refundable FROM pakets WHERE atraksi_id={0}".format(self.atraksi_id)
        cursor.execute(sql)
        for row in cursor.fetchall():
            data = row
            paket.append(data)
        cursor.close()
        result['paket'] = paket
        return result
    
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
