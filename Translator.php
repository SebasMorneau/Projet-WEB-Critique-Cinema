<?php
	class Translator {
		private $xmlFile;
		
		public function __construct($lang) {
			$this->xmlFile = new SimpleXMLElement("lang/" . $lang . ".xml", null, true);			
		}	
		
		// exemple $this->read("index", "title") : retourne le titre localisé fr ou en
		public function read($page, $node) {
			$value =  $this->xmlFile->$page->$node;
			
			if (strlen($value) == 0) {
				$value = "<i>Texte inexistant</i>";	
			}
			
			return $value;
		}
	}
?>