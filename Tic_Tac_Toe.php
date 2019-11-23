<?php

class TicTacToe
{
public $row_of_board;
public $board_array;
public $player_letter;
public $computer_letter;
public $toss;
	function __construct()
	{
		$this->row_of_board = 3;
		$this->board_array = array();
		$this->player_letter = null;
		$this->computer_letter = null;
		$this->toss = null;
	}

	//resetting the board
	function reset_Board()
	{
		for($cell_number=1;$cell_number<=pow($this->row_of_board,2);$cell_number++)
		{
		   $this->board_array[$cell_number]="";
		}
		self::assign_Letter();
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
		self::toss_to_play();
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
			self::player_Turn(); 
		}
		else
		{
			echo "Computer will play first\n";
			self::computer_Turn();
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
		   self::print_Board();
		   self::computer_Turn();
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
		$computer_choose_cell = rand(1,9);
		if($this->board_array[$computer_choose_cell] == "")
		{
		   echo "Computer Plays\n";
		   $this->board_array[$computer_choose_cell] = $this->computer_letter;
		   self::print_Board();
		   self::player_Turn();
		}
		else if($this->board_array[$computer_choose_cell] == $this->player_letter)
		{
		   self::computer_Turn();
		}
		else
		{
		   self::computer_Turn();
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
		self::win_Condition();
	}

	//condition for winning
	function win_Condition()
	{
		self::win_ConditionForX();
		self::win_ConditionFor0();
	}

	function win_ConditionForX()
	{
		if(($this->board_array[1] && $this->board_array[2] && $this->board_array[3]) == "X" ||
                   ($this->board_array[4] && $this->board_array[5] && $this->board_array[6]) == "X" ||
                   ($this->board_array[7] && $this->board_array[8] && $this->board_array[9]) == "X" ||
                   ($this->board_array[1] && $this->board_array[4] && $this->board_array[7]) == "X" ||
                   ($this->board_array[2] && $this->board_array[5] && $this->board_array[8]) == "X" ||
                   ($this->board_array[3] && $this->board_array[6] && $this->board_array[9]) == "X" ||
                   ($this->board_array[1] && $this->board_array[5] && $this->board_array[9]) == "X" ||
                   ($this->board_array[3] && $this->board_array[5] && $this->board_array[7]) == "X" )
                  {
                        echo "Congrats X Wins\n";
                        exit(0);
                  }
		  else
                  {
                        echo "\n";
                  }
	}

	function win_ConditionFor0()
	{
		if(($this->board_array[1] && $this->board_array[2] && $this->board_array[3]) == "O" ||
                   ($this->board_array[4] && $this->board_array[5] && $this->board_array[6]) == "O" ||
                   ($this->board_array[7] && $this->board_array[8] && $this->board_array[9]) == "O" ||
                   ($this->board_array[1] && $this->board_array[4] && $this->board_array[7]) == "O" ||
                   ($this->board_array[2] && $this->board_array[5] && $this->board_array[8]) == "O" ||
                   ($this->board_array[3] && $this->board_array[6] && $this->board_array[9]) == "O" ||
                   ($this->board_array[1] && $this->board_array[5] && $this->board_array[9]) == "O" ||
                   ($this->board_array[3] && $this->board_array[5] && $this->board_array[7]) == "O" )
                  {
                        echo "Congrats O Wins\n";
                        exit(0);
                  }
                else
                  {
                        echo "\n";
                  }
	}

}

$object_ticTacToe = new TicTacToe;
$object_ticTacToe->reset_Board();
?>
