
<?php
/*================================================================================================= 
    Web Site:      Grid Iron Grades
    File:          Index.php 
    Description:   This PHP file will handle the redirection based on browser type.
    Company:       Team 2
    Copywrite:     N/A
    Author:        JTM
    Rev. History:  11/1/12 -- Initial Rev. to start formulating final web layout.
===================================================================================================*/
    require_once 'BrowserInfo.php';
    require_once 'GlobalVars.php';
            
    $browserType = BrowserInfo::getBrowserType();
            
    if ($browserType == Chrome) 
    {
        //header('Location:fullPage.php?type=$browserType');
        header('Location:fullPage.php');        
    }
    elseif ($browserType == FireFox)
    {
        header('Location:fullPage.php?type=$browserType');
    } 
    elseif ($browserType == MSIE)
    {
        header('Location:fullPage.php?type=$browserType');
    } 
    elseif ($browserType == iPhone) 
    {
        header('Location:mobilePage.php?type=$browserType');
    }
    elseif ($browserType == Android)
    {
        header('Location:mobilePage.php?type=$browserType');
    }
    elseif ($browserType == UB)
    {
        echo "<h3>There was an error identifying a compatable browser</h3>";
    }
?>