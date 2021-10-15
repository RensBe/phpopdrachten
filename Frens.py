import time
import keyboard
import random
import pymssql
import Adafruit_CharLCD
import Adafruit_GPIO.PCF8574 as PCF
import RPi.GPIO as GPIO

menuItemsMax = 4
loggedIn = False
pickedFriend = False


def displayOnBoard():
    LCD = PCF.PCF8574(address=0x27)
    LCD.setup(5, 0)
    LCD.output(5, 0)

    lcd_rs = 4
    lcd_en = 7
    d4, d5, d6, d7 = 0, 1, 2, 3
    cols, lines = 20, 4

    SW1 = 4
    SW2 = 16
    SW3 = 10
    SW4 = 9
    GPIO.setmode(GPIO.BCM)
    GPIO.setup(SW1, GPIO.IN, pull_up_down=GPIO.PUD_UP)
    GPIO.setup(SW2, GPIO.IN, pull_up_down=GPIO.PUD_UP)
    GPIO.setup(SW3, GPIO.IN, pull_up_down=GPIO.PUD_UP)
    GPIO.setup(SW4, GPIO.IN, pull_up_down=GPIO.PUD_UP)

    positionInMenu = 0
    MessageToPrint = "-->"
    while True:
        for i in range(menuItemsMax):
            if i < len(menulist):
                if len(menulist) <= positionInMenu + i:
                    positionInMenu -= len(menulist)
                elif positionInMenu <= len(menulist) * -1:
                    positionInMenu += len(menulist)
                if i != menuItemsMax:
                    MessageToPrint += menulist[positionInMenu + i] + "\n   "
                else:
                    MessageToPrint += menulist[positionInMenu + i]

        lcd = Adafruit_CharLCD(lcd_rs, lcd_en, d4, d5, d6, d7, cols, lines, gpio=LCD)
        lcd.clear()
        lcd.message(MessageToPrint)
        try:
            while True:
                if GPIO.input(SW1) == GPIO.LOW:
                    positionInMenu -= 1
                    break
                if GPIO.input(SW2) == GPIO.LOW:
                    positionInMenu += 1
                    break
                if GPIO.input(SW3) == GPIO.LOW:
                    pass
                if GPIO.input(SW4) == GPIO.LOW:
                    if positionInMenu < 0:
                        chosen = positionInMenu + len(menulist) + 1
                    elif positionInMenu > len(menulist):
                        chosen = positionInMenu - len(menulist)
                    else:
                        chosen = positionInMenu + 1
                    return chosen
        except KeyboardInterrupt:
            lcd.clear()
            GPIO.cleanup()


def questions(menuItemsMax, menulist):
    positionInMenu = 0
    MessageToPrint = "-->"
    while True:
        for i in range(menuItemsMax):
            if i < len(menulist):
                if len(menulist) <= positionInMenu + i:
                    positionInMenu -= len(menulist)
                elif positionInMenu <= len(menulist) * -1:
                    positionInMenu += len(menulist)
                MessageToPrint += "   " + menulist[positionInMenu + i]


        while True:
            if keyboard.read_key() == "enter":
                if positionInMenu < 0:
                    chosen = positionInMenu + len(menulist) + 1
                elif positionInMenu > len(menulist):
                    chosen = positionInMenu - len(menulist)
                else:
                    chosen = positionInMenu + 1
                return chosen
            elif keyboard.read_key() == "down":
                positionInMenu += 1
                break
            elif keyboard.read_key() == "up":
                positionInMenu -= 1
                break


def convertIfInt(enteredValue):
    try:
        enteredValue = int(enteredValue)
    except:
        enteredValue = 0
    return enteredValue


def databaseConnectie(SQLQuery):
    list = []
    conn = pymssql.connect(server='project-mijn-vriend.database.windows.net', port=1433,
                           database='Project_MijnVriend', user='mijnvriend@project-mijn-vriend',
                           password='Raspberrypi69')
    cursor = conn.cursor()
    cursor.execute(SQLQuery)
    for row in cursor:
        list.append(row)
    conn.commit()
    conn.close()
    return list


def createAccount():
    global userName
    global loggedIn
    list = databaseConnectie("SELECT * FROM Gebruiker;")
    while True:
        time.sleep(1/5)
        input()
        userName = input("Voer hier je gebruikersnaam in")
        unique = True
        for lUser in list:
            if userName == lUser[0] or userName == "":
                print("Gebruikersnaam wordt al gebruikt, probeer een andere")
                unique = False
        if unique:
            password = input("Voer hier je wachtwoord in")
            loggedIn = True
            break
    sqlQuery = "INSERT INTO Gebruiker (GebruikersNaam, Wachtwoord) VALUES('" + userName + "', '" + password + "')"
    print(databaseConnectie(sqlQuery))


def login():
    global userName
    global loggedIn
    while not loggedIn:
        list = databaseConnectie("SELECT GebruikersNaam, Wachtwoord FROM Gebruiker")
        input()
        userName = input("Voer hier je gebruikersnaam in")
        password = input("Voer hier je wachtwoord in")
        for lUser in list:
            if userName == lUser[0] and password == lUser[1]:
                loggedIn = True
                break
        if not loggedIn:
            print("gebruikersnaam of wachtwoord is fout")


def pickFriend():
    global friendName
    global pickedFriend

    list = databaseConnectie("SELECT v.Naam FROM GebruikerVriend gv LEFT JOIN Vriend v ON gv.VriendID = v.VriendID WHERE gv.GebruikersNaam = '" + userName + "'")
    if len(list) > 0:
        while not pickedFriend:
            input()
            answer = convertIfInt(questions(menuItemsMax, list))
            friendName = list[answer - 1]
            pickedFriend = True
    else:
        print("Maak eerst een vriend aan voordat je een vriend probeert te kiezen")


def createFriend():
    global friendName
    global pickedFriend
    list = databaseConnectie("SELECT v.Naam FROM GebruikerVriend gv LEFT JOIN Vriend v ON gv.VriendID = v.VriendID WHERE gv.GebruikersNaam = '" + userName + "'")

    while not pickedFriend:
        pickedFriend = True
        input()
        friendName = input("Voer hier de naam van de nieuwe vriend in!")
        if len(list) > 0:
            for vNaam in list:
                if friendName == vNaam or friendName == "":
                    pickedFriend = False
        if pickedFriend:
            Query = "INSERT INTO Vriend (VriendID, Naam, Hygiëne, Honger, Verjaardag, Leeftijd, Emotie) VALUES(2, '" + friendName + "', 3, 3, CAST( GETDATE() AS Date), 0, 3)"
            print(Query)
            databaseConnectie(Query)
            break


def humidity():
    print("Dit laat de luchtvochtigheid zien")


def temperature():
    print("Dit laat de Temperatuur zien")


def emotion():
    print("Dit laat de Emotie zien")


def date():
    print("Dit laat de Datum zien")


def lightlevel():
    print("Dit laat het Lichtniveau zien")


def facts():
    print("Dit verteld een feitje")


def BKE():
    def checkIfSituation(inputs, checkFor, checkWin):
        global amountExist, empty

        def reset():
            global amountExist, empty
            amountExist = 0
            empty = -1

        # Check rows
        for row in range(3):
            reset()
            for column in range(row * 3, (row * 3) + 3):
                if inputs[column] == checkFor:
                    amountExist = amountExist + 1
                elif inputs[column] == " ":
                    empty = column
            if amountExist > 1 and empty > -1 and not checkWin:
                return empty
            elif amountExist > 2 and checkWin:
                return 1

        # Check columns
        for column in range(3):
            reset()
            for row in range(3):
                if inputs[column + (row * 3)] == checkFor:
                    amountExist = amountExist + 1
                elif inputs[column + (row * 3)] == " ":
                    empty = column + (row * 3)
            if amountExist > 1 and empty > -1 and not checkWin:
                return empty
            elif amountExist > 2 and checkWin:
                return 1

        # Check diagonals
        diagonal1 = [0, 4, 8]
        diagonal2 = [2, 4, 6]
        diagonals = [diagonal1, diagonal2]

        for diagonal in diagonals:
            reset()
            for cell in diagonal:
                if inputs[cell] == checkFor:
                    amountExist = amountExist + 1
                elif inputs[cell] == " ":
                    empty = cell
            if amountExist > 1 and empty > -1 and not checkWin:
                return empty
            elif amountExist > 2 and checkWin:
                return 1

    def startGame():
        global selected
        inputs = [" ", " ", " ", " ", " ", " ", " ", " ", " "]
        selected = 0
        while True:
            # Player turn
            noAnswer = True
            while noAnswer:
                displayBKE(inputs, selected)
                while True:
                    if keyboard.read_key() == "enter":
                        time.sleep(1/5)
                        break
                    elif keyboard.read_key() == "up":
                        if selected > 2:
                            selected -= 3
                        displayBKE(inputs, selected)
                        time.sleep(1/5)
                    elif keyboard.read_key() == "down":
                        if selected < 6:
                            selected += 3
                        displayBKE(inputs, selected)
                        time.sleep(1/5)
                    elif keyboard.read_key() == "left":
                        if selected != 0 or selected != 3 or selected != 6:
                            selected -= 1
                        displayBKE(inputs, selected)
                        time.sleep(1/5)
                    elif keyboard.read_key() == "right":
                        if selected != 2 or selected != 5 or selected != 8:
                            selected += 1
                        displayBKE(inputs, selected)
                        time.sleep(1/5)
                if selected >= 0 and selected < 9:
                    if inputs[selected] == " ":
                        inputs[selected] = "X"
                        noAnswer = False
                    else:
                        print("Deze plek is al ingevuld")
                else:
                    print("\nGetal buiten bereik")
            # Bots turn
            winPos = checkIfSituation(inputs, "O", False)
            losePos = checkIfSituation(inputs, "X", False)
            if winPos is not None:
                inputs[winPos] = "O"
            elif losePos is not None:
                inputs[losePos] = "O"
            else:
                emptyInputs = []
                for i in range(len(inputs)):
                    if inputs[i] == " ":
                        emptyInputs.append(i)
                if len(emptyInputs) != 0:
                    inputs[random.choice(emptyInputs)] = "O"

            # Check if a party has won
            if checkIfSituation(inputs, "X", True):
                print("Jij hebt gewonnen!")
                displayBKE(inputs, -1)
                time.sleep(1/5)
                input("Druk op enter om terug naar het menu te gaan\n")
                return
            elif checkIfSituation(inputs, "O", True):
                print("Vriend heeft het spel gewonnen!")
                displayBKE(inputs, -1)
                time.sleep(1/5)
                input("Druk op enter om terug naar het menu te gaan\n")
                return

            emptyValue = False
            for inp in inputs:
                if inp == " ":
                    emptyValue = True
            if emptyValue == False:
                print("Er zijn geen velden meer over, het spel is voorbij.")
                print("Het is gelijkspel!")
                displayBKE(inputs, -1)
                time.sleep(1/5)
                input("Druk op enter om terug naar het menu te gaan\n")
                return

    def displayBKE(inputs, selectedPos):
        originalInput = inputs[selectedPos]
        if selectedPos != -1:
            inputs[selectedPos] = "\u2588"
        print("      |      |      ")
        print("   " + inputs[0] + "  |   " + inputs[1] + "  |   " + inputs[2] + "  ")
        print("      |      |      ")
        print("--------------------")
        print("      |      |      ")
        print("   " + inputs[3] + "  |   " + inputs[4] + "  |   " + inputs[5] + "  ")
        print("      |      |      ")
        print("--------------------")
        print("      |      |      ")
        print("   " + inputs[6] + "  |   " + inputs[7] + "  |   " + inputs[8] + "  ")
        print("      |      |      ")
        inputs[selectedPos] = originalInput

    startGame()


def endIt():
    global loggedIn
    loggedIn = False


def switch_answer(answer):
    switch = {
        1: humidity,
        2: temperature,
        3: emotion,
        4: date,
        5: lightlevel,
        6: facts,
        7: BKE,
        8: endIt
    }
    func = switch.get(answer, lambda: "Antwoord niet geaccepteerd")

    time.sleep(1/5)
    func()

while not loggedIn:
    menulist = ["1: Login", "2: Maak nieuw account aan"]
    answer = convertIfInt(questions(menuItemsMax, menulist))
    if answer == 1:
        login()
    elif answer == 2:
        createAccount()
    else:
        print("Unexpected result, code modified probably")

while not pickedFriend:
    menulist = ["1: maak een nieuwe vriend aan", "2: selecteer een bestaande vriend"]
    answer = convertIfInt(questions(menuItemsMax, menulist))
    if answer == 1:
        createFriend()
    elif answer == 2:
        pickedFriend()
    else:
        print("Unexpected result, code modified probably")

while loggedIn:
    menulist = ["1: Check luchtvochtigheid", "2: Check temperatuur", "3: Check emotie", "4:Check datum",
                "5: Check lichtniveau", "6: Vertel een feitje", "7: Speel boter kaas en eieren", "8: Exit Friend"]
    answer = convertIfInt(questions(menuItemsMax, menulist))
    switch_answer(answer)
