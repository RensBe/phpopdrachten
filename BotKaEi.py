import random, keyboard

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
                        break
                    elif keyboard.read_key() == "up":
                        if selected > 2:
                            selected -= 3
                        displayBKE(inputs, selected)
                    elif keyboard.read_key() == "down":
                        if selected < 6:
                            selected += 3
                        displayBKE(inputs, selected)
                    elif keyboard.read_key() == "left":
                        if selected != 0 or selected != 3 or selected != 6:
                            selected -= 1
                        displayBKE(inputs, selected)
                    elif keyboard.read_key() == "right":
                        if selected != 2 or selected != 5 or selected != 8:
                            selected += 1
                        displayBKE(inputs, selected)
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
                input("Druk op enter om terug naar het menu te gaan\n")
                return
            elif checkIfSituation(inputs, "O", True):
                print("Vriend heeft het spel gewonnen!")
                displayBKE(inputs, -1)
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