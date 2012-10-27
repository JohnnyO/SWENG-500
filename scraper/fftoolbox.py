import urllib
from bs4 import BeautifulSoup
import re
import string
def scrape_data_site(url):
   f = urllib.urlopen(url)
   s = f.read()
   f.close()
   
   soup = BeautifulSoup(s)
   table = soup.find(lambda tag: tag.name=='table' and tag.has_key('id') and tag['id']=="proj")
   rows = table.findAll('tr')
   for tr in rows:
      
      cols = tr.findAll('td');
      
      for i,td in enumerate(cols):
         if (i==1):
            player=td.text
            
         if (i==2):
            team=td.text
            
         if (i==4):
            if (re.search("IR", td.text) or re.search("Out", td.text)):
               player = ""
               
            else:
               temp=player.strip()
               print temp+','+team.strip()
        
print "123, FFToolbox"
for week in (1,2,3,4,5,6,7,8):
   
   print week
   #print "\n"
   for position in ("QB", "RB", "WR", "TE"): 
      #print "\n"
      print position
      #print "\n"
      url="http://www.fftoolbox.com/football/2012/weeklycheatsheets.cfm?WeekNumber="+str(week)+"&player_pos="+str(position)
      scrape_data_site(url) 
