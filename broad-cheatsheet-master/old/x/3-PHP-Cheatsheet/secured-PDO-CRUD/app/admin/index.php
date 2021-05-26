<?php include_once '../header.php'; ?>
    <h2>Welcome Admin</h2>
    <nav>
      <ul>
        <li><a href="#register">Register</a> </li>
        <li><a href="#view">View</a> </li>
        <li><a href="#update">Update</a> </li>
        <li><a href="#delete">Delete</a> </li>
      </ul>
    </nav>
    <section id="register">
<h2>register</h2>
<?php
include_once 'register.php';
 ?>
    </section>
    <section id="view">
<h2>view</h2>
<?php
include_once 'view.php';
 ?>
    </section>
    <section id="update">
<h2>update</h2><?php
include_once 'update.php';
 ?>
    </section>
    <section id="delete">
<h2>delete</h2><?php
include_once 'delete.php';
 ?>
    </section>
<?php include_once '../footer.php'; ?>
