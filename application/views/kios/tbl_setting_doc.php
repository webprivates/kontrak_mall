
        <h2>Tbl_setting List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tersedia</th>
		
            </tr><?php
            foreach ($kios_data as $kios)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kios->tersedia ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
