<h1>Products</h1>
<a href="<?= URL; ?>product/create">Create</a>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($products as $product): ?>
			<tr>
				<td><?= $product->getId(); ?></td>
				<td><?= $product->getName(); ?></td>
				<td><?= $product->getDescription(); ?></td>			
				<td><a href="<?= URL; ?>product/update/<?= $product->getId(); ?>">Edit</a> | <a href="<?= URL; ?>product/delete/<?= $product->getId(); ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	<tfoot>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>