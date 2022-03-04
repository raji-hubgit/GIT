

<html>
    <head>
    <style>
        .resultant{
            border: 1px solid;
        }
    </style>    
    <script src = "https://code.jquery.com/jquery-2.1.3.min.js" type = "text/javascript" ></script>
    <script type="text/javascript">

        function addNewrow()
        {
            var row = $('[name="numrows"]:last').val();
            var i = parseInt(row)+1;;
            var table = document.getElementById("ordertbl");
            var row = table.insertRow(i);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            cell1.innerHTML = '<input  type="hidden" name="numrows" value="'+i+'"/><button onclick="deleteRow(this)">x</button><input type="number" name="pid'+i+'" id="pid'+i+'" value=""/>';
            cell2.innerHTML = '<input type="text" name="product'+i+'" id="product'+i+'" value=""/>';
            cell3.innerHTML = '<select name="type'+i+'" id="type'+i+'"><option value="Mobile">Mobile</option></select>';
            cell4.innerHTML = '<input type="number" name="quantity'+i+'" id="quantity'+i+'" value="" />';
            cell5.innerHTML = '<label>Availability:</label> <input type="radio" name="availability'+i+'" id="yes'+i+'" value="Yes"/><label for="yes'+i+'">Yes</label><input type="radio" name="availability'+i+'" id="no'+i+'" value="No"/><label for="no'+i+'">No</label>';
            cell6.innerHTML = '<label>Discounts:</label> <input type="checkbox" name="discounts['+i+'][]" id="hdfcbank'+i+'" value="HDFC Bank"/> <label for="hdfcbank'+i+'">HDFC Bank</label><input type="checkbox" name="discounts['+i+'][]" id="sbibank'+i+'" value="SBI Bank" />  <label for="sbibank'+i+'">SBI Bank</label><input type="checkbox" name="discounts['+i+'][]" id="mastercard'+i+'" value="Master Card"/>  <label for="mastercard'+i+'">Master Card</label>';
            
        }

        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("ordertbl").deleteRow(i);
        }

        function resettable()
        {
            $('#orderform').trigger("reset");
        }

    </script>

    </head>
    <body>
        <center>
        <h3>Shopping List</h3>
        <form id="orderform" method="POST" action="order.php" enctype="multipart/form-data">
            <table id="ordertbl">
                <?php 
                for($i=0;$i<=3;$i++)
                {
                    echo '<tr>
                            <input  type="hidden" name="numrows" value="'.$i.'"/>
                            <td><button onclick="deleteRow(this)">x</button>
                            <input type="number" name="pid'.$i.'" id="pid'.$i.'" value="" /></td>
                            <td><input type="text" name="product'.$i.'" id="product'.$i.'" value=""/></td>
                            <td>
                                <select name="type'.$i.'" id="type'.$i.'">
                                    <option value="Mobile">Mobile</option>                        
                                </select>
                            </td>
                            <td><input type="number" name="quantity'.$i.'" id="quantity'.$i.'" value="" /></td>
                            <td>
                                <label>Availability:</label>
                                <input type="radio" name="availability'.$i.'" id="yes'.$i.'" value="Yes"/><label for="yes'.$i.'">Yes</label>
                                <input type="radio" name="availability'.$i.'" id="no'.$i.'" value="No"/><label for="no'.$i.'">No</label>
                            </td>
                            <td>
                                <label>Discounts:</label>
                                <input type="checkbox" name="discounts['.$i.'][]" id="hdfcbank'.$i.'" value="HDFC Bank"/> <label for="hdfcbank'.$i.'">HDFC Bank</label>
                                <input type="checkbox" name="discounts['.$i.'][]" id="sbibank'.$i.'" value="SBI Bank" />  <label for="sbibank'.$i.'">SBI Bank</label>
                                <input type="checkbox" name="discounts['.$i.'][]" id="mastercard'.$i.'" value="Master Card"/>  <label for="mastercard'.$i.'">Master Card</label>
                            </td>
                    </tr>';
            } ?>
        </table>
        <br></br> 
        <input type="button" value="Add" onclick="addNewrow()"/>
        <input type="submit"  name="submit" value="Submit" />
        <input type="button" value="Reset" onclick="resettable()"/>

        </form>
        </center>
    </body>

</html>


<?php
if(isset($_POST['submit']))
{
    echo '<center><table class="resultant">';
    echo '<tr class="resultant">
            <th class="resultant">ID</td>
            <th class="resultant">Product</td>
            <th class="resultant">Type</td>
            <th class="resultant">Qunatity</td>
            <th class="resultant">Availability</td>
            <th class="resultant">Discounts</td>
          </tr>';  
    $discount_arr = $_POST['discounts'];

   for($i=0;$i<=$_POST['numrows'];$i++)
    {
        if($_POST['pid'.$i] !='')
        {
            $availability = $_POST['availability'.$i] ? $_POST['availability'.$i]  : 'Yes';     

            $discounts = $discount_arr[$i];
            if(count($discounts)>0)
            {            
                $discount = implode(',',$discounts);
            }
            else
                $discount = 'NA';    
        
        
            echo ' <tr>
                    <td class="resultant">'.$_POST['pid'.$i].'</td>
                    <td class="resultant">'.$_POST['product'.$i].'</td>
                    <td class="resultant">'.$_POST['category'.$i].'</td>
                    <td class="resultant">'.$_POST['quantity'.$i].'</td>
                    <td class="resultant">'.$availability.'</td>
                    <td class="resultant">'.$discount.'</td>
                </tr>';   
        }        
    }
    echo '</table></center>';

}
?>
