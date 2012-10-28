/*================================================================================================= 
    Web Site:      Grid Iron Grades
    File:          Ajax.js 
    Description:   
    Company:       Team 2
    Copywrite:     N/A
    Author:        JTM
    Rev. History:  
===================================================================================================*/

//The following function creates the AJAX request for the data from the server.
function getRequest()
{
    try 
    {
        //Request for Opera 8.0+, FireFox, Safari
        ajaxRequest = new XMLHttpRequest();
    }
    catch (trymicrosoft)
    //Request for Internet Explorer Browsers
    {
        try
        {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (othermicrosoft)
        {
            try 
            {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (failed)
            {
                ajaxRequest = false;
            }
        }
    }
    
    if (!ajaxRequest)
        alert("Error initializing XMLHttpRequest!");
}
