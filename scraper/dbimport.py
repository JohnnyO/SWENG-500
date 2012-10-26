import sys
import fileinput
import MySQLdb

db = MySQLdb.connect(host="127.0.0.1", user="root", passwd="root", db="wdis")
cur = db.cursor()


predictionInsert = "INSERT into prediction (ida, idp, week, position, rankOrder) values ('%s','%s','%s','%s','%s')"


#Not the most efficient way to search an array, but it will serve
#Searches through the file to get the list of the players for a given position and week
def find(lines, week, pos):
    try:
      startIndex = lines.index(week)
    except ValueError:
        return []
    try:
        startIndex = lines.index(pos, startIndex)
    except ValueError:
        return []
    endIndex = startIndex + 1
    while len(lines[endIndex].split()) > 1:
        endIndex = endIndex + 1
    return lines[startIndex+1:endIndex]
    


#Checks to see if a player is in the database.  If they are, it returns the player id, 
# if they are not, it inserts them, then returns the playerid
def lookupPlayer(playerName, playerTeam, position):
    lookup = "select idp from player where name = %s"
    cur.execute(lookup, playerName)
    rows = cur.fetchall()
    if len(rows) == 0:
        print "Creating a new record for ", playerName
        insert = "insert into player(name, team, position) values (%s,%s,%s)"
        cur.execute(insert, (playerName, playerTeam, position));
        id = cur.lastrowid
        cur.execute("commit")
        return id
    else:
        return rows[0][0]
    

        
        
        
        
    

    



#cur.execute("select * from player")
#for row in cur.fetchall():
#    print row




if len(sys.argv) < 2:
    print "Usage:  python dbimport.py <file-to-import> <file2> <file3>"
    sys.exit(0)


for fname in sys.argv[1:]:
    print "Attempting to read" + fname 
    f = open(fname)
    lines = [line.strip() for line in f.readlines() if len(line.strip()) > 0]  # Get rid of all the extra whitespace
    
    analystid = lines[0].split(",")[0]
    analystName = lines[0].split(",")[1]
    analystStation = lines[0].split(",")[2]
    
    
    for week in range(1,9):
        for position in ("QB","RB","WR","TE"):
            players =  find(lines, str(week), position)
            rank = 1
            for player in players:
                playerName = player.split(',')[0].strip()
                playerTeam = player.split(',')[1].strip()
                playerid = lookupPlayer(playerName, playerTeam, position)
                cur.execute(predictionInsert % (analystid, playerid, str(week), position, str(rank)))
                rank = rank + 1
                cur.execute("commit")
             
        




    