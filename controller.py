import json
import os
import time
from watchdog.observers import Observer
from watchdog.events import PatternMatchingEventHandler

#import RPi.GPIO as GPIO

def convertHexToRGB(hex):
    h = hex.lstrip('#')
    return tuple(int(h[i:i+2], 16) for i in (0, 2, 4))

def readData():
    with open('data.json') as f:
        return json.load(f)
def printData():
    data = readData()
    print("Enabled: {}, RGB Values: {}".format(data[0],data[1]))

class MyEventHandler(PatternMatchingEventHandler):
    def on_modified(self, event):
        super(MyEventHandler, self).on_modified(event)
        print("Changed.")
        # FIXME python recognizes change, needs to take change and push to led lights
        printData()

event_handler = MyEventHandler(patterns='dat*.json')

my_observer = Observer()
my_observer.schedule(event_handler, ".", recursive=True)

printData()

my_observer.start()
try:
    while True:
        time.sleep(1)
except KeyboardInterrupt:
    my_observer.stop()
my_observer.join()