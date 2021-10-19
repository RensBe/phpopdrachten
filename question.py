import keyboard


def questions(menuItemsMax, menulist):
    positionInMenu = 0
    while True:
        MessageToPrint = "-->"
        for i in range(menuItemsMax):
            if i < len(menulist):
                if len(menulist) <= positionInMenu + i:
                    positionInMenu -= len(menulist)
                elif positionInMenu <= len(menulist) * -1:
                    positionInMenu += len(menulist)
                if i != menuItemsMax:
                    MessageToPrint += str(menulist[positionInMenu + i]) + "\n   "
                else:
                    MessageToPrint += str(menulist[positionInMenu + i])
        print(MessageToPrint)

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