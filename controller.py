import json
import RPi.GPIO as GPIO

def convertHexToRGB(hex):
    h = hex.lstrip('#')
    return tuple(int(h[i:i+2], 16) for i in (0, 2, 4))

with open('data.json') as f:
  data = json.load(f)

print(convertHexToRGB(data[1]))