/*================================================================================================= 
    Web Site:      Grid Iron Grades
    File:          PickingPlayers.js 
    Description:   
    Company:       Team 2
    Copywrite:     N/A
    Author:        JTM
    Rev. History:  
===================================================================================================*/

function sendRequest(url)
{
    alert("I got to sendRequest");
    request.open("GET", url, true);
    request.onreadystatechange = updateAutoComplete;
    request.send(null); 
}

function getPlayers()
{
    var playerPos = document.getElementById("PosPick").value;
    var url1 = "autoComplete.php?pos=" + escape(playerPos);
    alert("I got to getPlayers()");
    sendRequest(url1);
}

function updateAutoComplete()
{
   alert("I got to updateAuto");
    if (request.readyState == 4)
    {
        if (request.status == 200)
        {
            var newValue = request.responseText;
            player1List = newValue;
            player2List = newValue;
            
         }
     }
}