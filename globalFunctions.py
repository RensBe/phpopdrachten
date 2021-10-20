import pymssql


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