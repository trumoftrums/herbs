<?php if(!empty($data)){ ?>

<video width="100%" height="100%"  controls autoplay>
<source src="{{url($data->src)}}" type="video/mp4">
Your browser does not support the video tag.
</video>
<?php }else{?>
<h3>Video not found</h3>
<?php }?>