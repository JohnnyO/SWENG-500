import urllib
from bs4 import BeautifulSoup
import re
import string
       
def scrape_data_site(url):
   f = urllib.urlopen(url)
   s = f.read()
   f.close() 
   soup = BeautifulSoup(s)
   table=soup.findAll('table')[1] #finds the 2nd table
   j=0
   rows = table.findAll('tr')
   for tr in rows:
      #f.write(j)
      #print j+1,
      
      cols = tr.findAll('td');
      j+=1
   
      for i,td in enumerate(cols):
       
           if (i==0):
              #f.write(td.text)
              tempstring = td.text
              parenIndex = tempstring.find("(")
              hyphenIndex = tempstring.find("-")
              print tempstring[0:parenIndex].strip(),
              print ",",
              print string.upper(tempstring[parenIndex+1:hyphenIndex].strip())
              
              #print tempstring
              #tempstring = "Bernard Scott  (Cin - RB) IR"
              #tempstring = 'Bernard Scott (Cin - RB) IR'
              #new=tempstring.replace('IR', ' ')
              #print new
#              if (re.search(' O ', tempstring)): #ok re.search works here
#                 new=re.sub(' O ', ' ', tempstring)
#                 print new
#              elif (re.search(' NA ', tempstring)): #ok re.search works here
#                 new=re.sub(' NA ', ' ', tempstring)
#                 print new
#              elif (re.search(' P ', tempstring)): #ok re.search works here
#                 new=re.sub(' P ', ' ', tempstring)
#                 print new
#              elif (re.search(' Q ', tempstring)): #ok re.search works here
#                 new=re.sub(' Q ', ' ', tempstring)
#                 print new
#              elif (re.search(' D ', tempstring)): #ok re.search works here
#                 new=re.sub(' D ', ' ', tempstring)
#                 print new
#              elif (re.search(' DTD ', tempstring)): #ok re.search works here
#                 new=re.sub(' DTD ', ' ', tempstring)
#                 print new
#              elif (re.search(' IR ', tempstring)):
#                 pass
#              #elif (re.search(' I ', tempstring)):
#                 #pass
#              else:
#                 print tempstring
            
              
                 
              
              #print "%18s" % (td.text)
              
   #j+=1
             
print "1,Crowdsourced Rankings, Yahoo.com"
for week in range(1,8):
   #f.write("\n")
   #f.write(str(week))
   #f.write("\n")
   print week
   #for position in ("QB", "RB", "WR", "TE"):
   for position in ("QB", "RB", "WR", "TE"):
       url="http://football.fantasysports.yahoo.com/f1/rankerresults?pos="+position+"&sort=RR&week="+str(week)
       #f.write("\n")
       #f.write(str(position))
       #f.write("\n")
       print position
       scrape_data_site(url)      
"""
        
url="http://football.fantasysports.yahoo.com/f1/rankerresults?pos=QB&sort=RR&week=2"
scrape_data_site(url)
"""
