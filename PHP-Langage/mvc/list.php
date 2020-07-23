<?php
require_once 'model.php';
$connect = dbConnect();
$contacts = dbGetAllContacts($connect);

require_once 'contacts-list.phtml';