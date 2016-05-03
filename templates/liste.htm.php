<table class="liste" width="100%" cellspacing="1">
        <tr>
                <th></th>
                <th>Name</th>
                <th>Vorname</th>
                <th>Strasse</th>
                <th>PLZ</th>
                <th>Ort</th>
                <th>Email</th>
                <th>Telefon privat</th>
                <th>Telefon gesch.</th>
        </tr>

        <?php
            foreach( getValue('data') as $row) :
            
                echo "<tr>
                        <td><a href=".getValue('phpmodule')."&kid=".$row['kid'].">
                            <img src=\"../images/delete.png\" border=\"no\" onclick=\"return confdel();\">
                            </a>
                        </td>
                        <td>".htmlentities($row["name"])."</td>
                        <td>".htmlentities($row["vorname"])."</td>
                        <td>".htmlentities($row["strasse"])."</td>
                        <td>".(($row["plz"]==0) ? "" : $row["plz"])."</td>
                        <td>".htmlentities($row["ort"])."</td>
                        <td>".htmlentities($row["email"])."</td>
                        <td>".htmlentities($row["tpriv"])."</td>
                        <td>".htmlentities($row["tgesch"])."</td>
                       </tr>";
            
            endforeach;
        ?>

</table>