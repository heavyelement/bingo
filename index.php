<link rel='stylesheet' type='text/css' href='/bingo/bingo.css'>

    <h1>2018 Tech News Bingo</h1>
    <form autocomplete="off">
<table>
    <!-- <tr>
        <th>One</th>
        <th>Two</th>
        <th>Thee</th>
        <th>Four</th>
        <th>Five</th>
    </tr> -->
<?php

    $predictions = json_decode(file_get_contents("bingo/predictions.json"),true);
    $i=0;
    foreach($predictions as $key => $value){
            if($i % 5 === 0){
                echo "<tr>";
            }
            if($i === 12){
                echo "<td id='cell$i'>";
                echo "<input type='checkbox' id='freeSpace' checked disabled></input>";
                echo "<label for='label$i' class='background'></label>";
                echo "<p class='text'>Steam continues getting worse<br>(Free Space)</p>";
                echo "<div id='punchline$i' class='punchlines'><div>Steam Direct continues to pollute the storefront with filth and bile. Valve keeps making money and don't care at all.<div></div>";
                echo "</td>";
                $i++;
            }
            echo "<td id='cell$i'>";
            echo "<input type='checkbox' id='label$i'";
            if(isset($value["selected"])){
                echo " checked";
            }
<<<<<<< HEAD
            echo "></input>";
=======
            echo " onchange='checkForWinner()'></input>";
>>>>>>> dbfda2890a43d3f6a9288bb1387d662b8a3ac79b
            echo "<label for='label$i' class='background'></label>";
            echo "<p class='text'>" . $value['setup'] . "</p>";
            echo "<div id='punchline$i' class='punchlines";
            if($i % 5 === 4){
                echo " lefty";
            }
            echo "'><div>" . $value['punchline'] . "</div></div>";
            echo "</td>";
            if($i % 5 === 4){
                echo "</tr>";
            }
            if($i >= 24){
                break;
            }
            $i++;
    }


?>
</table>
</form>
<br><br><br><br><br><br><br>