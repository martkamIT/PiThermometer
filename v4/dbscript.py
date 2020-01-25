import sqlite3 as lite
import w1thermsensor
import time

con = lite.connect('/var/www/html/project_MK_1/temp.db')
sensor = w1thermsensor.W1ThermSensor()

with con:

    cur = con.cursor()
    #cur.execute("CREATE TABLE temp(id INTEGER PRIMARY KEY AUTOINCREMENT, data INT, temperature INT)")
    #i = 1
    #while i < 20:
    sens_temp = sensor.get_temperature()
    dat_time = time.time()

        
    str = "INSERT INTO temp (data, temperature) VALUES ({}, {})"
    str = str.format(dat_time, sens_temp)
    #print(str)
    cur.execute(str)
    #i+=1

    
    
    