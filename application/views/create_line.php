<h1>Create a Line
<a href="http://www.mymapbase.com/cms/index.php/en/how-to#3-3-step-create-your-lines" target="_blank">
				<span class="hint--rounded" data-hint="If you dont know how to create your line, click here." style="color:#FE5928;vertical-align:super;font-size:12px;">?</span>
				</a>
</h1>
	
<fieldset>
	<legend>General Info</legend>
	
	<?php
	echo form_open('line/add_line');
	$user_id = $this->session->userdata('user_id');
	
	echo form_hidden('user_id', $user_id);
	
	echo form_label('Line Title', 'title');
	echo form_input('title');
	
	echo form_label('Available Frames', 'frames');
	$dropdown_id = 'id="frame_id" onChange="getFrameId();"';
	echo form_dropdown('editable_frames', $dropdown, '0', $dropdown_id);
	
	$frame_id = $this->input->post('editable_frames');
	
	echo '<a href="#" title="Help to considering to Line Points Long/lat and Zoom Level" id="geometry_helper" remote=true onclick="openPopUp();" >Geometry Helper!</a>';
	
	echo '</br></br>';
	
	$public_private = array (0 => 'Private', 1 => 'Public');
	echo form_label('Public or Private','public_private');
	echo form_dropdown('public_private', $public_private, 1);
	?>
</fieldset>

<fieldset>
	<legend>Linestring Location</legend>
	<?php

	echo form_label('Line Points', 'line_points');
	echo form_input('line_points');

	echo form_submit('submit', 'Create Line', 'class="submit_button"');
	
	?>
	
	<?php echo validation_errors('<p class="error">'); ?>
</fieldset>

<script>
	
	function openPopUp() {
		var menu = document.getElementById('frame_id');
		var value = menu.options[menu.selectedIndex].value;
		window.open('<?php echo base_url(); ?>index.php/line/create_line_geometry_helper/'+value, '_blank', 'width=800,height=500,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');
	}
	
</script>
