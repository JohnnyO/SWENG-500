import urllib
from bs4 import BeautifulSoup
import re

def scrape_data_site(url):
   f = urllib.urlopen(url)
   s = f.read()
   f.close()
   print "\t\t\t\t\tBerry\t\tHarris\t\tKarabell\tCockcroft"
   soup = BeautifulSoup(s)

   table = soup.find(lambda tag: tag.name=='table' and tag.has_key('id') and tag['id']=="rankerresultstable")
   rows = table.findall('tr')
   for tr in rows:
      print "\n"
      cols = tr.findall('td');
    
      for i,td in enumerate(cols):
           
           if not(i==0 or i==3 or i==8):
              if (i==1):
                 print "%24s" % (td.text),
                 temp.string = td.text
              else:  
                 print td.text,
                 tempstring = td.text
   
for week in (1,2,3,4,5): 

   print "\n"
   print week, "\n"
   for position in ("QB", "RB", "WR", "TE"): 
   
      url="http://sports.espn.go.com/fantasy/football/ffl/story?page=12ranksWeek"+str(week)+str(position)
      print "\n"
      print position, "\n"
      scrape_data_site(url)      


#test
        
        
        