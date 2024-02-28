<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<script>
        function clearResult() {
            document.getElementById("bil1").value = "";
            document.getElementById("bil2").value = "";
            document.getElementById("operasi").value = "+";
            document.getElementById("result").value = "0";
        }
    </script>
    <?php 
    $bil1 = isset($_POST['bil1']) ? $_POST['bil1'] : '';
    $bil2 = isset($_POST['bil2']) ? $_POST['bil2'] : '';
    $operasi = isset($_POST['operasi']) ? $_POST['operasi'] : '';    
    if(isset($_POST['hitung'])) {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $operasi = $_POST['operasi'];
        switch($operasi) {
            case 'tambah': $hasil = $bil1 + $bil2; break;
            case 'kurang': $hasil = $bil1 - $bil2; break;
            case 'kali': $hasil = $bil1 * $bil2; break;
            case 'bagi': $hasil = $bil1 / $bil2; break;            
        }
    }
    ?>
    <div class="kalkulator">
        <h2 class="judul">KALKULATOR DIGITAL</h2>
        <form method="post" action="index.php">            
            <input type="text" name="bil1" id="bil1" class="bil" placeholder="Bilangan Pertama" value="<?php echo $bil1; ?>">
            <input type="text" name="bil2" id="bil2" class="bil" placeholder="Bilangan Kedua" value="<?php echo $bil2; ?>">
            <select class="opt" name="operasi" id="operasi">
                <option <?php echo ($operasi == 'tambah') ? 'selected' : ''; ?> value="tambah">+</option>
                <option <?php echo ($operasi == 'kurang') ? 'selected' : ''; ?> value="kurang">-</option>
                <option <?php echo ($operasi == 'kali') ? 'selected' : ''; ?> value="kali">x</option>
                <option <?php echo ($operasi == 'bagi') ? 'selected' : ''; ?> value="bagi">:</option>
            </select>
            <br>
                        
            <?php if(isset($_POST['hitung'])){ ?>
                <input type="text"  class="bil" id="result" value="<?php echo $hasil; ?>">
            <?php }else{ ?>
                <input type="text" class="bil" id="result" value="0">
            <?php } ?> 
            <input type="button" class="hapus" value="hapus" onclick="clearResult()">
			<input type="submit" class="tombol" name="hitung" value="hitung">
        </form>                    
    </div>
</body>
</html>
