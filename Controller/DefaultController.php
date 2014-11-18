<?php
namespace Rk\LocaleBundle\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class DefaultController extends Controller
{
    /**
     * See cookie language is present, if don't here, he check locale web browser
     * Then redirect to default
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function indexAction(Request $request)
    {
        /* @var \Rk\LocaleBundle\ConfigureLocale\ConfigureLocale $config */
        $config = $this->container->get('rk_locale.configurelocale');
        $route = $config->getDefaultTargetPath();

        if( ! $route ){
            throw new Exception('Default route in config is empty or false');
        }

        $lang = $request->cookies->get('language');

        if ($lang == null)
        {
            $lang = $this->checkClientLanguage($request);
            $request->setLocale($lang);
        }

        $params = $request->get('_route_params');
        $params['_locale'] = $lang;

        return $this->redirect($this->generateUrl($config->getDefaultTargetPath(),$params));
    }

    /**
     * Return locale variable language web browser
     *
     * @param $request
     * @throws \Exception
     * @return string
     */
    private function checkClientLanguage($request)
    {
        $langcode = (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '';
        $langcode = (!empty($langcode)) ? explode(";", $langcode) : $langcode;
        $langcode = (!empty($langcode['0'])) ? explode(",", $langcode['0']) : $langcode;
        $langcode = (!empty($langcode['0'])) ? explode("-", $langcode['0']) : $langcode;

        if( ! is_string($langcode['0'])){
            throw new Exception('Locale Web browser is not string.');
        }
        return $langcode['0'];
    }
}
