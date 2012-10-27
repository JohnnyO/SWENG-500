import urllib
from bs4 import BeautifulSoup
import re
import string
from htmllaundry import sanitize, StripMarkup
def scrape_data_site(url):
   f = urllib.urlopen(url)
   s = f.read()
   f.close()
   soup = BeautifulSoup(s)
   table=soup.findAll('table')[1] 
   rows = table.findAll('tr')
   
   for j,tr in enumerate(rows):
      
         
         
         cols = tr.findAll('td');
    
         for i,td in enumerate(cols):
           
              if (i==0):
                 
                 temp=td.text
                 temp = re.sub('\*', '', temp)
                 if (re.search(' III', temp)):
                    n=re.sub(' III', ' ', temp)
                    n1=StripMarkup(sanitize(n))
                    if (re.search('\xa0',n1)):
                       n2=re.sub('\xa0',' ',n1)
                    n3=n2.split(' ')
                    print n3[0], n3[1]+','+n3[3]
                   
                       
                         
                
                 #elif (re.search('\*', temp)):
                    #pass              
                                      
                   
                 elif (re.search('PLAYER',temp)):
                    pass
                 
                 else:
                    
                    li1=StripMarkup(sanitize(temp))
                    if (re.search('\xa0',li1)):
                       li2=re.sub('\xa0',' ',li1)
                       li3=li2.split(' ')
                       
                       print li3[0], li3[1]+li3[2]
                   
               
                
                 
                
print "Actual Data Source: ESPN"
for week in (1,2):
   print week
   for position_counter in (0,2,4,6):
       url="http://games.espn.go.com/ffl/leaders?&slotCategoryId="+str(position_counter)+"&scoringPeriodId="+str(week)+"&seasonId=2012"
 
       if (position_counter == 0):
          position="QB"
       elif (position_counter == 2):
          position="RB"
       elif (position_counter == 4):
          position="WR"
       else:
          position="TE"
       print position
    
       scrape_data_site(url)      
