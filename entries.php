<?php
class entries
{
	private $name;
	private $message;
	private $fn = 'entries.dat';	

	function __construct()
	{
		
	}

	function setName($n)
	{
		$this->name = $n;
	}
	
	function setMessage($m)
	{
		$this->message = $m;
	}

	function showEntries()
	{
		$entryArray = array();
		$entryArray = explode(PHP_EOL, file_get_contents($this->fn));
		$entryArray = array_reverse($entryArray);
		foreach ($entryArray as $entry)
		{
			echo $entry;
		}		
	}

	function saveEntry()
	{
		$s = '<article>';
		$s .= $this->message;
		$s .= '<footer>Posted by '.$this->name.' on ';
		$s .= strftime('%c');
		$s .= '</footer>';
		$s .= '</article>'.PHP_EOL;		
		file_put_contents($this->fn,$s,FILE_APPEND | LOCK_EX);
		return $s;
	}
}
?>