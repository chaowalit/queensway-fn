<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <!-- Total Registered User :  Total Registered User With Photo : <h1>Data User</h1> -->
    <table class="table table-striped table-bordered" style="text-align: center;">
        <thead>
            <tr>
                <th colspan="16"><?php echo $header_1; ?></th>
            </tr>
            <tr>
                <th colspan="16"><?php echo $header_2; ?></th>
            </tr>
            <tr>
                <th colspan="16"><?php echo $header_3; ?></th>
            </tr>
            <tr>
                <th colspan="16"><?php echo $header_4; ?></th>
            </tr>
            <tr>
                <th rowspan="2" align="center" width="6">ลำดับ</th>
                <th rowspan="2" align="center" width="35">รายการ</th>
                <th rowspan="2" align="center" width="10">ราคา MPL</th>
                <th rowspan="2" align="center" width="8">หน่วย</th>
                <th colspan="4" align="center">ยอดที่ซื้อ</th>
                <th colspan="6" align="center">ยอดที่ใช้</th>
                <th colspan="2" align="center">ยอดคงเหลือ</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th align="center">วันที่ซื้อ</th>
                <th align="center" width="12">จำนวนหน่วย</th>
                <th align="center" width="12">ยอดเงินที่ซื้อ</th>
                <th align="center" width="12">ชื่อ Consult</th>
                <th align="center">วันที่ใช้</th>
                <th align="center" width="12">จำนวนที่ใช้</th>
                <th align="center" width="12">ยอดเงินที่ใช้</th>
                <th align="center">ชื่อหมอ</th>
                <th align="center" width="12">ชื่อ Consult</th>
                <th align="center">ชื่อ BT/TT</th>
                <th align="center">จำนวน</th>
                <th align="center">ยอดเงิน</th>
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
                    <td align="center"><?php echo $value[10]; ?></td>
                    <td align="center"><?php echo $value[11]; ?></td>
                    <td align="center"><?php echo $value[12]; ?></td>
                    <td align="center"><?php echo $value[13]; ?></td>
                    <td align="center"><?php echo $value[14]; ?></td>
                    <td align="center"><?php echo $value[15]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>