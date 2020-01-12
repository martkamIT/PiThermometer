import w1thermsensor

sensor = w1thermsensor.W1ThermSensor()
sens_temp = sensor.get_temperature()

file = open("file.txt","a")
file.truncate(0)
file.write(str(sens_temp))
file.close()
