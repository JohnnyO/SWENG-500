"""
Reads in an entire file, removes extraneous whitespace, and returns the 
data as an array of strings
 """
def ingestFile(fname):    
    print "Attempting to read" + fname 
    f = open(fname)
    return [line.strip() for line in f.readlines() if len(line.strip()) > 0]  # Get rid of all the extra whitespace


""" Searches through a given input file to find the list of ranked (or actual) players for a 
given week and a given position.  If the data cannot be found, an empty list is returned"""
def find(lines, week, pos):
    try:
      startIndex = lines.index(week)   #Find the week index
    except ValueError:
        return []  #No data for week
    try:
        startIndex = lines.index(pos, startIndex)  #From there, look for the position 
    except ValueError:
        return []  #No data for position
    endIndex = startIndex + 1
    while len(lines[endIndex].split()) > 1:  #Keep going till you find a line with no spaces
        endIndex = endIndex + 1
    return lines[startIndex+1:endIndex]


"""Checks to see if a player is in the database.  If they are not, we can insert them"""
#Checks to see if a player is in the database.  If they are, it returns the player id, 
# if they are not, it inserts them, then returns the playerid
def lookupPlayer(cur, playerName, playerTeam, position):
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
