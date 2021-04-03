<?php 
    class Template {
        protected $template;

        protected $vars = array();

        public function __construct($template) {
            $this->template = $template;
        }

        public function __get($key) {
            return $this->vars[$key];
        }

        public function __set($key, $value) {
            $this->vars[$key] = $value;
        }

        public function __toString() {
            extract($this->vars);
            // echo getcwd() . '<br />';
            // echo $this->template . '<br />';
            // echo dirname($this->template) . '<br />';
            chdir(dirname($this->template));
            // echo getcwd() . '<br />';
            // echo dirname($this->template) . '<br />';
            // echo $this->template . '<br />';
            // echo basename($this->template) . '<br />';
            ob_start();

            include basename($this->template);

            return ob_get_clean();
        }
    }
?>