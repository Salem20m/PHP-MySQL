<h1>Manage Product</h1>

<form method="post" action="#">
	<label for="name">Name</label>
	<input type="text" name="name" id="name" required value="<?= $product->getName() ?>">

	<label for="description">Description</label>
	<textarea name="description" id="description" required><?= $product->getDescription() ?></textarea>

	<button type="submit">Register</button>
</form>