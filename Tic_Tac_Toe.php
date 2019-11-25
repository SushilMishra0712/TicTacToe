<?php

//resetting the board
$row_of_board = 3;
$board_array = array();
for($row=1;$row<=pow($row_of_board,2);$row++)
{
   $board_array[$row]="";
}

//assign letter to player
echo "Press enter to play game";
fscanf(STDIN,"%s");
$random_letter = rand(0,1);
if($random_letter==0)
{
   $player_letter = "X";
}
else
{
   $player_letter = "O";
}
echo "Letter ".$player_letter." assigned to player\n";

?>
