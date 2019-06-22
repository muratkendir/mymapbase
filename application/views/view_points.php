<style> @import url('<?php echo base_url() ?>application/views/css/points.css'); </style>

<div class="points">
<?php 
	echo form_open('point/create_point');
	echo form_submit('submit', 'Add Point', 'id="submit_add_point" class="add_item" title="Add Point"'); 
	echo form_close();
?>
	<div id="point_row" class="titles_row">
		<div id="point_id" class="column_title">ID</div>
		<div id="point_title" class="column_title">Point Title</div>
		<div id="point_frame" class="column_title">Frame ID</div>
		<div id="point_long" class="column_title">Longitude</div>
		<div id="point_lat" class="column_title">Latitude</div>
		<div style="float:left;width:30px;">&nbsp;</div>
		<div id="point_edit" class="column_title">Edit</div>
		<div id="point_delete" class="column_title">Delete</div>
	</div>
<?php 
if (isset($points)){
	foreach ($points as $row) : ?>
	<div id="point_row" class="row">
		<div id="point_id">
			<?php echo $row['id']; ?>
		</div>
		<div id="point_title">
			<?php echo 
				anchor('point/show_point/'.$row['frame_id'].'/'.$row['id'], $row['title']);
			?>
		</div>
		<div id="point_frame">
			<?php echo 
				anchor('frame/show_frame/'.$row['frame_id'].'/0', $row['frame_id'], 'title="Show the frame"');
			?>
		</div>
		<?php
			$point = $this->wkts->pointwkt_to_coords($row['AsText(point_point)']);
			$point = $this->wkts->point_to_lonlat($point);
			
		?>
		<div id="point_long">
			<?php echo $point['lon']; ?>
		</div>
		<div id="point_lat">
			<?php echo $point['lat']; ?> 
		</div>
		<div style="float:left;width:30px;">&nbsp;
		</div>
		<div id="point_edit">
			<?php 
			echo form_open('point/edit_point/'.$row['id']);
			echo form_submit('submit', '', 'id="submit_edit" title="Edit Point"'); 
			echo form_close();?>
		</div>
		<div id="point_delete">
			<?php 
			echo form_open('point/delete_point/'.$row['id']);
			echo form_submit('submit', '', 'id="submit_delete" title="Delete Point"'); 
			echo form_close();?>
		</div>
	</div>
<?php endforeach; 
}
else {echo 'There is no points available!';}
?>
	<div id="pagination">
		<?php echo $this->pagination->create_links(); ?>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>	

<script type="text/javascript" charset="utf-8">
	$('.row:odd').css('background', '#e3e3e3');
</script>
