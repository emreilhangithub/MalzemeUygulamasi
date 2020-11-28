<!DOCTYPE html>
<html>
<head>
	<title>Deneme Sayfası</title>
</head>
<body>

	<?php print_r($data); ?>

	<?php $this->DenemeModel->get_categories(); ?>

	<hr>


 						<?php if ($this->session->oturum_data['user']) {?>



							<li class="dropdown first">							
								<ul class="dropdown-menu level1">
									<li> <a href="#">Anasayfa</a></li>
									<li> <a href="#">Hakkımızda</a></li>
									<li> <a href="#">Blog</a></li>
									<li> <a href="#">İletişim</a></li>
									<li><a href="<?php echo base_url('uyeislemleri/cikisyap'); ?>">Çıkış Yap</a></li>
								</ul>
							</li>





						<?php } else { ?>

							<li class="loginLink"><a href="#">Giriş Yap</a></li>
							<li class="btn signupLink"><a href="#">Üye Ol</a></li>
						<?php } ?>
 	


	







<!-- <table border="1">
	
<thead> <th>id</th> <th>parent_id</th> <th>name</th></thead>

<?php foreach ($data as $dt) { ?>

<tbody> 

	<tr>
	<td><?php echo $dt->id ?></td>		
	<td><?php echo $dt->parent_id ?></td>		
	<td><?php echo $dt->name ?></td>		
	</tr>

</tbody>

<?php } ?>

</table> -->






</body>
</html>