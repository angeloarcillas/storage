<?php
/**
 * Pagination
 */

// Set page number
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

$limit = 20; // set limit data
$total = $db->query("SELECT count(*) FROM users");
$pageNumbers = ceil($total / $limit);
$currentPage = ($page - 1) * $limit;

$stmt = $db->query("SELECT * FROM users LIMIT $currentPage, $limit");
$datas = $stmt->fetchAll(PDO::FETCH_CLASS);

foreach ($datas as $key => $value) {
  echo "$key : $value";
}

/**
 * Showing entries indicator 
 */
if ($total < 1) {
  $showingFrom = 0;
  $showingTo = 0;

} else {
  $showingFrom = $currentPage + 1;
  $showingTo = ($showingFrom - 1) + $limit;
}

if ($pageNumbers == $page) {
  $showingTo = $total;
}

echo "Showing {$showingFrom} to {$showingTo} of  {$total} entries";

/**
 * Pagination links
 */

//  Prev/First page
if ($page > 1) {
  $prev = $page - 1;
  echo "<a href=\"#?page=1\">&lt;&lt;</a>
        <a href=\"#?page={$prev}\">Prev</a>";
}

// page links
for ($links = 1; $links <= $pageNumbers; $links++) {
  echo "<a href=\"#?page={$links}\">{$links}</a>"                                                                                                                                                                                                               ;
}

// Next/Last page
if ($page < $pageNumbers) {
  $next = $page + 1;
  echo "<a href=\"#?page={$next}\">Next</a>
        <a href=\"#?page={$pageNumbers}\">&gt;&gt;</a>";
}