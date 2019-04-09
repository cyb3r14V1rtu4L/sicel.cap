<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $params['js'] ?>jquery.js"></script>
<script src="/App/Layout/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $params['js'] ?>markerclusterer.js"></script>
<script src="<?php echo $params['js'] ?>infobox.js"></script>
<script src="<?php echo $params['js'] ?>richmarker.js"></script>
<script src="<?php echo $params['js'] ?>socket.io.js"></script>

<script src="<?php echo $params['js'] ?>maps.js"></script>


<?php

if(!empty($params['view_js'])){

    foreach ($params['view_js'] as $js){
        echo '<script src="'.$js.'"></script>';
    }

}
?>

</body>
</html>