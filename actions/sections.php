<?php

require_once ("../publicClasses/Sections.php");
$sections = new Sections();
$sections_info = $sections->get_sections_info();

foreach ($sections_info['section'] as $key => $value) {
	echo '<a href="./sectionDetail.php?section_id='.$value[name].'">'.$value['description']."</a>";
	echo "<br>";
}
