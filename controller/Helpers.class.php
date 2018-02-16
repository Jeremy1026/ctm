<?php 

class Helpers {

	public static function render($template, $params = null) {
	    if (!static::templateExists($template)) {
	      throw new InvalidArgumentException(sprintf('The template "%s" does not exist or is unreadable.', $template));
	    }

	    include static::getTemplatePath($template);
		include (ROOT_DIR . '/view/_footer.php');
	    return true;
	}

	public static function templateExists($template): bool {
		return is_readable(static::getTemplatePath($template));
	}


	private static function getTemplatePath($template): string {
	    return ROOT_DIR . '/view/template/' . $template . '.php';
	}

}