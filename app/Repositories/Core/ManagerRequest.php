<?php
/**
 * Created by PhpStorm.
 * User: Ivans
 * Date: 7/19/2018
 * Time: 21:49
 */

namespace App\Repositories\Core;


class ManagerRequest
{

    public function getCode($res, $infoView)
    {
        if (is_string($res)) {
            return 500;
        } else {
            if ($res->StatusCode == 200) {
                session()->flash('info', $infoView->infoSuccesful);

                return 200;
            } else {
                session()->flash('info', $infoView->infoError);

                return 400;
            }
        }
    }

    public function isSuccessful($res): bool
    {
        if (is_string($res)) {
            return false;
        } else {
            if ($res->StatusCode == 200) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function getView($res, $infoView)
    {
        if (is_string($res)) {
            return abort(500, $res);
        } else {
            if ($res->StatusCode == 200) {
                return $this->getViewInfo($infoView->view, $infoView->infoSuccesful, $res->Data);
            } else {
                return abort(404, $infoView->infoError);
            }
        }
    }

    public function getViewInfo($view, $info, $data)
    {
        session()->flash('info', $info);

        return view($view, compact('data'));
    }

    public function getViewInfoMultiple($view, $info, $data)
    {
        session()->flash('info', $info);

        return view($view)->with($data);
    }

    public function setInfoView($view, $infoSuccesful, $infoError)
    {
        return (object)['view' => $view, 'infoSuccesful' => $infoSuccesful, 'infoError' => $infoError];
    }

}