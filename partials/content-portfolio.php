<?php 

require_once('content-getQuery.php');
$q = new getQuery( array('general') ) ;
?>
<div class="row-fluid clearfix">
<?php
$q->queryResults();
?>
</div>





