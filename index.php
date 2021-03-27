<?php
                
require_once('init.php');

$resulTable="";

if ($_GET)
{
    if ($_GET['postalCode'])
    {
        $code=$country->find_code_by_pc($_GET['postalCode']);
        $flag=0;
        if ($country->name != $_GET['countries'])
        {
            $code=$country->find_code_by_country($_GET['countries']);
            $flag=1;
        }
            $place="http://api.zippopotam.us/".$country->code."/".$_GET['postalCode'];

            if (is_404($place)==false)
            {
                if($flag==1)
                {
                    $country->add_pc($country->name, $country->code, $_GET['postalCode']);
                }

                $data = file_get_contents($place);

                $placesArray = json_decode($data, true);
                $resulTable="<table>
                <thead>
                  <tr>
                  <th><strong>State</strong></th>
                  <th><strong>Place Name</strong></th>
                  <th><strong>Latitude</strong></th>
                  <th><strong>Longitude</strong></th>
                </tr>
                </thead>";
        
                for ($i=0; $i<sizeof($placesArray["places"]); $i++)
                {   
                    $resulTable=$resulTable."<tr>";
                    if($placesArray["places"][$i]["state"]=="")
                    {
                        $resulTable=$resulTable."<td>".$_GET['countries']."</td>";
                    }
                    else
                    {
                        $resulTable=$resulTable."<td>".$placesArray["places"][$i]["state"]."</td>";
                    }
                    $resulTable=$resulTable."<td>".$placesArray["places"][$i]["place name"]."</td>";
                    $resulTable=$resulTable."<td>".$placesArray["places"][$i]["latitude"]."</td>";
                    $resulTable=$resulTable."<td>".$placesArray["places"][$i]["longitude"]."</td>";
                    $resulTable=$resulTable."</tr>";

                    $place = new Place ();

                    $placeName=$placesArray["places"][$i]["place name"];
                    $Cname=$_GET['countries'];
                    $latitude=$placesArray["places"][$i]["latitude"];
                    $longitude=$placesArray["places"][$i]["longitude"];
                    
                    $place->add_places($placeName, $Cname, $latitude, $longitude);
                }
                $resulTable=$resulTable."</table>";            
            }
            else
            {
                echo "Sorry, the requested postal code was not found.";
            }
    }
}

function is_404($url) {
    $handle = curl_init($url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

    /* Get the HTML or whatever is linked in $url. */
    $response = curl_exec($handle);

    /* Check for 404 (file not found). */
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    curl_close($handle);

    /* If the document has loaded successfully without any redirection or error */
    if ($httpCode >= 200 && $httpCode < 300) {
        return false;
    } else {
        return true;
    }
}

?>

<!DOCTYPE html> 
<html> 
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="work.css">
        <title> Worldcom Finance Task - Tal Gumi </title>

   </head>
   <body>
    <h2>Worldcom Finance</h2>

        <main>

            <h3>Find places by postal code </h3>
            <form class="formC" method="GET">
                <fieldset>

                    <label for="Countries">Choose a country:</label>

                    <select name="countries" id="countries">

                    <?php
                        require_once('init.php');
                        $country=new Country();
                        $res=$country->getCountries();

                        for ($i=0; $i<10; $i++)
                        {
                            echo '<option value="'.$res[$i]['name'].'">'.$res[$i]['name'].'</option>';
                        }
                    ?>

                    </select> <br><br>
                
                    <label for="PostalCode">Postal Code:</label> 
                    <input type="text" id="postalCode" name="postalCode"> <br><br>
                    <input type="Submit" value="Send"> <br>
                    
                </fieldset>
            </form>
        </main>

        <?php if(isset($resulTable)){echo $resulTable;} ?>
	</body>



</html>