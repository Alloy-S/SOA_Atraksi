list REST API Atraksi:
- GET /api/atraksi -> mendapatkan info dari atraksi
- GET /api/atraksi/paket/<int:id_paket> -> mendapatkan info paket berdasarkan id paket
- GET /api/atraksi/paket -> mendapatkan semua list paket 
- GET /api/atraksi/tutup/<string:tgls> -> untuk mengecek atraksi tutup atau tidak
- GET /api/eticket/<string:booking_code> -> untuk mendapatkan ticket yang sudah ada berdasarkan booking code yang dimiliki
- GET /api/atraksi/paket/<int:id_paket>/check/<string:tgl> -> untuk mengecek ketersediaan paket
- POST /api/eticket -> untuk meminta pembutan eticket
- PUT /api/eticket/<string:ticket_code> -> untuk melakukan check-in
- DELETE /api/eticket/<string:ticket_code> -> untuk melakukan delete eticket (digunakan saat refund)

3.217.250.166:8003 -> dufan done
52.6.192.248:8003 -> balizoo done
44.222.16.57:8003 -> waterboom done
34.194.127.109:8003 -> seaworld
34.193.181.49:8003 -> prambanan
34.193.181.49:8007 -> trans studio
