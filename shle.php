<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" type="text/css" href="sheltyle.css">
    <script>
        // JavaScript function to clear form fields and reset result to empty
        function clearResult() {
            document.getElementById("bil1").value = "";
            document.getElementById("bil2").value = "";
            document.getElementById("operasi").value = "";
            document.getElementById("result").value = "";
        }
    </script>
</head>
<body>
    <?php 
    if(isset($_POST['hitung'])){
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $operasi = $_POST['operasi'];
        switch ($operasi) {
            case 'tambah':
                $hasil = $bil1 + $bil2;
                break;
            case 'kurang':
                $hasil = $bil1 - $bil2;
                break;
            case 'kali':
                $hasil = $bil1 * $bil2;
                break;
            case 'bagi':
                $hasil = $bil1 / $bil2;
                break;            
        }
    }
    ?>
    <div class="kalkulator">
        <h2 class="judul">KALKULATOR DIGITAL</h2>
        <form method="post" action="shle.php">            
            <input type="text" name="bil1" id="bil1" class="bil" placeholder="Bilangan Pertama" value="<?php echo $bil1; ?>">
            <input type="text" name="bil2" id="bil2" class="bil" placeholder="Bilangan Kedua" value="<?php echo $bil2; ?>">
            <select class="opt" name="operasi" id="operasi">
                <option value="tambah">+</option>
                <option value="kurang">-</option>
                <option value="kali">x</option>
                <option  <?php echo ($operasi == 'bagi') ? 'selected' : ''; ?> value="bagi">:</option>
            </select>
            <br>
                        
            <?php if(isset($_POST['hitung'])){ ?>
                <input type="text" value="<?php echo $hasil; ?>" class="bil" id="result">
            <?php }else{ ?>
                <input type="text" value="0" class="bil" id="result">
            <?php } ?> 
            <input type="button" value="Hapus" onclick="clearResult()" class="hapus">
			<input type="submit" name="hitung" value="Hitung" class="tombol">
        </form>                    
            </div>
</body>
</html>