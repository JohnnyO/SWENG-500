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
            
            print td.text.split(",")[0].strip(),",",
            print td.text.split(",")[1].strip()
        
for ranker in (("jamey_eisenberg",3),("nathan_zegura",4), ("dave_richard",5)):
   print ranker[0],",",ranker[1], ",CBS.com"
   for week in range(1,9):
      print week
      for position in ("QB", "RB", "WR", "TE"): 
         print position
         url="http://fantasynews.cbssports.com/fantasyfootball/stats/weeklyprojections/"+position+"/"+str(week)+"/"+ranker[0]
         scrape_data_site(url)     
