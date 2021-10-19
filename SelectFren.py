from Project1.globalFunctions import databaseConnectie, convertIfInt
from Project1.question import questions


def pickFriend(menuItemsMax, userName):
    while True:
        list = databaseConnectie("SELECT v.naam, v.vriendID FROM GebruikerVriend gv LEFT JOIN Vriend v ON gv.VriendID = v.VriendID WHERE gv.GebruikersNaam = '" + userName + "'")
        if len(list) > 0:
            answer = convertIfInt(questions(menuItemsMax, list[0]))
            return [True, list[answer - 1]]
        else:
            print("Maak eerst een vriend aan voordat je een vriend probeert te kiezen")


def createFriend(userName, pickedFriend):
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
            Query = "INSERT INTO Vriend (Naam, Hygiëne, Honger, Verjaardag, Leeftijd, Emotie) VALUES('" + friendName + "', 3, 3, CAST( GETDATE() AS Date), 0, 3)"
            databaseConnectie(Query)
            friendIDs = databaseConnectie("SELECT vriendID FROM vriend")
            friendID = str(friendIDs[len(friendIDs) - 1][0])
            databaseConnectie("INSERT INTO GebruikerVriend (GebruikersNaam, VriendID) VALUES('" + userName + "', " + friendID + ")")
            break
    return [True, friendID]