<?php
/**
 * User: pascal
 * Date: 27/10/16
 * Time: 09:32
 */

namespace CorinneBundle\Controller;

use CorinneBundle\CorinneBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Admin controller.
 *
 */
class AdminController extends Controller
{
    /**
     *
     * main page backend admin
     *
     */
    public function indexAction()
    {
        return $this->render('@Corinne/admin/index.html.twig');
    }

}
