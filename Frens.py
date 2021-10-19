import time
import keyboard
import random
import datetime
import pymssql
#import Adafruit_BMP.BMP280 as BMP280
from Project1.BotKaEi import BKE
from Project1.SelectFren import createFriend, pickFriend
from Project1.globalFunctions import databaseConnectie, convertIfInt
from Project1.loginFile import login, createAccount
from Project1.question import questions

menuItemsMax = 4
loggedIn = False
pickedFriend = False
friendID = 0
userName = ""


def birthdayMessage():
    birthdayMessagelist = databaseConnectie("SELECT VerjaardagsBericht from VerjaardagsBerichten")
    print(random.choice(birthdayMessagelist))


def temperature():
    pass
    # sensor = BMP280.BMP280()
    # print('De temperatuur = {0:0.2f} *C'.format(sensor.read_temperature()))
    # print('De luchtdruk = {0:0.2f} Pa'.format(sensor.read_pressure()))
    # print('Altitude = {0:0.2f} m'.format(sensor.read_altitude()))
    # print('Sealevel Pressure = {0:0.2f} Pa'.format(sensor.read_sealevel_pressure()))


def emotion():
    list = databaseConnectie("SELECT e.Bericht FROM Vriend v LEFT JOIN Emotie e ON v.Emotie = e.EmotieLevel WHERE v.Naam = '" + str(friendName) + "'")
    print(list[0])


def date():
    now = datetime.datetime.now()
    print("De huidige datum en tijd is: ")
    print(now.strftime("%d-%m-%Y %H:%M:%S"))


def lightlevel():
    print("Dit laat het Lichtniveau zien")


def facts():
    list = databaseConnectie("SELECT * FROM Feitjes")
    print(random.choice(list))


def endIt():
    global loggedIn
    loggedIn = False


def switch_answer(answer):
    switch = {
        1: temperature,
        2: emotion,
        3: date,
        4: lightlevel,
        5: facts,
        6: BKE,
        7: birthdayMessage(),
        8: endIt
    }
    func = switch.get(answer, lambda: "Antwoord niet geaccepteerd")

    time.sleep(1/5)
    func()


while not loggedIn:
    menulist = ["1: Login", "2: Maak nieuw account aan"]
    answer = convertIfInt(questions(menuItemsMax, menulist))
    if answer == 1:
        list = login(loggedIn)
        loggedIn = list[0]
        userName = list[1]
    elif answer == 2:
        list = createAccount()
        loggedIn = list[0]
        userName = list[1]
    else:
        print("Unexpected result, code modified probably")

while not pickedFriend:
    menulist = ["1: maak een nieuwe vriend aan", "2: selecteer een bestaande vriend"]
    answer = convertIfInt(questions(menuItemsMax, menulist))
    if answer == 1:
        list = createFriend(userName, pickedFriend)
        pickedFriend = list[0]
        friendID = list[1]
    elif answer == 2:
        list = pickFriend(menuItemsMax, userName)
        pickedFriend = list[0]
        friendID = list[1]
    else:
        print("Unexpected result, code modified probably")

while loggedIn:
    menulist = ["1: Check temperatuur", "2: Check emotie", "3:Check datum", "4: Check lichtniveau",
                "5: Vertel een feitje", "6: Speel boter kaas en eieren", "7: Verjaardag!", "8: Exit Friend"]
    answer = convertIfInt(questions(menuItemsMax, menulist))
    switch_answer(answer)
