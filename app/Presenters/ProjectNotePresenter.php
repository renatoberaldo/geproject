<?php
/**
 * Created by PhpStorm.
 * User: motamonteiro
 * Date: 05/08/15
 * Time: 23:39
 */

namespace GeProj\Presenters;

use GeProj\Transformers\ProjectNoteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectNotePresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new ProjectNoteTransformer();
    }
}