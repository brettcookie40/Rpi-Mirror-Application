# Program written by Brett W. Husar
# This program will utilize the functions of the piCamera V2
# It will take 3 consecutive pictures and store them in a folder on the Rpi

from picamera import PiCamera
from time import sleep

camera = PiCamera()

camera.start_preview(alpha=200)

#It is important to sleep for at least 2 seconds before capturing an image,
#because it gives the camera time to sense the light levels

for i in range(3):
	sleep(5)
	camera.capture('/home/pi/Desktop/MirrorImages/image%s.jpg' % i)

camera.stop_preview()
