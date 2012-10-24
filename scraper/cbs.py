import urllib
from bs4 import BeautifulSoup
import re

def scrape_data_site(url):
   f = urllib.urlopen(url)
   s = f.read()
   f.close()
   
   soup = BeautifulSoup(s)

   #table = soup.find(lambda tag: tag.name=='table' and tag.has_key('class') and tag['class']=="data")
   table=soup.findAll('table')[6]
   rows = table.findAll('tr')

   for tr in rows:
      
      cols = tr.findAll('td');
      
      for i,td in enumerate(cols):
         if ((i==0) and (re.search(",", td.text))):#ensures that correct rows are printed
            print td.text
        
for ranker in ("jamey_eisenberg", "nathan_zegura", "dave_richard"):
   print "\n"
   print ranker, "\n"

   for week in (1,2,3,4,5,6,7):
      print "\n"
      print week, "\n"
      for position in ("QB", "RB", "WR", "TE"): 
         print "\n"
         print position
         print "\n"
         url="http://fantasynews.cbssports.com/fantasyfootball/stats/weeklyprojections/"+position+"/"+str(week)+"/"+ranker
         scrape_data_site(url)     
