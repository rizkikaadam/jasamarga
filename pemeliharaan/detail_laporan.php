<?php
$sub_objek=$detail->sub_objek($_GET[objek],$_GET[user],$_GET[tgl],$_GET[lokasi]);
foreach ($sub_objek as $data)
{
?>
                            <div class="panel-heading">
                            <i class="icon-table"></i> <?php echo "$data[nama_subobjek]";?>
                        </div>
							<div class="table-responsive">
							    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>No</th>
											<th>Nama Tindakan</th>
											<th>Kriteria</th>
											<th>Rencana TL</th>
											<th>Selesai TL</th>
											<th>Dana</th>
											<th>Rekanan</th>
										</tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$semua=$detail->semua($_GET[objek],$_GET[user],$_GET[tgl],$_GET[lokasi]),$data[nama_subobjek];
										foreach ($tampil as $data)
										{
											echo "
											<tr class='odd gradeX'>
												<td>$no</td>
												<td>$data[nama_tindakan]</td>
												<td>$data[kriteria]</td>
												<td>$data[rencana_tl]</td>
												<td>$data[selesai_tl]</td>
												<td>$data[dana]</td>
												<td>$data[rekanan]</td>
											</tr>";
											$no++;
										}
										?>
                                    </tbody>
                                </table>
                            </div>
<?php
}
?>