import cv2
import random
import time

def save(stackedImage , name=None):
    if name==None:
        date = time.localtime()
        count = random.randint(1000,9999)
        name ="Scanned/"+str(date.tm_mday) + "-" + str(date.tm_hour) + "-" + str(date.tm_min) +"-"+str(count)+".jpg"

    #print("Image saved")
    cv2.imwrite(name, stackedImage)



