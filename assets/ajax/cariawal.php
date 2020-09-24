<?php include('../../config.php')
?>
<?php
if (isset($_POST['emb']) && $_POST['emb'] == 'ss') {
    $q = $_POST['qq'];
    $sql = mysqli_query($conn, "SELECT * FROM tbl_user WHERE name like '%$q%'");
    $rows = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    if ($rows) {
?>
        <div class="sugg-body card bs">
            <?php foreach ($rows as $r); ?>
            <div onclick="anyar(<?php echo $r['id']; ?>,'<?php echo $r['name'] ?>')" class="sugg-res p-2"><?php echo $r['name'] ?></div>
            <?php T_ENDFOREACH; ?>
        </div>

<?php } else {
        echo '<div class="p-2"> NOTHING FOUND</div>';
    }
}
?>