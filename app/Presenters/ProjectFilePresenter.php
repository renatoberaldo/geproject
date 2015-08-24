<?php
/**
 * Created by PhpStorm.
 * User: motamonteiro
 * Date: 05/08/15
 * Time: 23:39
 */

namespace GeProj\Presenters;

use GeProj\Transformers\ProjectFileTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectFilePresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new ProjectFileTransformer();
    }
}