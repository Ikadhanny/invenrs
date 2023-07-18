<!DOCTYPE html>
<html><head>
    <title></title>
</head><body>
        <table>
            <thead>
                <tr>
                    <th>Nama Alat</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Nomor Seri</th>
                    <th>Sumber Dana</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama Alat</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Nomor Seri</th>
                    <th>Sumber Dana</th>
                    <th>Tahun</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($alat as $a) { ?>
                    <tr>
                        <td><?php echo $alat_item['nama']; ?></td>
                        <td><?php echo $alat_item['merk']; ?></td>
                        <td><?php echo $alat_item['tipe']; ?></td>
                        <td><?php echo $alat_item['seri']; ?></td>
                        <td><?php echo $alat_item['sumber']; ?></td>
                        <td><?php echo $alat_item['tahun']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</body></html>