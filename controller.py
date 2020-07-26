import json
import os
import time
import threading

from watchdog.observers.polling import PollingObserver as Observer
from watchdog.events import PatternMatchingEventHandler

#import RPi.GPIO as GPIO

def convertHexToRGB(hex):
    if len(hex) != 7 or hex[0] != "#":
        raise Exception("Not valid hex color")
    h = hex.lstrip('#')
    return tuple(int(h[i:i+2], 16) for i in (0, 2, 4))
def readData():
    with open('data.json') as f:
        return json.load(f)
def printData():
    data = readData()
    print("Enabled: {}, RGB Values: {}".format(data[0],convertHexToRGB(data[1])))
def watchJsonFile():
    class MyEventHandler(PatternMatchingEventHandler):
        def on_modified(self, event):
            super(MyEventHandler, self).on_modified(event)
            # FIXME python recognizes change, needs to take change and push to led lights
            printData()

    event_handler = MyEventHandler(patterns='dat*.json')
    my_observer = Observer()
    my_observer.schedule(event_handler, ".", recursive=True)
    my_observer.start()
    try:
        while True:
            time.sleep(1)
    except KeyboardInterrupt:
        my_observer.stop()
    my_observer.join()
x = threading.Thread(target=watchJsonFile)
x.start()