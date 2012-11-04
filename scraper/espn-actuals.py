import urllib
from bs4 import BeautifulSoup
import re
import string
from htmllaundry import sanitize, StripMarkup
import sys
 
def scrape_data_site(url):
   f = urllib.urlopen(url)
   s = f.read()
   f.close()
   soup = BeautifulSoup(s)
   table = soup.find(lambda tag: tag.name=='table' and tag.has_key('id') and tag['id']=="playertable_0")
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
                    print n3[0], n3[1]+','+n3[3]+",",
                    sys.stdout.softspace=0                 
                
                         
                   
                   
                 elif (re.search('PLAYER',temp)):
                    pass
                                
                 else:
                    
                    li1=StripMarkup(sanitize(temp))
                    if (re.search('\xa0',li1)):
                       li2=re.sub('\xa0',' ',li1)
                       li3=li2.split(' ')
                       if (position_counter==16):
                          if ((week < 4)):
                                print li3[0]+",",
                          
                          elif ((week==4) and (j>31)):
                                print li3[0]
                          elif ((week==4) and (j<=31)):
                                print li3[0]+",",                             
                             
                                
                          elif (((week==5) or (week==6)) and (j>29)):
                                print li3[0]
                          
                          elif (((week==5) or (week==6)) and (j<=29)):
                                print li3[0]+",",
                          
                          elif ((week==7) and (j>27)):
                                print li3[0]
                             
                          elif ((week==7) and (j<=27)):
                                print li3[0]+",",
                                
                          elif (((week==8) or (week==9)) and (j>29)):
                                print li3[0]                           
                          elif (((week==8) or (week==9)) and (j<=29)):
                                print li3[0]+",",
                             
            
                       else:
                         
                          if (len(tr)==23): 
                             
                             print li3[0], li3[1]+li3[2]
                                                     
                          else:
                             print li3[0], li3[1]+li3[2]+',',                             
                             
                       sys.stdout.softspace=0
                       
                                             
                        
               
              if (i==23):
                   
                   i23=td.text
                   i23a=i23.split(' ')
                   i23b=i23a[0]
                   if (j==1):
                      pass
                  
                  
                   else:
                      print StripMarkup(sanitize(i23b))
                      
                  
                 
                
print "Actual Data Source: ESPN"
for week in (1,2,3,4,5,6,7,8):

   print week
   
   for position_counter in (0,2,4,6,17,16):
  
  
   
      url="http://games.espn.go.com/ffl/leaders?&slotCategoryId="+str(position_counter)+"&scoringPeriodId="+str(week)+"&seasonId=2012"
 
      if (position_counter == 0):
         position="QB"
      elif (position_counter == 2):
         position="RB"
      elif (position_counter == 4):
         position="WR"
      elif (position_counter ==6):
         position="TE"
      elif (position_counter == 17):
         position="K"
      else:
         position="D/ST"
      print position
    
      scrape_data_site(url)
 