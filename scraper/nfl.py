import urllib
from bs4 import BeautifulSoup
import re
    
def scrape_data_site(url):
   f = urllib.urlopen(url)
   s = f.read()
   f.close() 
   soup = BeautifulSoup(s)
   table=soup.findAll('table')[0] 
   j=0
   rows = table.findAll('tr')
   
   for tr in rows:
            
      cols = tr.findAll('td');
      j+=1
   
      for i,td in enumerate(cols):
       
           if (i==0):
              
              tempstring = td.text + ','
              
              if (re.search(' O ', tempstring)): 
                 new=re.sub(' O ', ' ', tempstring)
                 li = new.split(' ')
                 print li[0], li[1]+','+li[4]
              elif (re.search(' NA ', tempstring)): 
                 new=re.sub(' NA ', ' ', tempstring)
                 li = new.split(' ')
                 print li[0], li[1]+','+li[4]
              elif (re.search(' P ', tempstring)): 
                 new=re.sub(' P ', ' ', tempstring)
                 li = new.split(' ')
                 print li[0], li[1]+','+li[4]
              elif (re.search(' Q ', tempstring)): 
                 new=re.sub(' Q ', ' ', tempstring)
                 li = new.split(' ')
                 print li[0], li[1]+','+li[4]
              elif (re.search(' D ', tempstring)): 
                 new=re.sub(' D ', ' ', tempstring)
                 li = new.split(' ')
                 print li[0], li[1]+','+li[4]
              elif (re.search(' DTD ', tempstring)): 
                 new=re.sub(' DTD ', ' ', tempstring)
                 li = new.split(' ')
                 print li[0], li[1]+','+li[4]
              elif (re.search(' IR ', tempstring)):
                 pass
              elif (re.search(' III ', tempstring)):
                 new=re.sub(' III ', ' ', tempstring)
                 li = new.split(' ')
                 print li[0], li[1]+','+li[4]
              
              else:
                 l = tempstring.split(' ')
                 if (pos<8):
                    print l[0], l[1]+','+l[4]
                 else: 
                    for teamname in l:
                       if not(re.search("DEF",teamname)):
                          print teamname,
                       else:
                          print("") #this is likely a windows only work around
                          break
                                 
print "135,NFL.com"
for week in (1,2,3,4,5,6,7,8):
      print week 
   
      for pos in (1,2,3,4,7,8):
    
      
         url="http://fantasy.nfl.com/research/projections?position="+str(pos)+"&sort=projectedPts&statCategory=projectedStats&statSeason=2012&statType=weekProjectedStats&statWeek="+str(week)
      
         if (pos==1): position= "QB"
         if (pos==2): position= "RB"
         if (pos==3): position= "WR"
         if (pos==4): position= "TE"
         if (pos==7): position= "K"
         if (pos==8): position= "DEF"
         print position 
         scrape_data_site(url)  