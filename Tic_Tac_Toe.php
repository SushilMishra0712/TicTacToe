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
   $player_letter = "0";
}
echo "Letter ".$player_letter." assigned to player\n";

//toss for who will play first
echo "Press enter to toss";
fscanf(STDIN,"%s");
$toss = rand(0,1);
if($toss==0)
{
echo "Player will play first\n";
}
else
{
echo "Computer will play first\n";
}

//player would like to see the board
echo " ".$board_array[1]."  | ".$board_array[2]."  | ".$board_array[3]." \n";
echo "_  _  _  _ \n";
echo " ".$board_array[4]."  | ".$board_array[5]."  | ".$board_array[6]." \n";
echo "_  _  _  _  \n";
echo " ".$board_array[7]."  | ".$board_array[8]."  | ".$board_array[9]." \n";

?>
