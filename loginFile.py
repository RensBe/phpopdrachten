from globalFunctions import databaseConnectie


def createAccount():
    list = databaseConnectie("SELECT * FROM Gebruiker;")
    while True:
        input()
        userName = input("Voer hier je gebruikersnaam in")
        unique = True
        for lUser in list:
            if userName == lUser[0] or userName == "":
                print("Gebruikersnaam wordt al gebruikt, probeer een andere")
                unique = False
        if unique:
            password = input("Voer hier je wachtwoord in")
            break
    sqlQuery = "INSERT INTO Gebruiker (GebruikersNaam, Wachtwoord) VALUES('" + userName + "', '" + password + "')"
    databaseConnectie(sqlQuery)
    return [True, userName]


def login(loggedIn):
    global userName
    while not loggedIn:
        list = databaseConnectie("SELECT GebruikersNaam, Wachtwoord FROM Gebruiker")
        input()
        userName = input("Voer hier je gebruikersnaam in")
        password = input("Voer hier je wachtwoord in")
        for lUser in list:
            if userName == lUser[0] and password == lUser[1]:
                databaseConnectie("SELECT gebruikersNaam FROM Gebruiker")
                return [True, userName]
        if not loggedIn:
            print("gebruikersnaam of wachtwoord is fout")