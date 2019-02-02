<?php namespace std\data\exchange\controllers;

class Main extends \Controller
{
    private $s;

    public function __create()
    {
        $this->s = &$this->s('|', [
//            'view'        => 'import',
            'import_json' => ''
        ]);

        remap($this->s, $this->data, 'target_name, import_call, export_call');
    }

    public function reload($view = 'import')
    {
        $this->jquery('|')->replace($this->view($view));
    }

    public function view($view = 'import')
    {
        $v = $this->v('|');

        $v->assign([
                       'TARGET_NAME'   => $this->s['target_name'],
                       'EXPORT_BUTTON' => $this->c('\std\ui button:view', [
                           'path'    => '>xhr:export|',
                           'class'   => 'export_button ' . ($view == 'export' ? 'pressed' : ''),
                           'content' => 'export'
                       ]),
                       'IMPORT_BUTTON' => $this->c('\std\ui button:view', [
                           'path'    => '>xhr:import|',
                           'class'   => 'import_button ' . ($view == 'import' ? 'pressed' : ''),
                           'content' => 'import'
                       ])
                   ]);

        if ($view == 'export') {
            $exportData = $this->_call($this->s['export_call'])->perform();

            $v->assign('export', [
                'JSON' => j_($exportData)
            ]);
        }

        if ($view == 'import') {
            $v->assign('import', [
                'JSON' => $this->s['import_json']
            ]);
        }

        $this->widget(':|', [
            'paths' => [
                'import' => $this->_p('>xhr:performImport|')
            ]
        ]);

        $this->css(':\css\std~');

        return $v;
    }
}
