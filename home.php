<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	header("Location: pages/home.php");
} else {
	header("Location: index.php");
}
