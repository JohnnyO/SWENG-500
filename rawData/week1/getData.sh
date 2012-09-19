# Get the CBS Data, is it all in one file
curl http://fantasynews.cbssports.com/fantasyfootball/rankings -o cbs-week1-all.html

#Get the ESPN Data, it is spread across multiple files
curl http://sports.espn.go.com/fantasy/football/ffl/story?page=12ranksWeek1QB -o espn-week1-qb.html
curl http://sports.espn.go.com/fantasy/football/ffl/story?page=12ranksWeek1RB -o espn-week1-rb.html
curl http://sports.espn.go.com/fantasy/football/ffl/story?page=12ranksWeek1WR -o espn-week1-wr.html
curl http://sports.espn.go.com/fantasy/football/ffl/story?page=12ranksWeek1TE -o espn-week1-te.html
curl http://sports.espn.go.com/fantasy/football/ffl/story?page=12ranksWeek1DST -o espn-week1-dst.html
curl http://sports.espn.go.com/fantasy/football/ffl/story?page=12ranksWeek1K -o espn-week1-k.html

#Yahoo spreads the data across multiple pages as well
curl 'http://football.fantasysports.yahoo.com/f1/rankerresults?pos=QB&sort=RR&week=1' -o yahoo-week1-qb.html
curl 'http://football.fantasysports.yahoo.com/f1/rankerresults?pos=RB&sort=RR&week=1' -o yahoo-week1-rb.html
curl 'http://football.fantasysports.yahoo.com/f1/rankerresults?pos=WR&sort=RR&week=1' -o yahoo-week1-wr.html
curl 'http://football.fantasysports.yahoo.com/f1/rankerresults?pos=TW&sort=RR&week=1' -o yahoo-week1-te.html
curl 'http://football.fantasysports.yahoo.com/f1/rankerresults?pos=DEF&sort=RR&week=1' -o yahoo-week1-dst.html
curl 'http://football.fantasysports.yahoo.com/f1/rankerresults?pos=Ksort=RR&week=1' -o yahoo-week1-k.html
pause
#Fox spreads the data across pages, as well as multiple pages of results
curl 'http://msn.foxsports.com/fantasy/football/commissioner/Research/Projections.aspx?page=1&position=8&split=4' -o fox-week1-qb-1of2.html
curl 'http://msn.foxsports.com/fantasy/football/commissioner/Research/Projections.aspx?page=2&position=8&split=4' -o fox-week1-qb-2of2.html

curl 'http://msn.foxsports.com/fantasy/football/commissioner/Research/Projections.aspx?page=1&position=16&split=4' -o fox-week1-rb-1of2.html
curl 'http://msn.foxsports.com/fantasy/football/commissioner/Research/Projections.aspx?page=2&position=16&split=4' -o fox-week1-rb-2of2.html

curl 'http://msn.foxsports.com/fantasy/football/commissioner/Research/Projections.aspx?page=1&position=1&split=4' -o fox-week1-wr-1of2.html
curl 'http://msn.foxsports.com/fantasy/football/commissioner/Research/Projections.aspx?page=2&position=1&split=4' -o fox-week1-wr-2of2.html

curl 'http://msn.foxsports.com/fantasy/football/commissioner/Research/Projections.aspx?page=1&position=4&split=4' -o fox-week1-te-1of2.html
curl 'http://msn.foxsports.com/fantasy/football/commissioner/Research/Projections.aspx?page=2&position=4&split=4' -o fox-week1-te-2of2.html

curl 'http://msn.foxsports.com/fantasy/football/commissioner/Research/Projections.aspx?page=1&position=64&split=4' -o fox-week1-k-1of2.html
curl 'http://msn.foxsports.com/fantasy/football/commissioner/Research/Projections.aspx?page=2&position=64&split=4' -o fox-week1-k-2of2.html

curl 'http://msn.foxsports.com/fantasy/football/commissioner/Research/Projections.aspx?page=1&position=32768&split=4' -o fox-week1-dst-1of2.html
curl 'http://msn.foxsports.com/fantasy/football/commissioner/Research/Projections.aspx?page=2&position=32768&split=4' -o fox-week1-dst-1of2.html


#FFToolbox breaks is up by position
curl http://www.fftoolbox.com/football/2012/weeklycheatsheets.cfm?player_pos=QB -o fftoolbox-week1-qb.html
curl http://www.fftoolbox.com/football/2012/weeklycheatsheets.cfm?player_pos=RB -o fftoolbox-week1-rb.html
curl http://www.fftoolbox.com/football/2012/weeklycheatsheets.cfm?player_pos=WR -o fftoolbox-week1-wr.html
curl http://www.fftoolbox.com/football/2012/weeklycheatsheets.cfm?player_pos=TE -o fftoolbox-week1-te.html
curl http://www.fftoolbox.com/football/2012/weeklycheatsheets.cfm?player_pos=DEF -o fftoolbox-week1-dst.html
curl http://www.fftoolbox.com/football/2012/weeklycheatsheets.cfm?player_pos=K -o fftoolbox-week1-k.html
