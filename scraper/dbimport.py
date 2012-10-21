import sys
import fileinput

#Not the most efficient way to search an array, but it will serve
#Searches through the file to get the list of the players for a given position and week
def find(lines, week, pos):
    startIndex = lines.index(week)
    startIndex = lines.index(pos, startIndex)
    endIndex = startIndex + 1
    while len(lines[endIndex].split()) > 1:
        endIndex = endIndex + 1
    return lines[startIndex+1:endIndex]
    




if len(sys.argv) < 2:
    print "Usage:  python dbimport.py <file-to-import>"
    sys.exit(0)

fname = sys.argv[1]
print "Attempting to read" + fname 
f = open(fname)
lines = [line.strip() for line in f.readlines() if len(line.strip()) > 0]  # Get rid of all the extra whitespace


for week in range(1,8):
    for position in ("QB","RB","WR","TE"):
        print week, find(lines, str(week), position)
        




    