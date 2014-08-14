<?php


class Controller extends Smarty
{
	
	
	public function __construct( )
	{	
		parent :: __construct( );
	}

	
	public function assignMultipleVariables( $variables )
	{
		$this -> assign( $variables );
	}
	
	public function assignSingleVariable( $keyword, $variable )
	{
		$this -> assign( $keyword, $variable );
	}
	
	public function displayTemplate( $template )
	{
		$this -> display( $template );
	}
	
	public function displayPageError( $header, $message )
	{
		$page_error = array( "header" => $header, "message" => $message );
		echo '<script type="text/javascript">window.location.hash = "showErrorModal";</script>';
		$this -> assignSingleVariable( "page_error", $page_error );
	}
}