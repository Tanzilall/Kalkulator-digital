<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="latihan.css">
    <title>Document</title>
</head>
<body>
    <script>
        function clearResult(){
            document.getEmelentById("bil1").value = "";
            document.getEmelentById("bil2").value = "";
            document.getEmelentById("operasi").value = "";
            document.getEmelentById("result").value = "0";
        }
    </script>
    <?php 
    $bil1 = isset($_POST['bil1'])? $_POST['bil1'] : '';
    $bil2 = isset($_POST['bil2'])? $_POST['bil2'] : '';
    $operasi = isset($_POST['operasi'])? $_POST['operasi'] : '';
    if(isset($_POST['hitung'])) {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $operasi = $_POST['operasi'];
        switch($operasi){
            case 'tambah' : $hasil = $bil1 + $bil2; break;
            case 'kurang' : $hasil = $bil1 - $bil2; break;
            case 'kali' : $hasil = $bil1 * $bil2; break;
            case 'bagi' : $hasil = $bil1 / $bil2; break;
        }
    }
    ?>
    <div class="kalkulator">
        <h2 class="judul">Kalkulator digital</h2>
        <form action="latihan.php" method="post">
            <input type="text" class="bil" id="bil1" name="bil1" placeholder="bilangan 1" value="<?php echo $bil1; ?>">
            <input type="text" class="bil" id="bil2" name="bil2" placeholder="bilangan 2" value="<?php echo $bil2; ?>">
            <select name="operasi" id="operasi" class="opt">
                <option <?php echo ($operasi == 'tambah')? 'selected' : ''; ?> value="tambah"></option>
                <option <?php echo ($operasi == 'kurang')? 'selected' : ''; ?> value="kurang"></option>
                <option <?php echo ($operasi == 'kali')? 'selected' : ''; ?> value="kali"></option>
                <option <?php echo ($operasi == 'bagi')? 'selected' : ''; ?> value="bagi"></option>
            </select>

            <?php if(isset($_POST['hitung'])) { ?>
            <input type="text" class="bil" id="result" value="<?php echo $hasil; ?>">
            <?php }else{ ?>
            <input type="text" class="bil" id="result" value="0">
            <?php } ?>
            <input type="button" class="hapus" value="hapus" onclick="clearResult()">
            <input type="submit" class="tombol" value="hitung" name="hitung">
        </form>
    </div>
</body>
</html>