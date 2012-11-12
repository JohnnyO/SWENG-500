import importer
import MySQLdb

insertActualResult = "INSERT into ACTUALRESULT(idp, week, position, rank, score) values (%s,%s,%s,%s, %s)"
db = MySQLdb.connect(host="127.0.0.1", user="root", passwd="root", db="wdis")
cur = db.cursor()



lines = importer.ingestFile('../data/actualData_weeks1_9')
for week in range(1,17):
        for position in ("QB","RB","WR","TE","K"):
            players =  importer.find(lines, str(week), position)
            rank = 1
            for player in players:
                split = player.split(',')
                playerName = split[0].strip()
                playerName = importer.sanitizePlayerName(playerName)

                playerTeam = split[1].strip()
                playerTeam = importer.sanitizeTeam(playerTeam)
                
                playerScore = "0"
                if (len(split) > 2):
                    playerScore = int(split[2])
                
                playerid = importer.lookupPlayer(cur, playerName, playerTeam, position)
                cur.execute(insertActualResult, (playerid, str(week), position, str(rank), str(playerScore)))
                rank = rank + 1
                cur.execute("commit")

        