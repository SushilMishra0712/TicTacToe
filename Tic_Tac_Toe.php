<?php

class TicTacToe
{
public $row_of_board;
public $board_array;
public $player_letter;
public $computer_letter;
public $toss;
public $first_check;
public $second_check;
public $computer_choose_cell;
	function __construct()
	{
		$this->row_of_board = 3;
		$this->board_array = array();
		$this->player_letter = null;
		$this->computer_letter = null;
		$this->toss = null;
		$this->first_check =0;
		$this->second_check =0;
		$this->computer_choose_cell = null;
	}

	//resetting the board
	function reset_Board()
	{
		for($cell_number=1;$cell_number<=pow($this->row_of_board,2);$cell_number++)
		{
		   $this->board_array[$cell_number]="";
		}
	}

	//assign letter to player
	function assign_Letter()
	{
		echo "Press enter to play game";
		fscanf(STDIN,"%s");
		$random_letter = rand(0,1);
		if($random_letter==0)
		{
		   $this->player_letter = "X";
		   $this->computer_letter = "O";
		}
		else
		{
		   $this->player_letter = "O";
		   $this->computer_letter = "X";
		}
		echo "Letter ".$this->player_letter." assigned to player\n";
	}

	//toss for who will play first
	function toss_to_Play()
	{
		echo "Press enter to toss";
		fscanf(STDIN,"%s");
		$this->toss = rand(0,1);
		if($this->toss==0)
		{
			echo "Player will play first\n";
		}
		else
		{
			echo "Computer will play first\n";
		}
	}

	//player turn 
	function player_Turn()
	{
	        echo "Which cell number you would like to choose?\n";
	        fscanf(STDIN,"%d",$cell_number);
		if($this->board_array[$cell_number] == "")
		{
		   $this->board_array[$cell_number] = $this->player_letter;
		}
		else
		{
		   echo "Entered cell is already filled please choose another cell\n";
		   self::player_Turn();
		}
	}

	//computer turn
	function computer_Turn()
	{
		$this->first_check =0;
                $this->second_check =0;
		$this->computer_choose_cell = rand(1,9);
		if($this->board_array[$this->computer_choose_cell] == $this->player_letter)
		{
		   self::computer_Turn();
		}
	}

	//first check if computer or player can win
	function check_if_anyone_can_win($letter,$which_check)
	{
              for($cell=1;$cell<=9;$cell++)
              {
                      for($adjacent_cell=1;$adjacent_cell<=8;$adjacent_cell++)
                      {
                         if(($this->board_array[$cell]==$this->board_array[$adjacent_cell]) && 
                              ($this->board_array[$adjacent_cell]==$letter) && $this->board_array[$adjacent_cell+1]=="")
                           {
                              $this->computer_choose_cell=$adjacent_cell+1;
                              $which_check =1;
                           }
                      }
              }

              if($this->board_array[$this->computer_choose_cell] == "")
              {
      		        echo "Computer Plays\n";
                        $this->board_array[$this->computer_choose_cell] = $this->computer_letter;
              }

	}

	//choose one of corners if available
	function choose_corner()
        {
              if($this->board_array['1']=="")
              {
                      $this->computer_choose_cell=1;
              }
              else if($this->board_array['3']=="")
              {
                      $this->computer_choose_cell=3;
              }
              else if($this->board_array['7']=="")
              {
                      $this->computer_choose_cell=7;
              }
              else if($this->board_array['9']=="")
              {
                      $this->computer_choose_cell=9;
              }

              //if corners not available check for center
              else if($this->board_array['5']=="")
              {
                      $this->computer_choose_cell=5;
              }
	      //put computer_letter into the board_array
	      if($this->board_array[$this->computer_choose_cell] == "")
              {
                        echo "Computer Plays\n";
                        $this->board_array[$this->computer_choose_cell] = $this->computer_letter;
              }
        }

	//computer will choose any of side if corner and center is not available
	function choose_side()
	{
		for($cell=1;$cell<=9;$cell++)
		{
			if($cell%2==0)
			{
			   if($this->board_array[$cell]=="")
			   {
		              $this->computer_choose_cell=$cell;
			   }
			}
		}
	}

	//player would like to see the board
	function print_Board()
	{
		echo " ".$this->board_array[1]."  | ".$this->board_array[2]."  | ".$this->board_array[3]." \n";
		echo "_  _  _  _ \n";
		echo " ".$this->board_array[4]."  | ".$this->board_array[5]."  | ".$this->board_array[6]." \n";
		echo "_  _  _  _  \n";
		echo " ".$this->board_array[7]."  | ".$this->board_array[8]."  | ".$this->board_array[9]." \n";
	}

	//condition for winning
	function win_Condition()
	{
		if((($this->board_array['1'] == $this->board_array['2']) && ($this->board_array['2'] == $this->board_array['3']) &&
		    ($this->board_array['3'] == $this->player_letter)) ||
                   (($this->board_array['4'] == $this->board_array['5']) && ($this->board_array['5'] == $this->board_array['6']) &&
		    ($this->board_array['6'] == $this->player_letter)) ||
                   (($this->board_array['7'] == $this->board_array['8']) && ($this->board_array['8'] == $this->board_array['9']) &&
		    ($this->board_array['9'] == $this->player_letter)) ||
                   (($this->board_array['1'] == $this->board_array['4']) && ($this->board_array['4'] == $this->board_array['7']) &&
		    ($this->board_array['7'] == $this->player_letter)) ||
                   (($this->board_array['2'] == $this->board_array['5']) && ($this->board_array['5'] == $this->board_array['8']) &&
		    ($this->board_array['8'] == $this->player_letter)) ||
                   (($this->board_array['3'] == $this->board_array['6']) && ($this->board_array['6'] == $this->board_array['9']) &&
	            ($this->board_array['9'] == $this->player_letter)) ||
                   (($this->board_array['1'] == $this->board_array['5']) && ($this->board_array['5'] == $this->board_array['9']) &&
		    ($this->board_array['9'] == $this->player_letter)) ||
                   (($this->board_array['3'] == $this->board_array['5']) && ($this->board_array['5'] == $this->board_array['7']) &&
		    ($this->board_array['7'] == $this->player_letter)) )
                  {
                        echo "Congrats You won\n";
                        exit(0);
                  }

	   else if((($this->board_array['1'] == $this->board_array['2']) && ($this->board_array['2'] == $this->board_array['3']) &&
                    ($this->board_array['3'] == $this->computer_letter)) ||
                   (($this->board_array['4'] == $this->board_array['5']) && ($this->board_array['5'] == $this->board_array['6']) &&
                    ($this->board_array['6'] == $this->computer_letter)) ||
                   (($this->board_array['7'] == $this->board_array['8']) && ($this->board_array['8'] == $this->board_array['9']) &&
                    ($this->board_array['9'] == $this->computer_letter)) ||
                   (($this->board_array['1'] == $this->board_array['4']) && ($this->board_array['4'] == $this->board_array['7']) &&
                    ($this->board_array['7'] == $this->computer_letter)) ||
                   (($this->board_array['2'] == $this->board_array['5']) && ($this->board_array['5'] == $this->board_array['8']) &&
                    ($this->board_array['8'] == $this->computer_letter)) ||
                   (($this->board_array['3'] == $this->board_array['6']) && ($this->board_array['6'] == $this->board_array['9']) &&
                    ($this->board_array['9'] == $this->computer_letter)) ||
                   (($this->board_array['1'] == $this->board_array['5']) && ($this->board_array['5'] == $this->board_array['9']) &&
                    ($this->board_array['9'] == $this->computer_letter)) ||
                   (($this->board_array['3'] == $this->board_array['5']) && ($this->board_array['5'] == $this->board_array['7']) &&
                    ($this->board_array['7'] == $this->computer_letter)) )
                  {
                        echo "Computer is the winner\n";
                        exit(0);
                  }
		else if($this->board_array['1'] && $this->board_array['2'] && $this->board_array['3'] && $this->board_array['4'] &&
			$this->board_array['5'] && $this->board_array['6'] && $this->board_array['7'] && $this->board_array['8'] && $this->board_array['9'])
		  {
			echo "Game Drawn\n";
			exit(0);
		  }
		else 
		  {
			echo "\n";
		  }
	}
}

//create object of class TicTacToe
$object_ticTacToe = new TicTacToe;
$object_ticTacToe->reset_Board();
$object_ticTacToe->assign_Letter();
$object_ticTacToe->toss_to_PLay();

//play till game is over
while(1>0)
{
	if($object_ticTacToe->toss == 0)
	{
		$object_ticTacToe->player_Turn();
	}
	else
	{
		$object_ticTacToe->computer_Turn();

		//first check if computer can win then play that move
		$object_ticTacToe->check_if_anyone_can_win($object_ticTacToe->computer_letter,$object_ticTacToe->first_check);
		if($object_ticTacToe->first_check==1)
		{
			//second check if opponent can win then play to block it
			$object_ticTacToe->check_if_anyone_can_win($object_ticTacToe->player_letter,$object_ticTacToe->second_check);

			if($object_ticTacToe->second_check==1)
			{
				//check for one of corners if available then check for center
				$object_ticTacToe->choose_corner();

				//check for side cells if corners and center not available
				$object_ticTacToe->choose_side();
			} 
		}
	}
	$object_ticTacToe->print_Board();
	$object_ticTacToe->win_Condition();

	if($object_ticTacToe->toss == 0)
	{
		$object_ticTacToe->toss=1;
	}
	else
	{
		$object_ticTacToe->toss=0;
	}
}

?>
