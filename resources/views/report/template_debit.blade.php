<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <!-- Total Registered User :  Total Registered User With Photo : <h1>Data User</h1> -->
    <table class="table table-striped table-bordered" style="text-align: center;">
        <thead>
            <tr>
                <th colspan="10"><?php echo $header; ?></th>
            </tr>
            <tr>
                <th rowspan="2" align="center" width="6">ลำดับ</th>
                <th rowspan="2" align="center" width="35">รายการ</th>
                <th rowspan="2" align="center" width="10">ราคา MPL</th>
                <th rowspan="2" align="center" width="8">หน่วย</th>
                <th colspan="3" align="center">จำนวนคอร์ส</th>
                <th colspan="3" align="center">ยอดเงิน (บาท)</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th align="center">ยอดซื้อ</th>
                <th align="center">ใช้ไป</th>
                <th align="center">คงเหลือ</th>
                <th align="center">ยอดซื้อ</th>
                <th align="center">ใช้ไป</th>
                <th align="center">คงเหลือ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $key => $value) { ?>
                <tr>
                    <td align="center"><?php echo $value[0]; ?></td>
                    <td align="left"><?php echo $value[1]; ?></td>
                    <td align="center"><?php echo $value[2]; ?></td>
                    <td align="center"><?php echo $value[3]; ?></td>
                    <td align="center"><?php echo $value[4]; ?></td>
                    <td align="center"><?php echo $value[5]; ?></td>
                    <td align="center"><?php echo $value[6]; ?></td>
                    <td align="center"><?php echo $value[7]; ?></td>
                    <td align="center"><?php echo $value[8]; ?></td>
                    <td align="center"><?php echo $value[9]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>