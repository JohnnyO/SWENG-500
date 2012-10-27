import sys
import fileinput
import MySQLdb
import importer

db = MySQLdb.connect(host="127.0.0.1", user="root", passwd="root", db="wdis")
cur = db.cursor()

analystInsert = "INSERT IGNORE INTO ANALYST (ida, name, station) values (%s,%s,%s)"
predictionInsert = "INSERT into prediction (ida, idp, week, position, rankOrder) values ('%s','%s','%s','%s','%s')"

if len(sys.argv) < 2:
    print "Usage:  python dbimport.py <file-to-import> <file2> <file3>"
    sys.exit(0)


for fname in sys.argv[1:]:
    lines = importer.ingestFile(fname)
    
    # The first line of the file contains the analystID, Name, and Station
    analystid = lines[0].split(",")[0]
    analystName = lines[0].split(",")[1]
    analystStation = lines[0].split(",")[2]
    
    cur.execute(analystInsert, (analystid, analystName, analystStation))
    
    
    for week in range(1,17):
        for position in ("QB","RB","WR","TE"):
            players =  importer.find(lines, str(week), position)
            rank = 1
            for player in players:
                playerName = player.split(',')[0].strip()
                playerName = importer.sanitizePlayerName(playerName)
                playerTeam = player.split(',')[1].strip()
                playerTeam = importer.sanitizeTeam(playerTeam)
                playerid = importer.lookupPlayer(cur, playerName, playerTeam, position)
                cur.execute(predictionInsert % (analystid, playerid, str(week), position, str(rank)))
                rank = rank + 1
                cur.execute("commit")
             
        




    