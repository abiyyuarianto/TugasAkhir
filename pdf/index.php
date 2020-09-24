<?php include('../config.php') ?>
<?php $thn = $_GET['tahun']; ?>

<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'Letter');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string 
$pdf->Cell(190, 7, 'Daftar Category Tahun ' . $thn, 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'Toyota Astra Motor', 0, 1, 'C');

$header = array(
    array("label" => "Category", "length" => 40, "align" => "C"),
    array("label" => "WBS Number", "length" => 35, "align" => "C"),
    array("label" => "Master Budget", "length" => 35, "align" => "C"),
    array("label" => "Realization", "length" => 35, "align" => "C"),
    array("label" => "Budget Available", "length" => 33, "align" => "C"),
    array("label" => "Ratio", "length" => 18, "align" => "C")
);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(255, 0, 0);
$pdf->SetTextColor(1);
$pdf->SetDrawColor(128, 0, 0);


$pdf->Cell(40, 10, 'Category', 1, 0, 'C');
$pdf->Cell(35, 10, 'WBS Number', 1, 0, 'C');
$pdf->Cell(35, 10, 'Master Budget', 1, 0, 'C');
$pdf->Cell(35, 10, 'Realization', 1, 0, 'C');
$pdf->Cell(33, 10, 'Budget Available', 1, 0, 'C');
$pdf->Cell(18, 10, 'Ratio', 1, 1, 'C');


$pdf->SetFont('Arial', '', 10);

$mahasiswa = mysqli_query($conn, "SELECT * FROM tbl_act_cat where tahun='$thn' && active is NULL or active = ' ' ");
while ($row = mysqli_fetch_array($mahasiswa)) {
    $pdf->Cell(40, 10, $row['act'], 1, 0, 'C');
    $pdf->Cell(35, 10, $row['wbs_num'], 1, 0, 'C');
    $pdf->Cell(35, 10, 'Rp. ' . number_format($row['mas_bud'], 0, ',', '.'), 1, 0, 'R');
    $pdf->Cell(35, 10, 'Rp. ' . number_format($row['realz'], 0, ',', '.'), 1, 0, 'R');
    $pdf->Cell(33, 10, 'Rp. ' . number_format($row['bud_av'], 0, ',', '.'), 1, 0, 'R');
    $pdf->Cell(18, 10, $row['ratio'] . '%', 1, 1, 'C');
}

$pdf->Output();
?>
