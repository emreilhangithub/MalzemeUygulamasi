<!DOCTYPE html>
<html>
<head>
	<title>Deneme Sayfası</title>
</head>
<body>

	<?php print_r($data); ?>

	<?php $this->DenemeModel->get_categories(); ?>

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