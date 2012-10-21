import urllib
from bs4 import BeautifulSoup
import re
f = open('footballdata', 'w')
      

def scrape_data_site(url):
   f = urllib.urlopen(url)
   s = f.read()
   # f.close() 
   soup = BeautifulSoup(f)
   table=soup.findAll('table')[0] 
   j=0
   rows = table.findAll('tr')

   for tr in rows:
           
      cols = tr.findAll('td');
      j+=1
   
      for i,td in enumerate(cols):
       
           if (i==0):
              tempstring = td.text
              if (re.search(' O ', tempstring)): #ok re.search works here
                 new=re.sub(' O ', ' ', tempstring)
                 print new
              elif (re.search(' NA ', tempstring)): #ok re.search works here
                 new=re.sub(' NA ', ' ', tempstring)
                 print new
              elif (re.search(' P ', tempstring)): #ok re.search works here
                 new=re.sub(' P ', ' ', tempstring)
                 print new
              elif (re.search(' Q ', tempstring)): #ok re.search works here
                 new=re.sub(' Q ', ' ', tempstring)
                 print new
              elif (re.search(' D ', tempstring)): #ok re.search works here
                 new=re.sub(' D ', ' ', tempstring)
                 print new
              elif (re.search(' DTD ', tempstring)): #ok re.search works here
                 new=re.sub(' DTD ', ' ', tempstring)
                 print new
              elif (re.search(' IR ', tempstring)):
                 pass
              #elif (re.search(' I ', tempstring)):
                 #pass
              else:
                 print tempstring    
     
             
   
for week in (1,2,3,4,5,6):
   print "\n"
   print week, "\n"
   for position in ("QB", "RB", "WR", "TE"):
       url="http://football.fantasysports.yahoo.com/f1/rankerresults?pos="+position+"&sort=RR&week="+str(week)
       
       print "\n"
       print position, "\n"
       scrape_data_site(url)      
