<?php
require_once ("../publicClasses/SectionDetail.php");
$section_detail = new SectionDetail();
$section_detail_info = $section_detail->get_section_detail_info();
p($section_detail_info);
// foreach ($sections_info['section'] as $key => $value) {
// 	echo '<a href="./sectionDetail.php?section_id='.$value[name].'">'.$value['description']."</a>";
// 	echo "<br>";
// }
