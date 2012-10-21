import sys
import fileinput
import MySQLdb

db = MySQLdb.connect(host="127.0.0.1", user="root", passwd="root", db="wdis")
cur = db.cursor()


predictionInsert = "INSERT into prediction (ida, idp, week, position, rankOrder) values ('%s','%s','%s','%s','%s')"


#Not the most efficient way to search an array, but it will serve
#Searches through the file to get the list of the players for a given position and week
def find(lines, week, pos):
    startIndex = lines.index(week)
    startIndex = lines.index(pos, startIndex)
    endIndex = startIndex + 1
    while len(lines[endIndex].split()) > 1:
        endIndex = endIndex + 1
    return lines[startIndex+1:endIndex]
    


#Checks to see if a player is in the database.  If they are, it returns the player id, 
# if they are not, it inserts them, then returns the playerid
def lookupPlayer(playerFirstName, playerLastName, playerTeam, position):
    name = playerFirstName +' '+playerLastName
    lookup = "select idp from player where name = '%s'" % name
    cur.execute(lookup)
    rows = cur.fetchall()
    if len(rows) == 0:
        print "Creating a new record for ", name
        insert = "insert into player(name, team, position) values ('%s','%s','%s')"  % (name, playerTeam, position);
        cur.execute(insert)
        id = cur.lastrowid
        cur.execute("commit")
        return id
    else:
        return rows[0][0]
    

        
        
        
        
    

    



#cur.execute("select * from player")
#for row in cur.fetchall():
#    print row




if len(sys.argv) < 3:
    print "Usage:  python dbimport.py <file-to-import> <analyst-id>"
    sys.exit(0)

fname = sys.argv[1]
analystid = sys.argv[2]
print "Attempting to read" + fname 
f = open(fname)
lines = [line.strip() for line in f.readlines() if len(line.strip()) > 0]  # Get rid of all the extra whitespace


for week in range(1,8):
    for position in ("QB","RB","WR","TE"):
        players =  find(lines, str(week), position)
        rank = 1
        for player in players:
            playerFirstName = player.split(' ')[0]
            playerLastName = player.split(' ')[1]
            playerTeam = player.split(' ')[-1]
            playerid = lookupPlayer(playerFirstName, playerLastName, playerTeam, position)
            cur.execute(predictionInsert % (analystid, playerid, str(week), position, str(rank)))
            rank = rank + 1
            cur.execute("commit")
             
        




    