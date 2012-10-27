--This query will give you the average accuracy of all analysts, position by position.
--If you want to restrict on a given analyst, simply include a where ida=? to the end
--I've turned the [-1,1] scale into a [-100,100] scale, which should be easier for display purposes.


select ida, name, station, position, positionalAccuracy from (
select 
     ida, position,round(avg(accuracy) * 100, 2) as positionalAccuracy
from
    predictionAccuracy
group by position , ida) as averages LEFT JOIN analyst using (ida);
