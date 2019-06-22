
<style> @import url('<?php echo base_url() ?>application/views/css/frames.css'); </style>	


<div class="frames">
<?php echo anchor('frame/create_frame', '<div id="add_frame"></div>', 'title="Add Frame"'); ?>
	<?php 
		echo form_open('frame/create_frame');
		echo form_submit('submit', 'Add Frame', 'id="submit_add_frame" title="Add Frame"'); 
		echo form_close();
	?>
	<div id="frame_row" class="titles_row">
		<div id="frame_title" class="column_title">Frame Title</div>
		<div id="frame_wms_layer" class="column_title">WMS Layers</div>
		<div id="frame_width" class="column_title">Width</div>
		<div id="frame_height" class="column_title">Height</div>
		<div id="frame_show" class="column_title">Geometries</div>
		<div style="float:left;width:30px;">&nbsp;</div>
		<div id="frame_edit" class="column_title">Edit</div>
		<div id="frame_delete" class="column_title">Delete</div>
	</div>
	
<?php 
if (isset($frames)){
foreach ($frames as $row) : ?>

	<div id="frame_row" class="row">
		<div id="frame_title">
			<?php echo anchor('frame/show_frame/'.$row->id, $row->title); ?>
		</div>
		
		<div id="frame_wms_layer">
			<?php 
			echo $row->wms_layer_ids; ?>
		</div>
		<div id="frame_width">
			<?php echo $row->width; ?> px
		</div>
		<div id="frame_height">
			<?php echo $row->height; ?> px
		</div>
		<div id="frame_geometries">
			
				<?php echo anchor('frame/show_points_in_frame/'.$row->id.'/0', '<div class="elements_on_frame" id="points_on_frame"></div>', 'title="Points"'); ?>
			
			
				<?php echo anchor('frame/show_lines_in_frame/'.$row->id.'/0', '<div class="elements_on_frame" id="lines_on_frame"></div>', 'title="Lines"'); ?>
			
			
				<?php echo anchor('frame/show_polygons_in_frame/'.$row->id.'/0', '<div class="elements_on_frame" id="polygons_on_frame"></div>', 'title="Polygons"'); ?>
			
				<?php echo anchor('frame/show_all_geometries/'.$row->id.'/0', '<div class="elements_on_frame" id="all_on_frame"></div>', 'title="All Geometries"'); ?>
			
		</div>
		<div style="float:left;width:30px;">&nbsp;
		</div>
		<div id="edit_frame">
			<?php 
			echo form_open('frame/edit_frame/'.$row->id);
			echo form_submit('submit', '', 'id="submit_edit" title="Edit Frame"'); 
			echo form_close();?>
		</div>
		<div id="del_frame">
			<?php 
			echo form_open('frame/delete_frame/'.$row->id);
			echo form_submit('submit', '', 'id="submit_delete" title="Delete Frame"'); 
			echo form_close();?>
		</div>
	</div>
<?php endforeach; 
}
else {echo 'There is no frames available!';}
?>

	<div id="pagination">
		<?php echo $this->pagination->create_links(); ?>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>	

<script type="text/javascript" charset="utf-8">
	$('.row:odd').css('background', '#e3e3e3');
</script>

