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


"""Checks to see if a player is in the database.  If they are not, we can insert them.  Either way, returns
the unique identifier (idp) of the player"""
def lookupPlayer(cur, playerName, playerTeam, position):
    #TODO:  We currently lookup only by name, but there could be the case where two 
    #players with the same name are actually different players.  For example, there
    #were two Steve Smiths playing a few years back.
    
    #If we lookup by team and name however, we fail to track players in and out of 
    #free agency, as well as when they get traded.
    lookup = "select idp from player where name = %s"
    cur.execute(lookup, (playerName))
    rows = cur.fetchall()
    if len(rows) == 0:
        print "Creating a new record for ", playerName, playerTeam
        insert = "insert into player(name, team, position) values (%s,%s,%s)"
        cur.execute(insert, (playerName, playerTeam, position));
        id = cur.lastrowid
        cur.execute("commit")
        return id
    else:
        return rows[0][0]

# A listing of the valid teams we recognize
def validTeams():
    #32 NFL Teams + FA for Free Agent players
    return ['NO','NE','GB','DET','CAR','NYG','ATL','PHI',
    'PIT','SD','DEN','BAL','DAL','HOU','CHI','SF',
    'WAS','CIN','TB','IND','BUF','OAK','STL','TEN',
    'KC','MIN','SEA','NYJ','JAX','MIA','ARI','CLE','FA']


     
"""Cleans up the various different incarnations of team abbreviations and standardizes them"""
def sanitizeTeam(input):
    #Some sites use non-standard abbreviations for teams just as Jacksonville or Washington, this simply standardizes
    commonAliases = {"JAC" : "JAX", "WSH": "WAS", "" : "FA"}  
    team = input.upper().strip();   #Get rid of capitalization issues and padding
    if team in commonAliases:   
        team = commonAliases[team]
    if team in validTeams():
        return team
    else:
        raise ValueError('Could not determine a mapping for teamCode [%s]' % input)
    
        
""" This function is currently manually maintained, we track any players whose names vary across sites"""
def sanitizePlayerName(input):
    aliasDict = { 
      "Robert Griffin" : "Robert Griffin III",  
      "Ben Watson" : "Benjamin Watson",
      "Dave Thomas" : "David Thomas",
      "Steve Johnson" : "Stevie Johnson"
    }
    if input in aliasDict:
        return aliasDict[input]
    else:
        return input
    
    
    
    
    
    