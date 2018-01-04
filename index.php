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

        // Get and decode the predictions file.
        $predictions = json_decode(file_get_contents("bingo/predictions.json"),true);
        $i=0;

        foreach($predictions as $key => $value){
            if($i % 5 === 0){
                // Create table rows
                echo "<tr>";
            }
            if($i === 12){
                // Generate free space
                echo "<td id='cell$i'>";
                echo "<input type='checkbox' id='freeSpace' checked disabled></input>";
                echo "<label for='label$i' class='background'></label>";
                echo "<p class='text'>" . $predictions["freespace"]["setup"] . "<br>(Free Space)</p>";
                echo "<div id='punchline$i' class='punchlines'><div>" . $predictions["freespace"]["punchline"] . "<div></div>";
                echo "</td>";
                // Update counter, this allows the current square to be
                // generated while also adding a free space where it's supposed to be.
                $i++;
            }
            echo "<td id='cell$i'>";
            echo "<input type='checkbox' id='label$i'";
            if(isset($value["selected"])){
                // Make the current input checked if it has a 'selected' key
                // Should it also be disabled to prevent it from being unchecked??
                echo " checked";
            }

            // Added a call to a JS function to check for a winner.
            // I should probably actually write that.
            echo " onchange='checkForWinner()'></input>";

            // Source order is important here. The <label> element needs to immediately follow the checkbox
            // in order for the <label> styling to work as intended.
            echo "<label for='label$i' class='background'></label>";
            echo "<p class='text'>" . $value['setup'] . "</p>";
            echo "<div id='punchline$i' class='punchlines";
            if($i % 5 === 4){
                echo " lefty";
            }
            echo "'><div>" . $value['punchline'] . "</div></div>";
            echo "</td>";
            if($i % 5 === 4){
                
                // Where appropriate, close the row
                echo "</tr>";
            }
            if($i >= 24){
                // End the bingo card when the counter gets to 24
                break;
            }

            // Finally, increment the counter
            $i++;
        }


    ?>
    </table>
</form>
<br><br><br><br><br><br><br>