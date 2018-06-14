<?php

if ($_POST['request'])
{
        $request=$_POST['request'];
		$conn=mysqli_connect('localhost','root','','boulingrintest');
		$query ="select * from products where categories_id='$request'";
		$result=mysqli_query($conn,$query);
		echo '<table border="1">';
		echo '<tr>';
		echo '<th>Nom</th>';
		echo '<th>Prix unité</th>';
		echo '<th>description</th>';
		echo '<th>Id Categorie</th>';
		echo '</tr>';

while($output=mysqli_fetch_assoc($result))
{
	echo '<tr>';
	echo '<td>'.$output['nom'].'</td>';
	echo '<td>'.$output['prix_unite'].'</td>';
	echo '<td>'.$output['description'].'</td>';
	echo '<td>'.$output['categories_id'].'</td>';
};
		echo '</table>';
mysqli_close($conn);

};

?>





<script>
	$(document).ready(function()
	{
		$("#fetchval").on('change',function()
		{
			var value = $(this).val();
			$.ajax(
			{
				url:'fetch.php',
				type:'POST',
				data:'request='+value,
				beforeSend:function()
				{
					$("#table-container").html('Working On ....');
				},
				success:function(data)
				{
					$("#table-container").html(data);
				},
			});

		});
	});
</script>

<h1>Filter Table</h1>
<div id='ab'>Fetch Results By:</div>
<select name="fetchby" id="fetchval">
	<option value="1">Legumes</option>
	<option value="2">Fruits</option>
</select>
<div id="table-container">
<?php
		$conn=mysqli_connect('localhost','root','','boulingrintest');
		$query ="select * from products";
		$output=mysqli_query($conn,$query);
		echo '<table border="1">';
		echo '<tr>';
		echo '<th>Nom</th>';
		echo '<th>Prix unité</th>';
		echo '<th>description</th>';
		echo '<th>Id Categorie</th>';
		echo '</tr>';

while($fetch=mysqli_fetch_assoc($output))
{
	echo '<tr>';
	echo '<td>'.$fetch['nom'].'</td>';
	echo '<td>'.$fetch['prix_unite'].'</td>';
	echo '<td>'.$fetch['description'].'</td>';
	echo '<td>'.$fetch['categories_id'].'</td>';
};
		echo '</table>';
mysqli_close($conn);

?>
</div>