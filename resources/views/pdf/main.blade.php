<style>

    *{
        text-transform: capitalize;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .logo {
        width: 150px;
        /* Adjust the logo width as needed */
    }

    .address {
        font-weight: normal;
        text-align: right;
    }

    .pdf-time {
        position: fixed;
        bottom: 20px;
        left: 20px;
        font-size: 12px;
        color: #999;
    }
</style>

<div id="pdf_table">
    <div class="header">
        <div>
            <img src="path/to/your/logo.png" alt="Organization Logo" class="logo">
        </div>
        <div class="address">
            Head Office Address:
            <br>
            <p>Your Head Office Address Here</p>
        </div>
    </div>

    <h2 style="text-align: center;">{{session("pdf_title")}}</h2>

    <table>
    <thead>
        <tr>
            <th>S.no</th>
            <?php
            $seller = session()->get('pdf_data');
            if (!empty($seller)) {
                $row = $seller[0]->toArray(); // Retrieve the first row and convert it to an array
                $keys = array_keys($row); // Get the keys of the row
                // Skip the first key and its value
                $keys = array_slice($keys, 1, 6);

                foreach ($keys as $key) {
                    $formattedKey = str_replace('_', ' ', $key);
                    echo "<th>" . $formattedKey . "</th>";
                }
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $serialNumber = 1; // Initialize serial number counter
        foreach ($seller as $row) {
            ?>
            <tr>
                <td><?php echo $serialNumber; ?></td>
                <?php
                $rowArray = $row->toArray(); // Convert each row to an array
                // Skip the first value and display only the values for the specified keys
                $values = array_slice($rowArray, 1, 6);
                foreach ($values as $value) {
                    echo "<td><span>" . $value . "</span></td>";
                }
                ?>
            </tr>
            <?php
            $serialNumber++; // Increment serial number after each row
        }
        ?>
    </tbody>
</table>



    <div class="pdf-time">
        Generated on: <?php echo date('Y-m-d H:i:s'); ?>
    </div>
</div>