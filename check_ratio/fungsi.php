<?php
if (isset($_GET['pencet'])) {
    echo $_GET['tio1'];
    $se1 = $_GET['tio1'];
    $se2 = $_GET['tio2'];
    $se3 = $_GET['tio3'];
    $se4 = $_GET['tio4'];
} ?>


<form action="" method="GET">
    <tr>
        <td>
            <input type="number" placeholder="Ratio" name="tio1" id="ratio">

        </td>
        <td>
            <input type="number" placeholder="Ratio" name="tio2" id="ratio">

        </td>
        <td>
            <input type="number" placeholder="Ratio" name="tio3" id="ratio">

        </td>
        <td>
            <input type="number" placeholder="Ratio" name="tio4" id="ratio">
        </td>
    </tr>

    <tr>
        <td colspan="4">
            <input type="submit" name="pencet" value="oke">
        </td>
    </tr>
</form>

<tr>

    <td>
        <?php
        echo "< " . $se1 . "%";
        ?>
    </td>
    <td>
        <?php
        echo "< " . $se2 . "%"; ?>
    </td>
    <td>
        <?php
        echo "< " . $se3 . "%"; ?>
    </td>
    <td>
        <?php
        echo "< " . $se4 . "%"; ?>
    </td>
</tr>


<p style="color: aquamarine;text-decoration:blink"> test</p>