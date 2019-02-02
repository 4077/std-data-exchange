<?php namespace std\data\exchange\controllers\main;

class Xhr extends \Controller
{
    public $allow = self::XHR;

    public function export()
    {
//        $this->s('~|', ['view' => 'export'], RA);

        $this->c('~:reload:export|');
    }

    public function import()
    {
//        $this->s('~|', ['view' => 'import'], RA);

        $this->c('~:reload:import|');
    }

    public function performImport()
    {
        $value = $this->data('value');

        $this->s('~|', ['import_json' => $value], RA);

        $this->_call($this->s('~:import_call|'))
            ->ra([
                     'data'             => _j($value),
                     'skip_first_level' => $this->data('skip_first_level')
                 ])
            ->perform();
    }
}
