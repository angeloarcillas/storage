<?php require_once 'App/Views/partials/_header.php'; ?>

<h1>Paginate index</h1>
<section id="pagination">

<div class="table-wrappper">
<table>
<thead>
<tr>
<th>Username</th>
<th>Email</th>
<th>password</th>
<th>Controls</th>
</tr>
</thead>
<tbody>
<?php
foreach ($users as $user) {
   echo "<tr>
    <td>$user->username</td>
    <td>$user->email</td>
    <td>$user->password</td>
    <td>S E D</td>
    </tr>";
}
?>
</tbody>
</table>
</div>

<div class="pagination">
<div class="indicators">
<?php echo "Showing {$from} to {$to} of {$total}" ?>
</div>

<div class="links">
<?php
if (isset($prev)) {
    echo "<a href='{$uri}?page=1'>First</a>
      <a href='{$uri}?page={$prev}'>&laquo;</a>";
      if ($current_page > 3) {
        echo "...";
    }
    echo "<a href='{$uri}?page={$prev}'>{$prev}</a>\n";
}

   echo "<a href='{$uri}?page={$current_page}' class='active'>{$current_page}</a>";


if (isset($next, $last)) {
    
    echo "<a href='{$uri}?page={$next}'>{$next}</a>";    
    if ($current_page < $last - 3) {
        echo "...";
    }
    echo "<a href='{$uri}?page={$next}'>&raquo;</a>
    <a href='{$uri}?page={$last}'>Last</a>";

}
?>
</div>
</div>
</section>

<?php require_once 'App/Views/partials/_footer.php';?>