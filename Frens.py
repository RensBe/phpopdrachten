import random

answer = 0
ending = False
loop = True


def questions():
    global answer
    print("Menu:")
    print("")
    print("1: Check luchtvochtigheid")
    print("2: Check temperatuur")
    print("3: Check emotie")
    print("4: Check datum")
    print("5: Check lichtniveau")
    print("6: Vertel een feitje")
    print("7: Speel boter kaas en eieren")
    print("8: Exit Friend")
    print("")
    answer = input("Vul in wat je wil dat ik doe:")


def convertIfInt(enteredValue):
    try:
        enteredValue = int(enteredValue)
    except:
        enteredValue = 0
    return enteredValue


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

        #Check rows
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

        #Check columns
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

        #Check diagonals
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
        inputs = [" ", " ", " ", " ", " ", " ", " ", " ", " "]
        continueGame = True
        while continueGame:
            noAnswer = True
            selected = 0
            while noAnswer:
                displayBKE(inputs)
                selected = input("Vul de positie in waar je jouw X wilt invullen")
                selected = convertIfInt(selected) - 1
                if selected >= 0 and selected < 9:
                    if inputs[selected] == " ":
                        inputs[selected] = "X"
                        noAnswer = False
                    else:
                        print("Deze plek is al ingevuld")
                else:
                    print("Getal buiten bereik")
            #Bots turn
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


            #Check if a party has won
            if checkIfSituation(inputs, "X", True):
                continueGame = False
                print("Jij hebt gewonnen!")
                displayBKE(inputs)
                input("Druk op enter om terug naar het menu te gaan")
            elif checkIfSituation(inputs, "O", True):
                continueGame = False
                print("Vriend heeft het spel gewonnen!")
                displayBKE(inputs)
                input("Druk op enter om terug naar het menu te gaan")

            emptyValue = False
            for inp in inputs:
                if inp == " ":
                    emptyValue = True
            if emptyValue == False:
                continueGame = False
                print("Er zijn geen velden meer over, het spel is voorbij.")
                print("Het is gelijkspel!")
                displayBKE(inputs)
                input("Druk op enter om terug naar het menu te gaan")


    def displayBKE(inputs):
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

    startGame()


def endIt():
    global ending
    ending = True


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
    print(func())


while(ending == False):
    questions()
    switch_answer(
        convertIfInt(answer)
    )