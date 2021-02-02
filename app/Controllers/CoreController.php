<?php
class CoreController {
    public function show($viewName, $viewVars = [])
    {
        // $dbData = new DBData();

        // $viewVars['footerBrands'] = $dbData->getFooterBrands();
        // $viewVars['footerProductTypes'] = $dbData->getFooterProductTypes();

        // On inclut les templates header et footer
        // ainsi que celui mis en paramètre ($viewName)
        include(__DIR__.'/../Views/layout/header.tpl.php');
        include(__DIR__.'/../Views/'.$viewName.'.tpl.php');
        include(__DIR__.'/../Views/layout/footer.tpl.php');
     }
}