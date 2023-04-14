
<?php if (!defined($secretkey)) { die("Please use index.php!"); } 

include ("templates/defaultwhite/header.php");

?>



         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top">
			
			<div class="stretcher" style="background-image: url('templates/defaultwhite/images/back2.gif'); background-position: bottom; background-repeat:no-repeat"><h1 class="display" title="info"><?php echo _info; ?></h1>
				 
                   <p>
					<?php  
					$ci = 1;
					while( $rivi9 = mysql_fetch_row($result9) )
   {
       $rivi9[0] = stripslashes($rivi9[0]);
       $rivi9[1] = stripslashes($rivi9[1]);
       echo "\n"
       . "$rivi9[1]\n"
       . "<!-- INFO ".$ci." -->\n";
       $ci++;
   }    ?> </p> <br />
			</div>
			
			<div class="stretcher" style="background-image: url('templates/defaultwhite/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="pd"><?php echo _personal_data; ?></h1>
                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                      <?php
$ci = 1;
  while( $rivi6 = mysql_fetch_row($result6) )
   {
       $rivi6[0] = stripslashes($rivi6[0]);
       $rivi6[2] = stripslashes($rivi6[2]);
       echo "\n"
       . "<tr>
  <td width=\"200\"><strong>$rivi6[1]</strong></td><td>$rivi6[2]</td></tr>
\n"
       . "<!-- PERSONALDATA ".$ci." -->\n";
        $ci++;
   }

	?>
                    </table><br /><br />
			  </div>
			
			<div class="stretcher" style="background-image: url('templates/defaultwhite/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="sk"><?php echo _knowledge_and_skills; ?></h1>

                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                      <?php
$ci = 1;
  while( $rivi4 = mysql_fetch_row($result4) )
   {
       $rivi4[0] = stripslashes($rivi4[0]);
       $rivi4[2] = stripslashes($rivi4[2]);
       echo "\n"
       . "<tr>
  <td width=\"200\" valign=\"top\"><strong>$rivi4[1]</strong></td><td valign=\"top\">$rivi4[2]</td></tr>
\n"
       . "<!-- SKILLSDATA ".$ci." -->\n";
       $ci++;
   }

	?>
                    </table><br /><br />
								</div>
			
			<div class="stretcher" style="background-image: url('templates/defaultwhite/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="re"><?php echo _recommendations; ?></h1>

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td valign="top"><?php
$ci = 1;
  while( $rivi7 = mysql_fetch_row($result7) )
   {
       $rivi7[0] = stripslashes($rivi7[0]);
       $rivi7[3] = stripslashes($rivi7[3]);
       echo "\n"
       . "<strong>$rivi7[1]</strong><br /><br />$rivi7[2]<br /><br /><strong>$rivi7[3]</strong><br /><br />\n"
       . "<!-- RECOM ".$ci." -->\n";
       $ci++;
   }

	?>
                        </td>
                      </tr>
                    </table>
					<br /><br />
			</div>
			
			<div class="stretcher" style="background-image: url('templates/defaultwhite/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="ed"><?php echo _education; ?></h1>
			                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><strong><?php echo _degree; ?></strong> </td>
                        <td><div align="right"><strong><?php echo _years; ?></strong></div></td>
                      </tr>
                      <?php

		$ci = 1;
	while( $rivi3 = mysql_fetch_row($result3) )
   {
       $rivi3[0] = stripslashes($rivi3[0]);
       $rivi3[3] = stripslashes($rivi3[3]);
     echo "<!-- EDU $ci -->\n"
	. "<tr>\n" 
	."<td>$rivi3[1] ($rivi3[2])</td>"
	."<td><div align=\"right\">$rivi3[3]</div></td>"
    ."</tr>\n";
	$ci++;
   }
   
   ?>
                    </table><br /><br />
								</div>
			
			<div class="stretcher" style="background-image: url('templates/defaultwhite/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="ex"><?php echo _extra_courses; ?></h1>
				
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><strong><?php echo _course; ?></strong> </td>
                        <td><div align="right"><strong><?php echo _year; ?></strong></div></td>
                      </tr>
                      <?php

		$ci = 1;
	while( $rivi2 = mysql_fetch_row($result2) )
   {
       $rivi2[0] = stripslashes($rivi2[0]);
       $rivi2[3] = stripslashes($rivi2[3]);
     echo "<!-- Course $ci -->\n"
	. "<tr>\n" 
	."<td>$rivi2[1] ($rivi2[2])</td>"
	."<td><div align=\"right\">$rivi2[3]</div></td>"
    ."</tr>\n";
	$ci++;
   }
   
   ?>
                    </table><br /><br />
								</div>
								<div class="stretcher" style="background-image: url('templates/defaultwhite/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="hop"><?php echo _hobbies; ?></h1>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td valign="top"><?php 
			$ci = 1;
			while( $rivi5 = mysql_fetch_row($result5) )
   {
       $rivi5[0] = stripslashes($rivi5[0]);
       $rivi5[1] = stripslashes($rivi5[1]);
       echo "\n"
       . "$rivi5[1]<br /><br />\n"
       . "<!-- HOBBIES ".$ci." -->\n";
       $ci++;
   }    ?>
                        </td>
                      </tr>
                    </table>
					<br /><br />
					</div>
			<div class="stretcher" style="background-image: url('templates/defaultwhite/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="exp"><?php echo _work_experience; ?></h1>

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <?php 
  $ci = 1;
  while( $rivi1 = mysql_fetch_row($result1) )
   {
   
       $rivi1[0] = stripslashes($rivi1[0]);
       $rivi1[5] = stripslashes($rivi1[5]);
       echo "<tr>\n"
       . "<td valign=\"top\"><b class=\"contenttext\">$rivi1[1] ($rivi1[3])</strong><br /><span class=\"contenttext\">$rivi1[4]-$rivi1[5]</span></td>\n"
	   . "</tr>\n"
	   . "<tr>\n"
       . "<td valign=\"top\"><span class=\"contenttext\">$rivi1[2]</span><br /><br /></td>\n"
       . "</tr>\n"
       . "<!-- EXP ".$ci." -->\n";
       $ci = 1;
   }
	
	?>
                    </table>	
					<br /><br />		
					</div>
			
			<div class="stretcher" style="background-image: url('templates/defaultwhite/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="ref"><?php echo _references; ?></h1>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td valign="top"><?php
 $ci = 1;
  while( $rivi8 = mysql_fetch_row($result8) )
   {
       $rivi8[0] = stripslashes($rivi8[0]);
       $rivi8[3] = stripslashes($rivi8[3]);
       echo "\n"
       . "<strong>$rivi8[1]</strong><br />$rivi8[2]<br /><a href=\"$rivi8[3]\" target=\"_blank\"><strong>$rivi8[3]</strong></a><br /><br />\n"
       . "<!-- REF ".$ci." -->\n";
 $ci++;

   }
   
	?>
                        </td>
                      </tr>
                    </table><br /><br />
	</div>
			
			</td>
          </tr>
        </table>
							
<?php include ("templates/defaultwhite/footer.php"); ?>