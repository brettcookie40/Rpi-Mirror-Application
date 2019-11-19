# Program written by Brett W. Husar
# This program is meant to test the mini USB microphone peripheral device
# it records for an indefinite amount of time or until the user uses Ctrl+C
# the .wav file is saved in the same file as voice.wav

import subprocess

subprocess.call(["arecord","--device=hw:1,0","--format","S16_LE","--rate","44100","-V", "mono","-c1","voice.wav"])
